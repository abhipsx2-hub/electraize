<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'ELECTRAIZE | Modern Electronics Platform')</title>
    <meta name="description" content="Electronics repair services, online shopping, selling used devices, and e-waste pickup system.">
    <!-- Include the existing stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- We're also using Bootstrap for the web app features where appropriate, but styling with custom CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Adjust Bootstrap variables so they do not conflict with the theme heavily */
        a { text-decoration: none; }
        .btn-primary { background-color: var(--primary-color, #2563eb); border-color: var(--primary-color, #2563eb); }
        .btn-primary:hover { background-color: #1d4ed8; border-color: #1d4ed8; }
        .navbar-brand { font-size: 1.5rem; font-weight: 700; color: var(--primary-color) !important;}
        body { background-color: var(--bg-color, #f8fafc); color: var(--text-color, #1e293b); }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm" style="padding: 1rem 2rem;">
        <div class="container-fluid">
            <a href="{{ route('home') }}" class="navbar-brand">
                <i class="fas fa-bolt"></i> ELECTRAIZE
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center gap-3">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold {{ request()->routeIs('home') ? 'active text-primary' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold {{ request()->routeIs('products.*') ? 'active text-primary' : '' }}" href="{{ route('products.index') }}">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold {{ request()->routeIs('repair.*') ? 'active text-primary' : '' }}" href="{{ route('repair.index') }}">Repair</a>
                    </li>
                    <!-- Add Sell Link optionally -->
                    <!-- <li class="nav-item"><a class="nav-link fw-semibold" href="#">Sell</a></li> -->
                    <li class="nav-item">
                        <a class="nav-link fw-semibold {{ request()->routeIs('ewaste.*') ? 'active text-primary' : '' }}" href="{{ route('ewaste.index') }}">E-Waste</a>
                    </li>
                    
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="btn btn-primary text-white rounded-pill px-4 py-2">Login</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <!-- <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li> -->
                        @endif
                    @else
                        @if(Auth::user()->role === 'admin')
                            <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link badge bg-danger text-white p-2">Admin</a></li>
                        @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle fw-bold" href="#" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('orders.index') }}">My Orders</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @if (session('success'))
            <div class="container mb-3">
                <div class="alert alert-success">{{ session('success') }}</div>
            </div>
        @endif
        @if (session('error'))
            <div class="container mb-3">
                <div class="alert alert-danger">{{ session('error') }}</div>
            </div>
        @endif
        
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer bg-white border-top mt-5" style="padding: 4rem 2rem 2rem;">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <h4 class="text-primary fw-bold"><i class="fas fa-bolt"></i> ELECTRAIZE</h4>
                    <p class="text-muted mt-3 fs-6">The premier platform for buying, repairing, selling, and recycling electronics.</p>
                </div>
                <div class="col-md-3">
                    <h5 class="fw-bold mb-3">Quick Links</h5>
                    <ul class="list-unstyled d-flex flex-column gap-2">
                        <li><a href="{{ route('products.index') }}" class="text-muted text-decoration-none hover-primary">Shop Devices</a></li>
                        <li><a href="{{ route('repair.index') }}" class="text-muted text-decoration-none hover-primary">Book Repair</a></li>
                        <li><a href="{{ route('ewaste.index') }}" class="text-muted text-decoration-none hover-primary">E-Waste Pickup</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="fw-bold mb-3">Support</h5>
                    <ul class="list-unstyled d-flex flex-column gap-2">
                        <li><a href="#" class="text-muted text-decoration-none">FAQ</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Contact Us</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="fw-bold mb-3">Contact</h5>
                    <ul class="list-unstyled text-muted fs-6 d-flex flex-column gap-2">
                        <li><i class="fas fa-map-marker-alt me-2"></i> 123 Tech Lane, NY 10001</li>
                        <li><i class="fas fa-phone me-2"></i> (800) 123-4567</li>
                        <li><i class="fas fa-envelope me-2"></i> support@electraize.com</li>
                    </ul>
                </div>
            </div>
            <div class="border-top pt-4 text-center text-muted fs-6">
                <p>&copy; 2024-2026 ELECTRAIZE. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
