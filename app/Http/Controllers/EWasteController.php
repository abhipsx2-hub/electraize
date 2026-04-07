<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecycleRequest;

class EWasteController extends Controller
{
    public function index() {
        return view('ewaste.index');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'item_description' => 'required|string',
            'address' => 'required|string',
        ]);
        if(auth()->check()) {
            $data['user_id'] = auth()->id();
        }
        RecycleRequest::create($data);
        return redirect()->route('ewaste.index')->with('success', 'E-Waste pickup requested successfully! Thank you for recycling with us.');
    }
}
