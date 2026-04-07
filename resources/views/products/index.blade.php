@extends('layouts.app')
@section('title', 'Shop | ELECTRAIZE')
@section('content')
<div class="container py-4">
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h1 class="fw-bold">Shop Our Devices</h1>
        </div>
    </div>
    
    <div class="row g-4">
        @forelse($products as $product)
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <img src="{{ $product->image_url ?? 'https://via.placeholder.com/400x300?text=No+Image' }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body p-4 text-center">
                        <span class="badge bg-primary bg-opacity-10 text-primary mb-2">{{ optional($product->category)->name ?? 'Device' }}</span>
                        <h3 class="card-title h6 fw-bold mb-2">{{ $product->name }}</h3>
                        <p class="text-primary fw-bold mb-3">${{ number_format($product->price, 2) }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary btn-sm rounded-pill w-100">View Details</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted py-5">
                <i class="fas fa-box-open fa-3x mb-3 text-secondary"></i>
                <h4>No products found</h4>
                <p>Check back later for new arrivals.</p>
            </div>
        @endforelse
    </div>
    
    <div class="mt-5 d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div>
@endsection
