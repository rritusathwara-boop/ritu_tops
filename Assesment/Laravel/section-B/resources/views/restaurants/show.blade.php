@extends('layouts.app')

@section('title', $restaurant->name . ' - Menu')

@section('content')
<div class="card shadow-sm border-0 mb-4 bg-dark text-white rounded-3 p-4">
    <div class="card-body">
        <h1 class="fw-bold text-warning mb-2">{{ $restaurant->name }}</h1>
        <p class="fs-5 text-light mb-2">{{ $restaurant->description }}</p>
        <p class="text-secondary mb-0">
            <i class="bi bi-geo-alt-fill text-danger me-1"></i>{{ $restaurant->address }}
        </p>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 fw-bold text-dark mb-0">Restaurant Menu</h2>
    @auth
        <a href="{{ route('orders.create', ['restaurant_id' => $restaurant->id]) }}" class="btn btn-warning fw-bold shadow-sm">
            <i class="bi bi-cart-plus me-1"></i>Order from this Restaurant
        </a>
    @else
        <a href="{{ route('login') }}" class="btn btn-outline-primary fw-semibold">
            Login to Place Order
        </a>
    @endauth
</div>

@forelse($restaurant->menuItems->groupBy('category.name') as $category => $items)
    <div class="card shadow-sm border-0 mb-4 rounded-3 overflow-hidden">
        <div class="card-header bg-primary text-white py-3 px-4">
            <h2 class="h4 mb-0 fw-bold"><i class="bi bi-tags-fill me-2"></i>{{ $category }}</h2>
        </div>
        <div class="card-body p-0">
            <div class="list-group list-group-flush">
                @foreach($items as $item)
                    <div class="list-group-item p-4 d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="h5 fw-bold text-dark mb-1">{{ $item->name }}</h3>
                            <p class="text-muted small mb-2">{{ $item->description }}</p>
                            <p class="fw-bold text-primary mb-0 fs-5">₹{{ number_format($item->price, 2) }}</p>
                        </div>
                        <div class="text-end">
                            @if($item->is_available)
                                <span class="badge bg-success px-3 py-2 fs-6">Available</span>
                            @else
                                <span class="badge bg-danger px-3 py-2 fs-6">Unavailable</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@empty
    <div class="text-center py-5 bg-white rounded-3 shadow-sm">
        <i class="bi bi-search text-muted display-4"></i>
        <h4 class="mt-3 text-secondary">No Menu Items Found</h4>
        <p class="text-muted">This restaurant currently has no menu items listed.</p>
    </div>
@endforelse
@endsection
