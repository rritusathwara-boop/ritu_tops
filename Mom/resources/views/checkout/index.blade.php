@extends('layouts.app')

@section('content')
<div class="bg-light py-5">
    <div class="container text-center">
        <h1 class="font-playfair mb-0">Checkout</h1>
        <nav aria-label="breadcrumb" class="d-flex justify-content-center mt-3">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cart.index') }}" class="text-muted text-decoration-none">Cart</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <div class="row g-5">
            <!-- Shipping Information -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-0 p-4 mb-4">
                    <h4 class="font-playfair mb-4 border-bottom pb-3">Shipping &amp; Billing Details</h4>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Full Name</label>
                            <input type="text" class="form-control rounded-0 bg-light" value="{{ auth()->user()->name }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Email Address</label>
                            <input type="email" class="form-control rounded-0 bg-light" value="{{ auth()->user()->email }}" readonly>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Phone Number <span class="text-danger">*</span></label>
                        <input type="tel" name="phone" class="form-control rounded-0" value="{{ old('phone', auth()->user()->phone) }}" placeholder="e.g. 9783074387" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Street Address <span class="text-danger">*</span></label>
                        <input type="text" name="address" class="form-control rounded-0" placeholder="House/Flat number, Building, Street name" value="{{ old('address', auth()->user()->address) }}" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">City <span class="text-danger">*</span></label>
                            <input type="text" name="city" class="form-control rounded-0" placeholder="City" value="{{ old('city', auth()->user()->city ?? 'Ahmedabad') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">State <span class="text-danger">*</span></label>
                            <select name="state" class="form-select rounded-0" required>
                                @php
                                    $states = ['Gujarat', 'Maharashtra', 'Rajasthan', 'Delhi', 'Karnataka', 'Madhya Pradesh', 'Punjab', 'Uttar Pradesh'];
                                    $userState = old('state', auth()->user()->state ?? 'Gujarat');
                                @endphp
                                @foreach($states as $st)
                                    <option value="{{ $st }}" {{ $userState == $st ? 'selected' : '' }}>{{ $st }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">PIN Code <span class="text-danger">*</span></label>
                            <input type="text" name="pincode" class="form-control rounded-0" placeholder="e.g. 380008" value="{{ old('pincode', auth()->user()->pincode) }}" required>
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="card border-0 shadow-sm rounded-0 p-4">
                    <h4 class="font-playfair mb-4 border-bottom pb-3">Select Payment Method</h4>
                    
                    <div class="form-check p-3 border mb-3 rounded-0 bg-light">
                        <input class="form-check-input ms-0 me-3" type="radio" name="payment_method" id="cod" value="Cash on Delivery" checked>
                        <label class="form-check-label fw-bold d-block" for="cod">
                            <i class="fas fa-money-bill-wave text-success me-2"></i> Cash on Delivery (COD)
                            <small class="text-muted d-block fw-normal mt-1">Pay with cash or UPI when your order is delivered at your doorstep.</small>
                        </label>
                    </div>

                    <div class="form-check p-3 border rounded-0 bg-light">
                        <input class="form-check-input ms-0 me-3" type="radio" name="payment_method" id="online" value="Online Payment">
                        <label class="form-check-label fw-bold d-block" for="online">
                            <i class="fas fa-credit-card text-primary me-2"></i> UPI / Debit Card / Net Banking (Instant)
                            <small class="text-muted d-block fw-normal mt-1">Pay instantly via Google Pay, PhonePe, Paytm, Debit Card, or Net Banking.</small>
                        </label>
                    </div>
                </div>
            </div>
            
            <!-- Order Summary -->
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-0 bg-light p-4 sticky-top" style="top: 100px;">
                    <h5 class="font-playfair mb-4 border-bottom pb-3">Your Order ({{ count($cart) }} items)</h5>
                    
                    <div class="order-items-list mb-3" style="max-height: 280px; overflow-y: auto;">
                        @foreach($cart as $item)
                        <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                            <div class="d-flex align-items-center">
                                <img src="{{ $item['image'] }}" class="border me-3" style="width: 50px; height: 60px; object-fit: cover;" alt="">
                                <div>
                                    <h6 class="mb-0 font-playfair small fw-bold">{{ $item['name'] }}</h6>
                                    <small class="text-muted d-block">
                                        Qty: {{ $item['quantity'] }} 
                                        @if(isset($item['size'])) | Size: {{ $item['size'] }} @endif
                                    </small>
                                </div>
                            </div>
                            <span class="fw-bold small">₹{{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Subtotal</span>
                        <span class="fw-bold">₹{{ number_format($total, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Shipping Charges</span>
                        <span class="text-success fw-bold">FREE</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Estimated Tax</span>
                        <span class="text-muted">₹0.00</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-4">
                        <span class="fw-bold fs-5">Total Amount</span>
                        <span class="fw-bold fs-5" style="color: var(--primary-color);">₹{{ number_format($total, 2) }}</span>
                    </div>
                    
                    <button type="submit" class="btn btn-dark w-100 rounded-0 py-3 text-uppercase fw-bold shadow-sm" style="background-color: var(--primary-color); letter-spacing: 1px;">
                        Place Order <i class="fas fa-check-circle ms-2"></i>
                    </button>

                    <div class="text-center mt-3 text-muted small">
                        <i class="fas fa-shield-alt me-1"></i> 100% Secure &amp; Encrypted Checkout
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
