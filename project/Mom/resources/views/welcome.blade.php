@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero-section text-center position-relative" style="background: url('{{ asset('assets/images/partyware.jpeg') }}') no-repeat center center/cover; height: 80vh;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.4);"></div>
    <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative text-white z-1 animate-on-scroll">
        <h1 class="display-3 fw-bold mb-3 font-playfair text-white">New Season, New Style</h1>
        <p class="lead mb-4">Discover elegant western wear designed to make every moment stylish.</p>
        <div>
            <a href="#" class="btn btn-light btn-lg px-4 py-2 me-3 rounded-0 text-uppercase fw-semibold" style="color: var(--primary-color);">Shop Collection</a>
            <a href="#" class="btn btn-outline-light btn-lg px-4 py-2 rounded-0 text-uppercase fw-semibold">Explore New Arrivals</a>
        </div>
    </div>
</section>

<!-- Category Section -->
<section class="py-5 bg-light">
    <div class="container animate-on-scroll">
        <h2 class="text-center mb-5 font-playfair">Shop by Category</h2>
        <div class="row g-4">
            @foreach($categories as $category)
            <div class="col-md-3 col-6">
                <div class="card border-0 rounded-0 shadow-sm category-card h-100">
                    <a href="{{ route('shop', ['category' => $category->slug]) }}" class="d-block overflow-hidden" style="height: 240px;">
                        <img src="{{ $category->image_url }}" class="card-img-top rounded-0 w-100 h-100" style="object-fit: cover;" alt="{{ $category->name }}">
                    </a>
                    <div class="card-body text-center">
                        <h5 class="card-title font-playfair mb-1">{{ $category->name }}</h5>
                        <small class="text-muted d-block mb-2">{{ $category->products_count ?? $category->products->count() }} Products</small>
                        <a href="{{ route('shop', ['category' => $category->slug]) }}" class="btn btn-link text-decoration-none p-0 text-uppercase small fw-bold" style="color: var(--primary-color);">Explore <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="py-5">
    <div class="container animate-on-scroll">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <span class="text-uppercase small fw-bold text-muted" style="letter-spacing: 2px;">Curated For You</span>
                <h2 class="font-playfair mb-0">Featured Collection</h2>
            </div>
            <a href="{{ route('shop', ['filter' => 'featured']) }}" class="text-decoration-none text-dark small fw-semibold text-uppercase">View All <i class="fas fa-arrow-right ms-1"></i></a>
        </div>
        <div class="row g-4">
            @forelse($featuredProducts as $product)
            <div class="col-lg-3 col-md-4 col-6">
                <div class="card border-0 rounded-0 h-100 product-card position-relative overflow-hidden shadow-sm d-flex flex-column justify-content-between">
                    @if($product->is_new_arrival)
                        <span class="badge bg-dark rounded-0 position-absolute top-0 start-0 m-2 p-2 text-uppercase small z-2">New</span>
                    @endif
                    <div>
                        <a href="{{ route('product.show', $product->slug) }}" class="d-block overflow-hidden" style="height: 280px;">
                            <img src="{{ $product->image_url }}" class="card-img-top rounded-0 w-100 h-100" style="object-fit: cover;" alt="{{ $product->name }}">
                        </a>
                        <div class="card-body text-center p-3">
                            <p class="text-muted small mb-1 text-uppercase">{{ $product->category->name ?? 'Collection' }}</p>
                            <h5 class="card-title font-playfair mb-2" style="font-size: 1rem;">
                                <a href="{{ route('product.show', $product->slug) }}" class="text-dark text-decoration-none">{{ $product->name }}</a>
                            </h5>
                            <p class="card-text fw-bold mb-3">
                                @if($product->discount_price)
                                    <span class="text-decoration-line-through text-muted fw-normal me-2 small">₹{{ number_format($product->price, 2) }}</span>
                                    <span class="text-danger">₹{{ number_format($product->discount_price, 2) }}</span>
                                @else
                                    <span>₹{{ number_format($product->price, 2) }}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="p-3 pt-0">
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-outline-dark rounded-0 w-100 text-uppercase fw-semibold py-2 small add-to-cart-btn">
                                <i class="fas fa-shopping-bag me-1"></i> Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-4 text-muted">No featured products found.</div>
            @endforelse
        </div>
    </div>
</section>

