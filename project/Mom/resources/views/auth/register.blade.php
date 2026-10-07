@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card border-0 shadow-sm rounded-0 p-4 p-md-5">
                <div class="text-center mb-4">
                    <h2 class="font-playfair mb-1">Create Account</h2>
                    <p class="text-muted small">Join Mom &amp; Me for exclusive discounts, order tracking, and wishlist access.</p>
                </div>

                @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger rounded-0 small py-2">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label small fw-bold">Full Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control rounded-0" id="name" name="name" value="{{ old('name') }}" placeholder="e.g. Ritu Sharma" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label small fw-bold">Email Address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control rounded-0" id="email" name="email" value="{{ old('email') }}" placeholder="e.g. ritu@example.com" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label small fw-bold">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control rounded-0" id="password" name="password" placeholder="At least 6 characters" required>
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label small fw-bold">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control rounded-0" id="password_confirmation" name="password_confirmation" placeholder="Re-type password" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label small fw-bold">Phone Number</label>
                        <input type="tel" class="form-control rounded-0" id="phone" name="phone" value="{{ old('phone') }}" placeholder="e.g. 9783074387">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label small fw-bold">Address</label>
                        <input type="text" class="form-control rounded-0" id="address" name="address" value="{{ old('address') }}" placeholder="Street address, society, or apartment">
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-5">
                            <label for="city" class="form-label small fw-bold">City</label>
                            <input type="text" class="form-control rounded-0" id="city" name="city" value="{{ old('city', 'Ahmedabad') }}" placeholder="City">
                        </div>
                        <div class="col-md-4">
                            <label for="state" class="form-label small fw-bold">State</label>
                            <input type="text" class="form-control rounded-0" id="state" name="state" value="{{ old('state', 'Gujarat') }}" placeholder="State">
                        </div>
                        <div class="col-md-3">
                            <label for="pincode" class="form-label small fw-bold">PIN Code</label>
                            <input type="text" class="form-control rounded-0" id="pincode" name="pincode" value="{{ old('pincode', '380008') }}" placeholder="Pincode">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark w-100 rounded-0 py-3 text-uppercase fw-bold shadow-sm" style="background-color: var(--primary-color); letter-spacing: 1px;">
                        Register Now
                    </button>
                </form>

                <div class="mt-4 text-center">
                    <p class="small text-muted mb-0">Already have an account? <a href="{{ route('login') }}" class="text-dark fw-bold text-decoration-none">Sign in here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
