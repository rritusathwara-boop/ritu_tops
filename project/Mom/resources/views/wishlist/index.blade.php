@extends('layouts.app')

@section('content')
<div class="bg-light py-5">
    <div class="container text-center">
        <h1 class="font-playfair mb-0">My Wishlist</h1>
        <nav aria-label="breadcrumb" class="d-flex justify-content-center mt-3">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop') }}" class="text-muted text-decoration-none">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    @if(count($items) > 0)
        <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
            <p class="text-muted mb-0"><strong>{{ count($items) }}</strong> item(s) saved in your wishlist</p>
            <a href="{{ route('shop') }}" class="btn btn-outline-dark rounded-0 text-uppercase fw-semibold px-4 small">Continue Shopping</a>
        </div>

        <div class="row g-4">
            @foreach($items as $item)
            @if($item->product)
            <div class="col-lg-3 col-md-4 col-6">
                <div class="card border-0 rounded-0 h-100 shadow-sm product-card position-relative overflow-hidden d-flex flex-column justify-content-between">
                    <!-- Remove from Wishlist -->
                    <form action="{{ route('wishlist.remove', $item->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-light rounded-circle position-absolute top-0 end-0 m-2 shadow-sm z-2 text-danger" title="Remove from Wishlist" style="width:34px;height:34px;line-height:1;display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-times small"></i>
                        </button>
                    </form>

                    <div>
                        <a href="{{ route('product.show', $item->product->slug) }}" class="d-block overflow-hidden" style="height: 280px;">
                            <img src="{{ $item->product->image_url }}"
                                class="card-img-top rounded-0 w-100 h-100"
                                style="object-fit: cover;"
                                alt="{{ $item->product->name }}">
                        </a>

                        <div class="card-body text-center p-3">
                            <p class="text-muted small mb-1 text-uppercase">{{ $item->product->category->name ?? 'Western Wear' }}</p>
                            <h6 class="font-playfair mb-2">
                                <a href="{{ route('product.show', $item->product->slug) }}" class="text-dark text-decoration-none">
                                    {{ $item->product->name }}
                                </a>
                            </h6>
                            <p class="fw-bold mb-3">
                                @if($item->product->discount_price)
                                    <span class="text-decoration-line-through text-muted fw-normal me-1 small">₹{{ number_format($item->product->price, 2) }}</span>
                                    <span class="text-danger">₹{{ number_format($item->product->discount_price, 2) }}</span>
                                @else
                                    <span>₹{{ number_format($item->product->price, 2) }}</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="p-3 pt-0">
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                            <button type="submit" class="btn btn-dark rounded-0 w-100 text-uppercase fw-semibold py-2 small" style="background-color: var(--primary-color);">
                                <i class="fas fa-shopping-bag me-1"></i> Move to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    @else
        <div class="text-center py-5 my-5">
            <div class="mb-4">
                <span class="d-inline-flex p-4 rounded-circle bg-light text-muted">
                    <i class="far fa-heart fa-3x"></i>
                </span>
            </div>
            <h3 class="font-playfair">Your Wishlist is Empty</h3>
            <p class="text-muted mb-4 mx-auto" style="max-width: 450px;">Save your favourite fashion pieces here and shop them whenever you're ready.</p>
            <a href="{{ route('shop') }}" class="btn btn-dark rounded-0 px-5 py-3 text-uppercase fw-semibold shadow-sm" style="background-color: var(--primary-color); letter-spacing: 1px;">
                Discover Collection
            </a>
        </div>
    @endif
</div>
@endsection
