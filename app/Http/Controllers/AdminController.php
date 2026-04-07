<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ServiceComplaint;
use App\Models\RecycleRequest;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function index() {
        $data = [
            'total_users' => User::where('role', 'user')->count(),
            'total_orders' => Order::count(),
            'total_products' => Product::count(),
            'pending_repairs' => ServiceComplaint::where('status', 'pending')->count(),
            'recent_orders' => Order::latest()->take(5)->get(),
            'recent_repairs' => ServiceComplaint::latest()->take(5)->get(),
            'recent_ewaste' => RecycleRequest::latest()->take(5)->get(),
        ];
        return view('admin.dashboard', $data);
    }
}
