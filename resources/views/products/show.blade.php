@extends('layouts.app')
@section('title', ?product->name . ' | ELECTRAIZE')
@section('content')
<div class="container py-5">
    <a href="{{ route('products.index') }}" class="btn btn-link text-decoration-none text-muted mb-4"><i class="fas fa-arrow-left me-2"></i>Back to Shop</a>
    <div class="row g-5">
        <div class="col-md-6">
            <img src="{{ ?product->image_url ?? 'https://via.placeholder.com/600x600?text=No+Image' }}" class="img-fluid rounded-4 shadow-sm w-100" style="object-fit: cover;" alt="{{ ?product->name }}">
        </div>
        <div class="col-md-6">
            <span class="badge bg-primary bg-opacity-10 text-primary mb-2">{{ optional(?product->category)->name ?? 'Device' }}</span>
            <span class="badge bg-secondary bg-opacity-10 text-secondary mb-2">{{ ucfirst(?product->condition) }}</span>
            <h1 class="display-5 fw-bold mb-3">{{ ?product->name }}</h1>
            <p class="display-6 text-primary fw-bold mb-4">?{{ number_format(?product->price, 2) }}</p>
            <p class="text-muted mb-4">{{ ?product->description }}</p>
            
            <form action="{{ route('cart.add', ?product->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">
                    <i class="fas fa-cart-plus me-2"></i> Add to Cart
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
