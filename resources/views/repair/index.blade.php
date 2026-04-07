@extends('layouts.app')
@section('title', 'Book Repair | ELECTRAIZE')
@section('content')
<div class="container py-5">
    <div class="row align-items-center mb-5">
        <div class="col-md-6 text-center text-md-start">
            <h1 class="fw-bold mb-3">Expert Electronics Repair</h1>
            <p class="lead text-muted">Fast, reliable, and affordable repair services for all your devices. Book a repair today and our technicians will come to your doorstep.</p>
        </div>
        <div class="col-md-6 text-center">
            <img src="https://images.unsplash.com/photo-1597872200969-2b65d56bd16b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Repair service" class="img-fluid rounded-4 shadow-sm">
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow rounded-4">
                <div class="card-body p-4 p-md-5">
                    <h3 class="fw-bold mb-4 text-center">Book a Repair Service</h3>
                    <form action="{{ route('repair.store') }}" method="POST">
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
                                <label for="issue" class="form-label fw-semibold">Describe the Issue</label>
                                <textarea class="form-control px-3 py-2" id="issue" name="issue" rows="4" placeholder="E.g., Screen replacement for iPhone 13" required>{{ old('issue') }}</textarea>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label fw-semibold">Service Address</label>
                                <textarea class="form-control px-3 py-2" id="address" name="address" rows="3" required>{{ old('address') }}</textarea>
                            </div>
                            <div class="col-12 mt-4 text-center">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 w-100 fw-bold">Submit Request</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