@if(isset($newArrivals) && $newArrivals->count() > 0)
<!-- New Arrivals Section -->
<section class="py-5 bg-light">
    <div class="container animate-on-scroll">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <span class="text-uppercase small fw-bold text-muted" style="letter-spacing: 2px;">Fresh Drops</span>
                <h2 class="font-playfair mb-0">New Arrivals</h2>
            </div>
            <a href="{{ route('shop', ['filter' => 'new']) }}" class="text-decoration-none text-dark small fw-semibold text-uppercase">View All <i class="fas fa-arrow-right ms-1"></i></a>
        </div>
        <div class="row g-4">
            @foreach($newArrivals->take(4) as $product)
            <div class="col-lg-3 col-md-4 col-6">
                <div class="card border-0 rounded-0 h-100 product-card position-relative overflow-hidden shadow-sm d-flex flex-column justify-content-between bg-white">
                    <span class="badge bg-danger rounded-0 position-absolute top-0 start-0 m-2 p-2 text-uppercase small z-2">New</span>
                    <div>
                        <a href="{{ route('product.show', $product->slug) }}" class="d-block overflow-hidden" style="height: 280px;">
                            <img src="{{ $product->image_url }}" class="card-img-top rounded-0 w-100 h-100" style="object-fit: cover;" alt="{{ $product->name }}">
                        </a>
                        <div class="card-body text-center p-3">
                            <p class="text-muted small mb-1 text-uppercase">{{ $product->category->name ?? 'Collection' }}</p>
                            <h5 class="card-title font-playfair mb-2" style="font-size: 1rem;">
                                <a href="{{ route('product.show', $product->slug) }}" class="text-dark text-decoration-none">{{ $product->name }}</a>
                            </h5>
                            <p class="card-text fw-bold mb-3">
                                @if($product->discount_price)
                                    <span class="text-decoration-line-through text-muted fw-normal me-2 small">₹{{ number_format($product->price, 2) }}</span>
                                    <span class="text-danger">₹{{ number_format($product->discount_price, 2) }}</span>
                                @else
                                    <span>₹{{ number_format($product->price, 2) }}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="p-3 pt-0">
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-outline-dark rounded-0 w-100 text-uppercase fw-semibold py-2 small add-to-cart-btn">
                                <i class="fas fa-shopping-bag me-1"></i> Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Promotional Banner -->
<section class="py-5 text-white text-center position-relative" style="background: url('{{ asset('assets/images/partyware.jpeg') }}') no-repeat center center/cover; padding-top: 100px !important; padding-bottom: 100px !important;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.5);"></div>
    <div class="container position-relative z-1 animate-on-scroll">
        <h2 class="display-4 font-playfair fw-bold mb-3 text-white">Elevate Your Everyday Style</h2>
        <p class="lead mb-4">Discover effortless fashion made for every mood, moment and occasion.</p>
        <a href="#" class="btn btn-light btn-lg px-5 py-2 rounded-0 text-uppercase fw-semibold" style="color: var(--primary-color);">Shop Now</a>
    </div>
</section>

<!-- Features Section -->
<section class="py-5 bg-light">
    <div class="container animate-on-scroll">
        <div class="row text-center g-4">
            <div class="col-md-3">
                <div class="mb-3"><i class="fas fa-crown fa-3x" style="color: var(--accent-color);"></i></div>
                <h5 class="font-playfair">Premium Quality</h5>
                <p class="text-muted small">Carefully selected fashion products.</p>
            </div>
            <div class="col-md-3">
                <div class="mb-3"><i class="fas fa-tshirt fa-3x" style="color: var(--accent-color);"></i></div>
                <h5 class="font-playfair">Trendy Styles</h5>
                <p class="text-muted small">Modern western wear for every occasion.</p>
            </div>
            <div class="col-md-3">
                <div class="mb-3"><i class="fas fa-shopping-bag fa-3x" style="color: var(--accent-color);"></i></div>
                <h5 class="font-playfair">Easy Shopping</h5>
                <p class="text-muted small">Simple and secure online shopping experience.</p>
            </div>
            <div class="col-md-3">
                <div class="mb-3"><i class="fas fa-headset fa-3x" style="color: var(--accent-color);"></i></div>
                <h5 class="font-playfair">Customer Support</h5>
                <p class="text-muted small">Friendly support for customers.</p>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-5 text-center">
    <div class="container animate-on-scroll">
        <h2 class="font-playfair mb-3">Stay In Style</h2>
        <p class="text-muted mb-4">Subscribe to receive new arrivals, exclusive offers and fashion updates.</p>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="d-flex">
                    <input type="email" class="form-control rounded-0 p-3" placeholder="Enter your email address" required>
                    <button class="btn btn-dark rounded-0 px-4 text-uppercase fw-semibold" style="background-color: var(--primary-color);" type="submit">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Additional Custom CSS for this page -->
<style>
    .category-card img {
        transition: transform 0.5s ease;
    }
    .category-card:hover img {
        transform: scale(1.05);
    }
    .category-card {
        overflow: hidden;
    }
    
    .product-card .add-to-cart-btn {
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease;
    }
    .product-card:hover .add-to-cart-btn {
        opacity: 1;
        transform: translateY(0);
    }
    .product-card img {
        transition: transform 0.5s ease;
    }
    .product-card:hover img {
        transform: scale(1.03);
    }
</style>
@endsection
