@extends('layouts.app')

@section('content')
<!-- Page Header -->
<div class="bg-light py-5">
    <div class="container text-center">
        <h1 class="font-playfair mb-0">Shop Collection</h1>
        <nav aria-label="breadcrumb" class="d-flex justify-content-center mt-3">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
                @if($selectedCategory)
                    <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">{{ ucwords(str_replace('-', ' ', $selectedCategory)) }}</li>
                @endif
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <!-- Sidebar Filters -->
        <div class="col-lg-3 mb-5 mb-lg-0">
            <div class="card border-0 shadow-sm rounded-0 p-4 sticky-top" style="top: 100px;">
                <!-- Clear Filters Button if any filter is active -->
                @if(request('category') || request('min_price') || request('max_price') || request('search') || request('filter'))
                    <div class="mb-4 pb-3 border-bottom d-flex justify-content-between align-items-center">
                        <span class="small fw-bold text-dark">Active Filters</span>
                        <a href="{{ route('shop') }}" class="small text-danger text-decoration-none"><i class="fas fa-times-circle me-1"></i>Reset All</a>
                    </div>
                @endif

                <h5 class="font-playfair mb-3 border-bottom pb-2">Categories</h5>
                <ul class="list-unstyled mb-4">
                    <li class="mb-2">
                        <a href="{{ route('shop', array_merge(request()->except(['category', 'page']))) }}"
                           class="text-decoration-none d-flex justify-content-between align-items-center filter-link {{ !$selectedCategory ? 'text-dark fw-bold' : 'text-muted' }}">
                            <span>All Categories</span>
                        </a>
                    </li>
                    @foreach($categories as $category)
                    <li class="mb-2">
                        <a href="{{ route('shop', array_merge(request()->except(['page']), ['category' => $category->slug])) }}"
                           class="text-decoration-none d-flex justify-content-between align-items-center filter-link {{ $selectedCategory == $category->slug ? 'text-dark fw-bold' : 'text-muted' }}">
                            <span>{{ $category->name }}</span>
                            <span class="badge bg-light text-muted border rounded-pill">{{ $category->products_count }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>

                <h5 class="font-playfair mb-3 border-bottom pb-2">Price Range</h5>
                <form action="{{ route('shop') }}" method="GET">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    @if(request('sort'))
                        <input type="hidden" name="sort" value="{{ request('sort') }}">
                    @endif
                    <div class="d-flex align-items-center mb-3">
                        <div class="input-group input-group-sm">
                            <span class="input-group-text rounded-0">₹</span>
                            <input type="number" name="min_price" class="form-control rounded-0" placeholder="Min" min="0" value="{{ request('min_price') }}">
                        </div>
                        <span class="mx-2 text-muted">-</span>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text rounded-0">₹</span>
                            <input type="number" name="max_price" class="form-control rounded-0" placeholder="Max" min="0" value="{{ request('max_price') }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark btn-sm w-100 rounded-0 text-uppercase fw-semibold" style="background-color: var(--primary-color);">Apply Filter</button>
                </form>

                <h5 class="font-playfair mt-4 mb-3 border-bottom pb-2">Special Collections</h5>
                <ul class="list-unstyled mb-0 small">
                    <li class="mb-2">
                        <a href="{{ route('shop', ['filter' => 'new']) }}" class="text-decoration-none {{ request('filter') == 'new' ? 'text-dark fw-bold' : 'text-muted' }} filter-link">
                            <i class="fas fa-sparkles me-1 text-warning"></i> New Arrivals
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('shop', ['filter' => 'featured']) }}" class="text-decoration-none {{ request('filter') == 'featured' ? 'text-dark fw-bold' : 'text-muted' }} filter-link">
                            <i class="fas fa-star me-1 text-warning"></i> Featured Collection
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="col-lg-9">
            <!-- Header bar with count and sort -->
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-3 border-bottom gap-2">
                <div>
                    <p class="mb-0 text-muted small">
                        Showing <strong>{{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }}</strong> of <strong>{{ $products->total() }}</strong> products
                        @if(request('search'))
                            for "<strong>{{ request('search') }}</strong>"
                        @endif
                    </p>
                </div>
                <div class="d-flex align-items-center">
                    <label class="small text-muted me-2 mb-0 d-none d-sm-inline">Sort by:</label>
                    <select class="form-select form-select-sm border-0 bg-light rounded-0 shadow-sm" onchange="location = this.value;" style="min-width: 170px;">
                        <option value="{{ route('shop', array_merge(request()->except(['sort', 'page']), ['sort' => 'newest'])) }}" {{ request('sort', 'newest') == 'newest' ? 'selected' : '' }}>Newest Arrivals</option>
                        <option value="{{ route('shop', array_merge(request()->except(['sort', 'page']), ['sort' => 'price_low'])) }}" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="{{ route('shop', array_merge(request()->except(['sort', 'page']), ['sort' => 'price_high'])) }}" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                        <option value="{{ route('shop', array_merge(request()->except(['sort', 'page']), ['sort' => 'name_asc'])) }}" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name: A to Z</option>
                    </select>
                </div>
            </div>

            <!-- Products Row -->
            <div class="row g-4 mb-5">
                @forelse($products as $product)
                <div class="col-md-4 col-6">
                    <div class="card border-0 rounded-0 h-100 product-card position-relative overflow-hidden shadow-sm d-flex flex-column justify-content-between">
                        @if($product->is_new_arrival)
                            <span class="badge bg-dark rounded-0 position-absolute top-0 start-0 m-2 p-2 text-uppercase small z-2">New</span>
                        @endif
                        <div>
                            <a href="{{ route('product.show', $product->slug) }}" class="d-block overflow-hidden" style="height: 300px;">
                                <img src="{{ $product->image_url }}" class="card-img-top rounded-0 w-100 h-100" style="object-fit: cover;" alt="{{ $product->name }}">
                            </a>
                            <div class="card-body text-center p-3">
                                <p class="text-muted small mb-1 text-uppercase">{{ $product->category->name ?? 'Western Wear' }}</p>
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
                            @auth
                            <form action="{{ route('wishlist.add') }}" method="POST" class="mt-2">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-outline-secondary rounded-0 w-100 text-uppercase fw-semibold py-1" style="font-size:0.75rem;">
                                    <i class="far fa-heart me-1"></i> Wishlist
                                </button>
                            </form>
                            @endauth
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <i class="fas fa-search fa-3x text-muted mb-3"></i>
                    <h4 class="font-playfair">No products match your criteria</h4>
                    <p class="text-muted mb-4">Try clearing some filters or searching for something else.</p>
                    <a href="{{ route('shop') }}" class="btn btn-dark rounded-0 px-4 py-2 text-uppercase fw-semibold" style="background-color: var(--primary-color);">Clear All Filters</a>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($products->hasPages())
            <div class="d-flex justify-content-center custom-pagination">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
            @endif
        </div>
    </div>
</div>

<style>
    .filter-link:hover {
        color: var(--accent-color) !important;
        padding-left: 4px;
        transition: all 0.2s ease;
    }
    .product-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.08) !important;
    }
    .custom-pagination .page-link {
        color: var(--primary-color);
        border-radius: 0 !important;
        padding: 8px 16px;
    }
    .custom-pagination .page-item.active .page-link {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
    }
</style>
@endsection
