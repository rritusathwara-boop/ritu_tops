@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<div class="bg-light py-3 border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop') }}" class="text-muted text-decoration-none">Shop</a></li>
                @if($product->category)
                    <li class="breadcrumb-item"><a href="{{ route('shop', ['category' => $product->category->slug]) }}" class="text-muted text-decoration-none">{{ $product->category->name }}</a></li>
                @endif
                <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    <div class="row g-5">
        <!-- Product Image Gallery -->
        <div class="col-lg-6">
            <div class="position-relative mb-3 bg-light p-2 border overflow-hidden">
                <img src="{{ $product->image_url }}" class="img-fluid w-100 main-product-img" id="mainImage" alt="{{ $product->name }}" style="height: 520px; object-fit: cover;">
                @if($product->is_new_arrival)
                    <span class="badge bg-dark rounded-0 position-absolute top-0 start-0 m-3 p-2 text-uppercase small">New Arrival</span>
                @endif
                @if($product->discount_price)
                    @php
                        $discountPct = round((($product->price - $product->discount_price) / $product->price) * 100);
                    @endphp
                    <span class="badge bg-danger rounded-0 position-absolute top-0 end-0 m-3 p-2 text-uppercase small">{{ $discountPct }}% OFF</span>
                @endif
            </div>

            <!-- Thumbnails -->
            <div class="row g-2">
                @if($product->images && $product->images->count() > 0)
                    @foreach($product->images as $index => $img)
                        <div class="col-3">
                            <img src="{{ $img->url }}" class="img-fluid border cursor-pointer thumbnail-img {{ $loop->first ? 'active' : '' }} w-100" style="height: 90px; object-fit: cover;" alt="{{ $product->name }} Thumb {{ $index + 1 }}">
                        </div>
                    @endforeach
                @else
                    <div class="col-3">
                        <img src="{{ $product->image_url }}" class="img-fluid border cursor-pointer thumbnail-img active w-100" style="height: 90px; object-fit: cover;" alt="{{ $product->name }}">
                    </div>
                @endif
            </div>
        </div>

        <!-- Product Purchase Details -->
        <div class="col-lg-6">
            <p class="text-muted small text-uppercase tracking-wider mb-2" style="letter-spacing: 2px;">{{ $product->category->name ?? 'Western Wear' }}</p>
            <h1 class="font-playfair display-6 fw-bold mb-3">{{ $product->name }}</h1>

            <div class="d-flex align-items-center mb-3">
                <div class="text-warning me-2">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                </div>
                <span class="text-muted small">(4.8 / 5 from 24 verified reviews)</span>
            </div>

            <!-- Price -->
            <div class="d-flex align-items-baseline mb-4">
                @if($product->discount_price)
                    <span class="fs-2 fw-bold text-dark me-3">₹{{ number_format($product->discount_price, 2) }}</span>
                    <span class="fs-5 text-muted text-decoration-line-through me-2">₹{{ number_format($product->price, 2) }}</span>
                    <span class="badge bg-success bg-opacity-10 text-success fw-semibold">Save ₹{{ number_format($product->price - $product->discount_price, 2) }}</span>
                @else
                    <span class="fs-2 fw-bold text-dark">₹{{ number_format($product->price, 2) }}</span>
                @endif
            </div>

            <p class="text-muted mb-4 lead" style="font-size: 1rem; line-height: 1.7;">{{ $product->description }}</p>

            <hr class="mb-4">

            <!-- Add to Cart Form -->
            <form action="{{ route('cart.add') }}" method="POST" id="addToCartForm">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <!-- Sizes -->
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label fw-bold mb-0">Select Size</label>
                        <a href="#sizeModal" data-bs-toggle="modal" class="small text-muted text-decoration-underline">Size Guide</a>
                    </div>
                    <div class="d-flex gap-2 flex-wrap">
                        @if($product->sizes && $product->sizes->count() > 0)
                            @foreach($product->sizes as $idx => $size)
                                <input type="radio" class="btn-check" name="size" id="size-{{ $size->id }}" value="{{ $size->size }}" autocomplete="off" {{ $idx === 0 ? 'checked' : '' }}>
                                <label class="btn btn-outline-dark rounded-0 px-3 py-2" for="size-{{ $size->id }}">{{ $size->size }}</label>
                            @endforeach
                        @else
                            @foreach(['S', 'M', 'L', 'XL'] as $idx => $size)
                                <input type="radio" class="btn-check" name="size" id="size-{{ $size }}" value="{{ $size }}" autocomplete="off" {{ $idx === 1 ? 'checked' : '' }}>
                                <label class="btn btn-outline-dark rounded-0 px-3 py-2" for="size-{{ $size }}">{{ $size }}</label>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Colors -->
                <div class="mb-4">
                    <label class="form-label fw-bold d-block mb-2">Select Color</label>
                    <div class="d-flex gap-3 align-items-center">
                        @if($product->colors && $product->colors->count() > 0)
                            @foreach($product->colors as $idx => $color)
                                <label class="color-radio position-relative cursor-pointer">
                                    <input type="radio" name="color" value="{{ $color->color_name }}" class="d-none color-input" {{ $idx === 0 ? 'checked' : '' }}>
                                    <span class="color-swatch d-inline-block rounded-circle" style="background-color: {{ $color->color_code ?? '#222' }}; width: 32px; height: 32px; border: 2px solid #fff; box-shadow: 0 0 0 1px #ccc;" title="{{ $color->color_name }}"></span>
                                </label>
                            @endforeach
                        @else
                            <label class="color-radio position-relative cursor-pointer">
                                <input type="radio" name="color" value="Classic Black" class="d-none color-input" checked>
                                <span class="color-swatch d-inline-block rounded-circle" style="background-color: #111; width: 32px; height: 32px; border: 2px solid #fff; box-shadow: 0 0 0 1px #ccc;" title="Classic Black"></span>
                            </label>
                            <label class="color-radio position-relative cursor-pointer">
                                <input type="radio" name="color" value="Blush Pink" class="d-none color-input">
                                <span class="color-swatch d-inline-block rounded-circle" style="background-color: #f4c2c2; width: 32px; height: 32px; border: 2px solid #fff; box-shadow: 0 0 0 1px #ccc;" title="Blush Pink"></span>
                            </label>
                            <label class="color-radio position-relative cursor-pointer">
                                <input type="radio" name="color" value="Sunshine Yellow" class="d-none color-input">
                                <span class="color-swatch d-inline-block rounded-circle" style="background-color: #f3ca28; width: 32px; height: 32px; border: 2px solid #fff; box-shadow: 0 0 0 1px #ccc;" title="Sunshine Yellow"></span>
                            </label>
                        @endif
                    </div>
                </div>

                <!-- Quantity & Add to Cart -->
                <div class="d-flex gap-3 mb-4">
                    <div class="input-group w-auto" style="max-width: 140px;">
                        <button class="btn btn-outline-dark rounded-0 px-3" type="button" onclick="decrementQty()">-</button>
                        <input type="number" name="quantity" id="qtyInput" class="form-control text-center border-dark rounded-0 fw-bold" value="1" min="1" max="{{ max(1, $product->stock) }}">
                        <button class="btn btn-outline-dark rounded-0 px-3" type="button" onclick="incrementQty()">+</button>
                    </div>
                    <button type="submit" class="btn btn-dark rounded-0 px-4 py-3 text-uppercase fw-semibold flex-grow-1 shadow-sm" style="background-color: var(--primary-color);">
                        <i class="fas fa-shopping-bag me-2"></i> Add to Cart
                    </button>
                </div>
            </form>

            <!-- Wishlist Button -->
            @auth
                <form action="{{ route('wishlist.add') }}" method="POST" class="mb-4">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-outline-dark rounded-0 w-100 py-2 text-uppercase fw-semibold">
                        <i class="far fa-heart me-2"></i> Save to Wishlist
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-secondary rounded-0 w-100 py-2 text-uppercase fw-semibold mb-4 text-center d-block">
                    <i class="far fa-heart me-2"></i> Login to Save to Wishlist
                </a>
            @endauth

            <!-- Product Specs Meta -->
            <div class="bg-light p-3 border text-muted small">
                <div class="row g-2">
                    <div class="col-6"><strong class="text-dark">SKU:</strong> {{ $product->sku ?? 'MM-'.str_pad($product->id, 4, '0', STR_PAD_LEFT) }}</div>
                    <div class="col-6">
                        <strong class="text-dark">Availability:</strong>
                        @if($product->stock > 0)
                            <span class="text-success fw-bold"><i class="fas fa-check-circle me-1"></i> In Stock ({{ $product->stock }} units)</span>
                        @else
                            <span class="text-danger fw-bold"><i class="fas fa-times-circle me-1"></i> Out of Stock</span>
                        @endif
                    </div>
                    <div class="col-6"><strong class="text-dark">Category:</strong> {{ $product->category->name ?? 'Western Wear' }}</div>
                    <div class="col-6"><strong class="text-dark">Shipping:</strong> Free Delivery (Ahmedabad &amp; All India)</div>
                </div>
            </div>

            <!-- Features bullet list -->
            <div class="mt-4 pt-3 border-top">
                <div class="d-flex align-items-center mb-2 small text-muted">
                    <i class="fas fa-undo me-2 text-dark"></i> 7 Days Easy Return &amp; Exchange Policy
                </div>
                <div class="d-flex align-items-center mb-2 small text-muted">
                    <i class="fas fa-shield-alt me-2 text-dark"></i> 100% Genuine Quality Guaranteed
                </div>
                <div class="d-flex align-items-center small text-muted">
                    <i class="fas fa-truck me-2 text-dark"></i> Dispatched within 24-48 Business Hours
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    @if(isset($relatedProducts) && $relatedProducts->count() > 0)
    <div class="mt-5 pt-5 border-top">
        <div class="text-center mb-5">
            <span class="text-uppercase small text-muted tracking-wider">You May Also Like</span>
            <h3 class="font-playfair display-6 fw-bold mt-1">Related Products</h3>
            <div class="mx-auto bg-warning mt-2" style="width: 50px; height: 2px;"></div>
        </div>
        <div class="row g-4">
            @foreach($relatedProducts as $relProduct)
            <div class="col-lg-3 col-md-6 col-6">
                <div class="card border-0 rounded-0 h-100 product-card shadow-sm d-flex flex-column justify-content-between">
                    <div>
                        <a href="{{ route('product.show', $relProduct->slug) }}" class="d-block overflow-hidden" style="height: 280px;">
                            <img src="{{ $relProduct->image_url }}" class="card-img-top rounded-0 w-100 h-100" style="object-fit: cover;" alt="{{ $relProduct->name }}">
                        </a>
                        <div class="card-body text-center p-3">
                            <p class="text-muted small mb-1">{{ $relProduct->category->name ?? '' }}</p>
                            <h6 class="font-playfair mb-2">
                                <a href="{{ route('product.show', $relProduct->slug) }}" class="text-dark text-decoration-none">{{ $relProduct->name }}</a>
                            </h6>
                            <p class="fw-bold mb-0">
                                @if($relProduct->discount_price)
                                    <span class="text-decoration-line-through text-muted fw-normal me-2 small">₹{{ number_format($relProduct->price, 2) }}</span>
                                    <span class="text-danger">₹{{ number_format($relProduct->discount_price, 2) }}</span>
                                @else
                                    <span>₹{{ number_format($relProduct->price, 2) }}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="p-3 pt-0">
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $relProduct->id }}">
                            <button type="submit" class="btn btn-outline-dark rounded-0 w-100 text-uppercase fw-semibold py-2 small">
                                <i class="fas fa-shopping-bag me-1"></i> Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>

