@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); color: white; padding: 5rem 0;">
    <div class="container d-flex flex-column flex-lg-row align-items-center gap-5">
        <div class="hero-text w-100 w-lg-50 text-center text-lg-start animate-fade-in">
            <h1 class="display-4 fw-bold mb-4">Everything Electronics in One Place</h1>
            <p class="lead mb-4 opacity-75">Buy premium new & refurbished devices, get expert repairs, sell your old tech, or schedule an eco-friendly e-waste pickup.</p>
            <div class="d-flex gap-3 justify-content-center justify-content-lg-start">
                <a href="{{ route('products.index') }}" class="btn btn-light btn-lg px-4 text-primary fw-bold rounded-pill">Shop Now</a>
                <a href="{{ route('repair.index') }}" class="btn btn-outline-light btn-lg px-4 rounded-pill">Book Repair</a>
            </div>
        </div>
        <div class="hero-image w-100 w-lg-50 animate-fade-in" style="animation-delay: 0.2s;">
            <img src="https://images.unsplash.com/photo-1498049794561-7780e7231661?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Electronics display" class="img-fluid rounded-4 shadow-lg">
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5 fs-2 text-dark">Our Services</h2>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('products.index') }}" class="text-decoration-none h-100 d-block p-4 bg-white rounded-4 shadow-sm border text-center transition-hover">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex justify-content-center align-items-center mb-3" style="width: 64px; height: 64px;">
                        <i class="fas fa-shopping-bag fa-2x text-primary"></i>
                    </div>
                    <h3 class="h5 fw-bold text-dark">Buy Electronics</h3>
                    <p class="text-muted small mb-0">Shop new & certified refurbished laptops, phones, and more.</p>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('repair.index') }}" class="text-decoration-none h-100 d-block p-4 bg-white rounded-4 shadow-sm border text-center transition-hover">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex justify-content-center align-items-center mb-3" style="width: 64px; height: 64px;">
                        <i class="fas fa-tools fa-2x text-primary"></i>
                    </div>
                    <h3 class="h5 fw-bold text-dark">Expert Repairs</h3>
                    <p class="text-muted small mb-0">Fast, reliable, and affordable repair services at your doorstep.</p>
                </a>
            </div>
            <!-- Future Sell -->
            <div class="col-md-6 col-lg-3">
                <a href="#" class="text-decoration-none h-100 d-block p-4 bg-white rounded-4 shadow-sm border text-center transition-hover">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex justify-content-center align-items-center mb-3" style="width: 64px; height: 64px;">
                        <i class="fas fa-hand-holding-usd fa-2x text-primary"></i>
                    </div>
                    <h3 class="h5 fw-bold text-dark">Sell Old Devices</h3>
                    <p class="text-muted small mb-0">Get the best instant valuation for your used smartphones and laptops.</p>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('ewaste.index') }}" class="text-decoration-none h-100 d-block p-4 bg-white rounded-4 shadow-sm border text-center transition-hover">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex justify-content-center align-items-center mb-3" style="width: 64px; height: 64px;">
                        <i class="fas fa-recycle fa-2x text-primary"></i>
                    </div>
                    <h3 class="h5 fw-bold text-dark">E-Waste Pickup</h3>
                    <p class="text-muted small mb-0">Responsibly dispose of your dead electronics. Schedule a pickup today.</p>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Demo (Would normally come from DB) -->
<section class="products-section py-5 bg-light rounded-5 mx-2 mx-md-4 mb-4">
    <div class="container">
        <h2 class="text-center fw-bold mb-5 fs-2 text-dark">Featured Products</h2>
        <div class="row g-4">
            @foreach(\App\Models\Product::inRandomOrder()->limit(4)->get() as $product)
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
            @endforeach
            @if(\App\Models\Product::count() === 0)
                <div class="col-12 text-center text-muted">
                    <p>No products available yet. Admin needs to add some.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary mt-2 rounded-pill">Browse Shop</a>
                </div>
            @endif
        </div>
    </div>
</section>

<style>
.transition-hover {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.transition-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
}
</style>
@endsection
