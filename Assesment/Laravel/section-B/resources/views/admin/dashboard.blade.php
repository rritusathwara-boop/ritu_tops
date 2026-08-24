@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="fw-bold text-dark mb-1"><i class="bi bi-shield-lock-fill text-warning me-2"></i>Admin Dashboard</h1>
        <p class="text-muted mb-0">Manage platform restaurants, menu items, and view system metrics.</p>
    </div>
    <div>
        <a href="{{ route('admin.restaurants.create') }}" class="btn btn-primary me-2">
            <i class="bi bi-plus-circle me-1"></i>Add Restaurant
        </a>
        <a href="{{ route('admin.menu_items.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i>Add Menu Item
        </a>
    </div>
</div>

<!-- Metrics Cards -->
<div class="row g-4 mb-5">
    <div class="col-md-3">
        <div class="card shadow-sm border-0 bg-primary text-white p-3 rounded-3">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-white-50 text-uppercase fw-semibold mb-1">Restaurants</h6>
                    <h2 class="display-6 fw-bold mb-0">{{ $restaurantCount }}</h2>
                </div>
                <i class="bi bi-shop fs-1 opacity-75"></i>
            </div>
            <div class="card-footer bg-transparent border-0 pt-0 text-end">
                <a href="{{ route('admin.restaurants.index') }}" class="text-white text-decoration-none small fw-semibold">Manage <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0 bg-success text-white p-3 rounded-3">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-white-50 text-uppercase fw-semibold mb-1">Menu Items</h6>
                    <h2 class="display-6 fw-bold mb-0">{{ $menuItemCount }}</h2>
                </div>
                <i class="bi bi-journal-richtext fs-1 opacity-75"></i>
            </div>
            <div class="card-footer bg-transparent border-0 pt-0 text-end">
                <a href="{{ route('admin.menu_items.index') }}" class="text-white text-decoration-none small fw-semibold">Manage <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0 bg-warning text-dark p-3 rounded-3">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-dark-50 text-uppercase fw-semibold mb-1">Total Orders</h6>
                    <h2 class="display-6 fw-bold mb-0">{{ $orderCount }}</h2>
                </div>
                <i class="bi bi-bag-check fs-1 opacity-75"></i>
            </div>
            <div class="card-footer bg-transparent border-0 pt-0 text-end">
                <span class="text-dark small fw-semibold">Customer Orders</span>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0 bg-info text-white p-3 rounded-3">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-white-50 text-uppercase fw-semibold mb-1">Customers</h6>
                    <h2 class="display-6 fw-bold mb-0">{{ $customerCount }}</h2>
                </div>
                <i class="bi bi-people fs-1 opacity-75"></i>
            </div>
            <div class="card-footer bg-transparent border-0 pt-0 text-end">
                <span class="text-white small fw-semibold">Registered Users</span>
            </div>
        </div>
    </div>
</div>

<!-- Admin Quick Links Section -->
<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm border-0 rounded-3 h-100">
            <div class="card-header bg-white py-3 fw-bold border-bottom d-flex justify-content-between align-items-center">
                <span><i class="bi bi-shop me-2 text-primary"></i>Restaurants Management</span>
                <a href="{{ route('admin.restaurants.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body">
                <p class="text-muted">Create, edit, or remove restaurants available on the food delivery platform.</p>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.restaurants.index') }}" class="btn btn-primary btn-sm px-3"><i class="bi bi-list-ul me-1"></i>List Restaurants</a>
                    <a href="{{ route('admin.restaurants.create') }}" class="btn btn-outline-primary btn-sm px-3"><i class="bi bi-plus me-1"></i>Add New</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card shadow-sm border-0 rounded-3 h-100">
            <div class="card-header bg-white py-3 fw-bold border-bottom d-flex justify-content-between align-items-center">
                <span><i class="bi bi-journal-richtext me-2 text-success"></i>Menu Items & Availability</span>
                <a href="{{ route('admin.menu_items.index') }}" class="btn btn-sm btn-outline-success">View All</a>
            </div>
            <div class="card-body">
                <p class="text-muted">Manage food menu items, update prices, categories, and toggle availability status.</p>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.menu_items.index') }}" class="btn btn-success btn-sm px-3"><i class="bi bi-list-ul me-1"></i>List Menu Items</a>
                    <a href="{{ route('admin.menu_items.create') }}" class="btn btn-outline-success btn-sm px-3"><i class="bi bi-plus me-1"></i>Add New</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