<!-- Size Modal -->
<div class="modal fade" id="sizeModal" tabindex="-1" aria-labelledby="sizeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0 border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title font-playfair" id="sizeModalLabel">Size Guide (Inches)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <table class="table table-bordered text-center align-middle small">
                    <thead class="bg-light">
                        <tr>
                            <th>Size</th>
                            <th>Bust</th>
                            <th>Waist</th>
                            <th>Hip</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>XS</td><td>32"</td><td>26"</td><td>35"</td></tr>
                        <tr><td>S</td><td>34"</td><td>28"</td><td>37"</td></tr>
                        <tr><td>M</td><td>36"</td><td>30"</td><td>39"</td></tr>
                        <tr><td>L</td><td>38"</td><td>32"</td><td>41"</td></tr>
                        <tr><td>XL</td><td>40"</td><td>34"</td><td>43"</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .cursor-pointer { cursor: pointer; }
    .thumbnail-img {
        opacity: 0.65;
        transition: all 0.2s ease;
    }
    .thumbnail-img:hover, .thumbnail-img.active {
        opacity: 1;
        border-color: #2c2c2c !important;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }
    .color-input:checked + .color-swatch {
        box-shadow: 0 0 0 3px var(--primary-color) !important;
        transform: scale(1.1);
    }
    .color-swatch {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .color-swatch:hover {
        transform: scale(1.1);
    }
</style>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const thumbnails = document.querySelectorAll('.thumbnail-img');
        const mainImage = document.getElementById('mainImage');

        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', function() {
                thumbnails.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                mainImage.src = this.src;
            });
        });
    });

    function incrementQty() {
        const input = document.getElementById('qtyInput');
        const max = parseInt(input.getAttribute('max')) || 99;
        let val = parseInt(input.value) || 1;
        if (val < max) {
            input.value = val + 1;
        }
    }

    function decrementQty() {
        const input = document.getElementById('qtyInput');
        let val = parseInt(input.value) || 1;
        if (val > 1) {
            input.value = val - 1;
        }
    }
</script>
@endsection

@endsection
