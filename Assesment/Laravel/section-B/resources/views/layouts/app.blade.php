<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Food Delivery Platform')</title>

    <!-- Bootstrap 5 CSS & Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }
        .navbar-brand { font-size: 1.25rem; }
        .badge-admin { background-color: #f59e0b; color: #fff; font-size: 0.75rem; border-radius: 4px; padding: 2px 6px; }
        .badge-customer { background-color: #3b82f6; color: #fff; font-size: 0.75rem; border-radius: 4px; padding: 2px 6px; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- Main Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-warning" href="{{ route('restaurants.index') }}">
                <i class="bi bi-shop me-2"></i>Food Delivery Platform
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('restaurants.*') ? 'active' : '' }}" href="{{ route('restaurants.index') }}">
                            <i class="bi bi-journal-richtext me-1"></i>Restaurants & Menu
                        </a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('orders.create') ? 'active' : '' }}" href="{{ route('orders.create') }}">
                                <i class="bi bi-cart-plus me-1"></i>Place Order
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('orders.history') ? 'active' : '' }}" href="{{ route('orders.history') }}">
                                <i class="bi bi-clock-history me-1"></i>Order History
                            </a>
                        </li>
                        @if(auth()->user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link text-warning fw-semibold {{ request()->routeIs('admin.*') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                                    <i class="bi bi-speedometer2 me-1"></i>Admin Dashboard
                                </a>
                            </li>
                        @endif
                    @endauth
                </ul>
                <ul class="navbar-nav ms-auto align-items-center">
                    @auth
                        <li class="nav-item me-3">
                            <span class="text-light me-1">{{ Auth::user()->name }}</span>
                            @if(Auth::user()->role === 'admin')
                                <span class="badge badge-admin">Admin</span>
                            @else
                                <span class="badge badge-customer">Customer</span>
                            @endif
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    <i class="bi bi-box-arrow-right me-1"></i>Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-light btn-sm px-3" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-warning btn-sm px-3 fw-semibold" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Global Alert Banners -->
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                <strong class="d-block mb-1"><i class="bi bi-x-circle-fill me-2"></i>Please fix the following validation errors:</strong>
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </div>

    <!-- Main Content Container -->
    <main class="container my-4 flex-grow-1">
        @yield('content')

        @if (isset($slot))
            {{ $slot }}
        @endif
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-secondary py-3 mt-auto border-top border-secondary">
        <div class="container text-center text-md-between d-md-flex justify-content-between align-items-center">
            <span>&copy; {{ date('Y') }} Food Delivery Platform. Built for Laravel Assessment.</span>
            <span>Laravel Eloquent & Blade Integration</span>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
