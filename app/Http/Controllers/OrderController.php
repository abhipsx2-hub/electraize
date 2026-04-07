<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::where('user_id', auth()->id())->with('items.product')->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function addToCart(Request $request, Product $product) {
        $cart = session()->get('cart', []);
        
        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image_url
            ];
        }
        
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function store(Request $request) {
        $request->validate([
            'shipping_address' => 'required',
        ]);
        
        $cart = session()->get('cart');
        if(!$cart) {
            return redirect()->back()->with('error', 'Your cart is empty!');
        }
        
        $total = 0;
        foreach($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }
        
        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $total,
            'shipping_address' => $request->shipping_address,
            'status' => 'pending'
        ]);
        
        foreach($cart as $id => $details) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $details['quantity'],
                'price' => $details['price']
            ]);
        }
        
        session()->forget('cart');
        
        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }
}
