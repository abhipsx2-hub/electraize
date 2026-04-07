@extends('layouts.app')
@section('title', 'E-Waste Pickup | ELECTRAIZE')
@section('content')
<div class="container py-5">
    <div class="row align-items-center mb-5">
        <div class="col-md-6 text-center text-md-start">
            <h1 class="fw-bold mb-3 text-success">Eco-Friendly E-Waste Recycling</h1>
            <p class="lead text-muted">Responsibly dispose of your old, dead, or unwanted electronics. Schedule a free pickup and ensure zero e-waste strictly goes to landfills.</p>
        </div>
        <div class="col-md-6 text-center">
            <img src="https://images.unsplash.com/photo-1550989460-0adf9ea622e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="E-Waste" class="img-fluid rounded-4 shadow-sm">
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow rounded-4">
                <div class="card-body p-4 p-md-5">
                    <h3 class="fw-bold mb-4 text-center text-success"><i class="fas fa-recycle me-2"></i>Schedule Pickup</h3>
                    <form action="{{ route('ewaste.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-semibold">Full Name</label>
                                <input type="text" class="form-control px-3 py-2" id="name" name="name" value="{{ auth()->check() ? auth()->user()->name : old('name') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label fw-semibold">Phone Number</label>
                                <input type="tel" class="form-control px-3 py-2" id="phone" name="phone" value="{{ old('phone') }}" required>
                            </div>
                            <div class="col-12">
                                <label for="item_description" class="form-label fw-semibold">Items to Recycle</label>
                                <textarea class="form-control px-3 py-2" id="item_description" name="item_description" rows="4" placeholder="E.g., 2 broken laptops, old cables, 1 CRT monitor" required>{{ old('item_description') }}</textarea>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label fw-semibold">Pickup Address</label>
                                <textarea class="form-control px-3 py-2" id="address" name="address" rows="3" required>{{ old('address') }}</textarea>
                            </div>
                            <div class="col-12 mt-4 text-center">
                                <button type="submit" class="btn btn-success btn-lg rounded-pill px-5 w-100 fw-bold">Submit Pickup Request</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
