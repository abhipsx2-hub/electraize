<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceComplaint;

class RepairController extends Controller
{
    public function index() {
        return view('repair.index');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'issue' => 'required|string',
            'address' => 'required|string',
        ]);
        if(auth()->check()) {
            $data['user_id'] = auth()->id();
        }
        ServiceComplaint::create($data);
        return redirect()->route('repair.index')->with('success', 'Repair request submitted successfully! Our expert will contact you soon.');
    }
}
