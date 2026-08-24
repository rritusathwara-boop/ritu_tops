@extends('layouts.app')

@section('title', 'Place New Order')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-dark text-white p-4">
                <h2 class="h3 mb-0 fw-bold text-warning"><i class="bi bi-cart-check me-2"></i>Place Food Order</h2>
                <p class="text-secondary small mb-0 mt-1">Select a restaurant, choose menu items, and specify quantities.</p>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('orders.store') }}" method="POST" id="orderForm">
                    @csrf

                    <!-- Restaurant Selection -->
                    <div class="mb-4">
                        <label for="restaurant_id" class="form-label fw-bold">Select Restaurant <span class="text-danger">*</span></label>
                        <select name="restaurant_id" id="restaurant_id" class="form-select form-select-lg @error('restaurant_id') is-invalid @enderror" onchange="filterRestaurantMenu(this.value)">
                            <option value="">-- Choose a Restaurant --</option>
                            @foreach($restaurants as $restaurant)
                                <option value="{{ $restaurant->id }}" {{ old('restaurant_id', $selectedRestaurantId) == $restaurant->id ? 'selected' : '' }}>
                                    {{ $restaurant->name }} ({{ $restaurant->address }})
                                </option>
                            @endforeach
                        </select>
                        @error('restaurant_id')
                            <span class="text-danger small mt-1 d-block"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- General Items Error Message -->
                    @error('items')
                        <div class="alert alert-danger mb-4" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ $message }}
                        </div>
                    @enderror

                    <!-- Menu Items Selection Section -->
                    <div class="mb-4">
                        <h4 class="fw-bold text-dark border-bottom pb-2 mb-3">Available Menu Items</h4>

                        @foreach($restaurants as $restaurant)
                            <div class="restaurant-menu-section" id="menu-restaurant-{{ $restaurant->id }}" style="display: {{ old('restaurant_id', $selectedRestaurantId) == $restaurant->id ? 'block' : 'none' }};">
                                @if($restaurant->menuItems->isEmpty())
                                    <div class="alert alert-warning">
                                        No available menu items for this restaurant currently.
                                    </div>
                                @else
                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle border">
                                            <thead class="table-light">
                                                <tr>
                                                    <th style="width: 40%;">Item Name & Description</th>
                                                    <th style="width: 20%;">Category</th>
                                                    <th style="width: 20%;">Price</th>
                                                    <th style="width: 20%;">Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($restaurant->menuItems as $index => $item)
                                                    <tr>
                                                        <td>
                                                            <div class="fw-bold text-dark">{{ $item->name }}</div>
                                                            <small class="text-muted">{{ $item->description }}</small>
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-secondary">{{ $item->category->name ?? 'General' }}</span>
                                                        </td>
                                                        <td class="fw-bold text-primary">
                                                            ₹{{ number_format($item->price, 2) }}
                                                        </td>
                                                        <td>
                                                            <input type="hidden" name="items[{{ $restaurant->id }}_{{ $item->id }}][menu_item_id]" value="{{ $item->id }}">
                                                            <input type="number" 
                                                                   name="items[{{ $restaurant->id }}_{{ $item->id }}][quantity]" 
                                                                   class="form-control item-qty-input @error('items.'.$restaurant->id.'_'.$item->id.'.quantity') is-invalid @enderror" 
                                                                   value="{{ old('items.'.$restaurant->id.'_'.$item->id.'.quantity', 0) }}" 
                                                                   min="0" 
                                                                   max="20">
                                                            @error('items.'.$restaurant->id.'_'.$item->id.'.quantity')
                                                                <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        @endforeach

                        <div id="no-restaurant-selected" style="display: {{ old('restaurant_id', $selectedRestaurantId) ? 'none' : 'block' }};" class="p-4 bg-light text-center text-muted rounded-3">
                            <i class="bi bi-arrow-up-circle fs-3 d-block mb-2"></i>
                            Please select a restaurant from the dropdown above to view its menu items.
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <a href="{{ route('restaurants.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Cancel
                        </a>
                        <button type="submit" class="btn btn-warning btn-lg fw-bold px-5">
                            <i class="bi bi-bag-check-fill me-2"></i>Confirm & Place Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function filterRestaurantMenu(restaurantId) {
        // Hide all menu sections
        document.querySelectorAll('.restaurant-menu-section').forEach(function(el) {
            el.style.display = 'none';
        });

        var noSelectMsg = document.getElementById('no-restaurant-selected');
        
        if (!restaurantId) {
            if (noSelectMsg) noSelectMsg.style.display = 'block';
            return;
        }

        if (noSelectMsg) noSelectMsg.style.display = 'none';

        var targetMenu = document.getElementById('menu-restaurant-' + restaurantId);
        if (targetMenu) {
            targetMenu.style.display = 'block';
        }
    }
</script>
@endsection