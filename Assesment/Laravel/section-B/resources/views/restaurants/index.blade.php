@extends('layouts.app')

@section('title', 'Browse Restaurants')

@section('content')
<div class="row mb-4 align-items-center">
    <div class="col-md-8">
        <h1 class="fw-bold text-dark mb-1">Browse Restaurants</h1>
        <p class="text-muted mb-0">Select a restaurant to explore its delicious menu and place an order.</p>
    </div>
    @auth
        <div class="col-md-4 text-md-end mt-3 mt-md-0">
            <a href="{{ route('orders.create') }}" class="btn btn-warning fw-semibold shadow-sm">
                <i class="bi bi-cart-plus me-1"></i>Start Order Now
            </a>
        </div>
    @endauth
</div>

<div class="row g-4">
    @forelse($restaurants as $restaurant)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                <div class="card-body d-flex flex-column p-4">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h4 class="card-title fw-bold text-dark mb-0">{{ $restaurant->name }}</h4>
                        <span class="badge bg-primary rounded-pill">{{ $restaurant->menu_items_count }} items</span>
                    </div>
                    <p class="card-text text-muted flex-grow-1 fs-6 mt-2">{{ $restaurant->description ?? 'Delicious food served daily.' }}</p>
                    <div class="text-secondary small mb-3">
                        <i class="bi bi-geo-alt-fill text-danger me-1"></i>{{ $restaurant->address }}
                    </div>
                    <a href="{{ route('restaurants.show', $restaurant->id) }}" class="btn btn-outline-primary w-100 fw-semibold">
                        <i class="bi bi-eye me-1"></i>View Menu & Items
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <div class="p-5 bg-white rounded-3 shadow-sm">
                <i class="bi bi-shop text-muted display-4"></i>
                <h3 class="mt-3 text-secondary">No Restaurants Available</h3>
                <p class="text-muted">Please run database seeders to generate sample restaurants.</p>
            </div>
        </div>
    @endforelse
</div>
@endsection
