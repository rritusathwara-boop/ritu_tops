@extends('layouts.app')

@section('title', 'My Order History')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="fw-bold text-dark mb-1">My Order History</h1>
        <p class="text-muted mb-0">View all your placed food delivery orders and status updates.</p>
    </div>
    <a href="{{ route('orders.create') }}" class="btn btn-warning fw-semibold shadow-sm">
        <i class="bi bi-cart-plus me-1"></i>Place New Order
    </a>
</div>

<div class="row">
    @forelse($orders as $order)
        <div class="col-12 mb-4">
            <div class="card shadow-sm border-0 rounded-3 overflow-hidden">
                <div class="card-header bg-white py-3 px-4 d-flex flex-wrap justify-content-between align-items-center border-bottom">
                    <div>
                        <span class="fw-bold text-dark fs-5">Order #{{ $order->id }}</span>
                        <span class="text-muted ms-3">
                            <i class="bi bi-calendar3 me-1"></i>{{ $order->created_at->format('M d, Y h:i A') }}
                        </span>
                    </div>
                    <div class="mt-2 mt-sm-0">
                        <span class="badge bg-dark fs-6 me-2">{{ $order->restaurant->name ?? 'Restaurant' }}</span>
                        <span class="badge bg-success px-3 py-2 fs-6 shadow-sm">
                            <i class="bi bi-check-circle-fill me-1"></i>{{ strtolower($order->status) }}
                        </span>
                    </div>
                </div>

                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-0">
                            <thead class="table-light text-secondary">
                                <tr>
                                    <th>Item</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-end">Unit Price</th>
                                    <th class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderItems as $item)
                                    <tr class="border-bottom">
                                        <td>
                                            <span class="fw-semibold text-dark">{{ $item->menuItem->name ?? 'Menu Item' }}</span>
                                        </td>
                                        <td class="text-center fw-bold">{{ $item->quantity }}</td>
                                        <td class="text-end text-muted">₹{{ number_format($item->price, 2) }}</td>
                                        <td class="text-end fw-bold text-dark">₹{{ number_format($item->price * $item->quantity, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer bg-light py-3 px-4 d-flex justify-content-between align-items-center">
                    <span class="text-muted small"><i class="bi bi-envelope-check me-1"></i>Confirmation email dispatched to {{ auth()->user()->email }}</span>
                    <div class="fs-5">
                        <span class="text-muted me-2">Total Amount:</span>
                        <span class="fw-bold text-primary">₹{{ number_format($order->total_amount, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <div class="p-5 bg-white rounded-3 shadow-sm">
                <i class="bi bi-receipt-cutoff text-muted display-4"></i>
                <h3 class="mt-3 text-secondary">No Orders Placed Yet</h3>
                <p class="text-muted mb-4">You haven't placed any food orders yet. Browse our restaurants and satisfy your cravings!</p>
                <a href="{{ route('restaurants.index') }}" class="btn btn-primary px-4 fw-semibold">
                    Browse Restaurants
                </a>
            </div>
        </div>
    @endforelse
</div>
@endsection
