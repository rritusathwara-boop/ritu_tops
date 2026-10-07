@extends('layouts.app')

@section('content')
<div class="bg-light py-5">
    <div class="container text-center">
        <h1 class="font-playfair mb-0">Shopping Cart</h1>
        <nav aria-label="breadcrumb" class="d-flex justify-content-center mt-3">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop') }}" class="text-muted text-decoration-none">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    @if(count($cart) > 0)
    <div class="row g-5">
        <div class="col-lg-8">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="bg-light border-0">
                        <tr class="text-uppercase small text-muted">
                            <th class="py-3 px-3">Product</th>
                            <th class="py-3">Price</th>
                            <th class="py-3 text-center">Quantity</th>
                            <th class="py-3 text-end">Subtotal</th>
                            <th class="py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $id => $details)
                        <tr class="border-bottom">
                            <td class="py-3 px-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $details['image'] }}" class="img-fluid border me-3" style="width: 75px; height: 90px; object-fit: cover;" alt="{{ $details['name'] }}">
                                    <div>
                                        <h6 class="font-playfair mb-1">
                                            @if(isset($details['slug']))
                                                <a href="{{ route('product.show', $details['slug']) }}" class="text-dark text-decoration-none">{{ $details['name'] }}</a>
                                            @else
                                                {{ $details['name'] }}
                                            @endif
                                        </h6>
                                        <div class="small text-muted">
                                            @if(isset($details['size']))
                                                <span class="me-2">Size: <strong>{{ $details['size'] }}</strong></span>
                                            @endif
                                            @if(isset($details['color']) && $details['color'] !== 'Default')
                                                <span>Color: <strong>{{ $details['color'] }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3">₹{{ number_format($details['price'], 2) }}</td>
                            <td class="py-3">
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex justify-content-center align-items-center gap-1">
                                    @csrf
                                    <div class="input-group input-group-sm" style="max-width: 110px;">
                                        <input type="number" name="quantity" class="form-control text-center rounded-0 fw-bold" value="{{ $details['quantity'] }}" min="1" max="99">
                                        <button type="submit" class="btn btn-outline-dark rounded-0 px-2" title="Update Quantity">
                                            <i class="fas fa-sync-alt small"></i>
                                        </button>
                                    </div>
                                </form>
                            </td>
                            <td class="py-3 fw-bold text-end">₹{{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                            <td class="py-3 text-center">
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-link text-danger p-0" title="Remove item" onclick="return confirm('Remove this item from your cart?')">
                                        <i class="far fa-trash-alt fs-5"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="d-flex justify-content-between align-items-center mt-4 pt-2">
                <a href="{{ route('shop') }}" class="btn btn-outline-dark rounded-0 px-4 py-2 text-uppercase fw-semibold small">
                    <i class="fas fa-arrow-left me-2"></i> Continue Shopping
                </a>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-0 bg-light p-4 sticky-top" style="top: 100px;">
                <h5 class="font-playfair mb-4 border-bottom pb-3">Order Summary</h5>
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Subtotal ({{ count($cart) }} items)</span>
                    <span class="fw-bold">₹{{ number_format($total, 2) }}</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Estimated Shipping</span>
                    <span class="text-success fw-bold"><i class="fas fa-shipping-fast me-1"></i> FREE</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Estimated Taxes</span>
                    <span class="text-muted">Included in price</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-4">
                    <span class="fw-bold fs-5">Total Payable</span>
                    <span class="fw-bold fs-5" style="color: var(--primary-color);">₹{{ number_format($total, 2) }}</span>
                </div>
                
                @auth
                    <a href="{{ route('checkout.index') }}" class="btn btn-dark w-100 rounded-0 py-3 text-uppercase fw-bold shadow-sm" style="background-color: var(--primary-color); letter-spacing: 1px;">
                        Proceed to Checkout <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-dark w-100 rounded-0 py-3 text-uppercase fw-bold shadow-sm" style="background-color: var(--primary-color); letter-spacing: 1px;">
                        Sign In to Checkout <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                    <p class="small text-muted text-center mt-2 mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-dark fw-bold">Register</a></p>
                @endauth

                <div class="mt-4 pt-3 border-top text-muted small text-center">
                    <i class="fas fa-lock me-1"></i> Guaranteed Safe &amp; Secure Checkout
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="text-center py-5 my-5">
        <div class="mb-4">
            <span class="d-inline-flex p-4 rounded-circle bg-light text-muted">
                <i class="fas fa-shopping-bag fa-3x"></i>
            </span>
        </div>
        <h3 class="font-playfair">Your cart is currently empty</h3>
        <p class="text-muted mb-4 mx-auto" style="max-width: 450px;">Looks like you haven't added any gorgeous styles to your shopping bag yet. Explore our latest western collection now!</p>
        <a href="{{ route('shop') }}" class="btn btn-dark rounded-0 px-5 py-3 text-uppercase fw-semibold shadow-sm" style="background-color: var(--primary-color); letter-spacing: 1px;">
            Explore Collection
        </a>
    </div>
    @endif
</div>
@endsection
