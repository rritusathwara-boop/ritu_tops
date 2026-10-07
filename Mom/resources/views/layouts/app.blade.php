<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mom & Me - Ladies Western Wear</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .badge-cart-count {
            position: absolute;
            top: -6px;
            right: -10px;
            font-size: 0.65rem;
            padding: 0.25em 0.5em;
            background-color: #d4af37;
            color: #111;
            font-weight: 700;
        }
        .nav-icon {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .search-bar-collapse {
            background-color: #fafafa;
            border-bottom: 1px solid #eaeaea;
        }
    </style>
</head>
<body>
    <!-- Top Announcement Bar -->
    <div class="bg-dark text-white py-1 text-center small tracking-wide">
        <span class="small"><i class="fas fa-gem me-1 text-warning"></i> Complimentary Express Shipping on Orders Above ₹1,999 | Use Code: <strong>ELEGANCE</strong></span>
    </div>

    <!-- Search Collapse Bar -->
    <div class="collapse search-bar-collapse py-3" id="searchBar">
        <div class="container">
            <form action="{{ route('shop') }}" method="GET" class="d-flex max-w-lg mx-auto" style="max-width: 600px;">
                <div class="input-group">
                    <input type="text" name="search" class="form-control rounded-0 border-dark" placeholder="Search dresses, tops, skirts, co-ord sets..." value="{{ request('search') }}">
                    <button class="btn btn-dark rounded-0 px-4" type="submit"><i class="fas fa-search me-1"></i> Search</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand font-playfair" href="{{ route('home') }}">
                <strong>Mom &amp; Me</strong>
                <span class="d-block small text-muted font-sans" style="font-size: 0.65rem; letter-spacing: 2px; text-transform: uppercase;">Ladies Western Wear</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'fw-bold text-dark' : '' }}" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('shop*') ? 'fw-bold text-dark' : '' }}" href="{{ route('shop') }}">Shop</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'fw-bold text-dark' : '' }}" href="{{ route('about') }}">About Us</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'fw-bold text-dark' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                </ul>
                <div class="d-flex align-items-center nav-icons">
                    <a class="nav-icon" data-bs-toggle="collapse" href="#searchBar" role="button" aria-expanded="false" title="Search"><i class="fas fa-search"></i></a>
                    
                    @auth
                        <a href="{{ route('wishlist.index') }}" class="nav-icon ms-3" title="Wishlist">
                            <i class="far fa-heart"></i>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="nav-icon ms-3" title="Login for Wishlist">
                            <i class="far fa-heart"></i>
                        </a>
                    @endauth

                    @php
                        $cartSession = session('cart', []);
                        $cartCount = 0;
                        foreach($cartSession as $cItem) {
                            $cartCount += $cItem['quantity'] ?? 1;
                        }
                    @endphp
                    <a href="{{ route('cart.index') }}" class="nav-icon ms-3" title="Cart">
                        <i class="fas fa-shopping-bag"></i>
                        @if($cartCount > 0)
                            <span class="badge rounded-pill badge-cart-count">{{ $cartCount }}</span>
                        @endif
                    </a>
                    
                    @auth
                        <div class="dropdown ms-3">
                            <a href="#" class="nav-icon dropdown-toggle" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="far fa-user"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end rounded-0 shadow border-0" aria-labelledby="userMenu">
                                <li class="px-3 py-2 border-bottom">
                                    <small class="text-muted d-block">Signed in as</small>
                                    <strong>{{ auth()->user()->name }}</strong>
                                </li>
                                <li><a class="dropdown-item py-2" href="{{ route('dashboard') }}"><i class="fas fa-th-large me-2"></i> My Dashboard</a></li>
                                <li><a class="dropdown-item py-2" href="{{ route('wishlist.index') }}"><i class="far fa-heart me-2"></i> My Wishlist</a></li>
                                <li><hr class="dropdown-divider my-1"></li>
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item py-2 text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="nav-icon ms-3" title="Sign In"><i class="far fa-user"></i></a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Global Flash Alerts -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-0 mb-0 border-0 text-center" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show rounded-0 mb-0 border-0 text-center" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer mt-5 pt-5 pb-3">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="font-playfair mb-2">Mom &amp; Me</h5>
                    <p class="text-muted small mb-3">Ladies Western Wear</p>
                    <p class="text-muted small">Discover elegant western wear designed to make every moment stylish. From casual everyday outfits to evening glamour, we offer the best quality and fit.</p>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="mb-3 text-uppercase small fw-bold">Quick Links</h6>
                    <ul class="list-unstyled footer-links small">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('shop') }}">Shop All</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="mb-3 text-uppercase small fw-bold">Account</h6>
                    <ul class="list-unstyled footer-links small">
                        @auth
                            <li><a href="{{ route('dashboard') }}">My Dashboard</a></li>
                            <li><a href="{{ route('wishlist.index') }}">My Wishlist</a></li>
                            <li><a href="{{ route('cart.index') }}">My Cart</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Sign In</a></li>
                            <li><a href="{{ route('register') }}">Create Account</a></li>
                            <li><a href="{{ route('cart.index') }}">Shopping Cart</a></li>
                        @endauth
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <h6 class="mb-3 text-uppercase small fw-bold">Store &amp; Contact</h6>
                    <ul class="list-unstyled text-muted small">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2 text-dark"></i> Shop No. 24, Milan Park Society, Prakash Nagar Bus Stand, Near Jawahar Chowk, Maninagar, Ahmedabad – 380008</li>
                        <li class="mb-2"><i class="fas fa-phone me-2 text-dark"></i> +91 9783074387</li>
                        <li class="mb-2"><i class="fab fa-instagram me-2 text-dark"></i> @mom_and_me1799</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2 text-dark"></i> hello@momandme.com</li>
                    </ul>
                </div>
            </div>
            <div class="text-center text-muted small border-top pt-3">
                &copy; {{ date('Y') }} Mom &amp; Me – Ladies Western Wear. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/script.js') }}"></script>
    @yield('scripts')
</body>
</html>
