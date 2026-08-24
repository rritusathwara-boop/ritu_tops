@extends('layouts.app')

@section('title', 'Customer Dashboard - Task 3')

@section('content')
<div class="row">
    <div class="col-12 mb-4">
        <div class="card shadow-sm border-0 bg-primary text-white p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="fw-bold mb-1">Welcome back, {{ Auth::user()->name }}!</h2>
                    <p class="mb-0 text-white-50">You are logged into the Customer Portal (Protected by Auth Middleware - Task 3).</p>
                </div>
                <i class="bi bi-shield-check display-3 opacity-50"></i>
            </div>
        </div>
    </div>

    <!-- Quick Actions Cards -->
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body text-center p-4">
                <div class="feature-icon bg-light text-primary fs-1 mb-3 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                    <i class="bi bi-book"></i>
                </div>
                <h5 class="fw-bold">Task 1: Restaurant Menu</h5>
                <p class="text-muted">Browse full list of food items, categories, and prices.</p>
                <a href="{{ url('/menu') }}" class="btn btn-outline-primary w-100">View Menu</a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body text-center p-4">
                <div class="feature-icon bg-light text-success fs-1 mb-3 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                    <i class="bi bi-cart-plus"></i>
                </div>
                <h5 class="fw-bold">Task 4: Place New Order</h5>
                <p class="text-muted">Order food from your favorite restaurant with instant confirmation mail.</p>
                <a href="{{ route('orders.create') }}" class="btn btn-success w-100">Place Order</a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body text-center p-4">
                <div class="feature-icon bg-light text-warning fs-1 mb-3 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                    <i class="bi bi-clock-history"></i>
                </div>
                <h5 class="fw-bold">Task 3 & 4: Order History</h5>
                <p class="text-muted">View all your placed orders and their real-time delivery status.</p>
                <a href="{{ route('orders.index') }}" class="btn btn-outline-warning w-100">My Orders</a>
            </div>
        </div>
    </div>
</div>
@endsection
