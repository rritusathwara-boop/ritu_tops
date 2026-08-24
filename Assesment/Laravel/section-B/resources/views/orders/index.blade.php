@extends('layouts.app')

@section('title', 'My Orders - Task 3')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h4 class="mb-0 text-primary fw-bold">
                    <i class="bi bi-bag-check me-2"></i>My Orders (Task 3 Protected Route)
                </h4>
                <a href="{{ route('orders.create') }}" class="btn btn-success btn-sm">
                    <i class="bi bi-plus-lg me-1"></i>New Order
                </a>
            </div>
            <div class="card-body p-0">
                @if($orders->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" class="ps-4">Order ID</th>
                                    <th scope="col">Restaurant</th>
                                    <th scope="col">Delivery Address</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="pe-4 text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td class="ps-4 fw-bold">#{{ $order->id }}</td>
                                        <td class="fw-semibold">{{ $order->restaurant ? $order->restaurant->name : 'N/A' }}</td>
                                        <td>{{ Str::limit($order->delivery_address, 30) }}</td>
                                        <td class="fw-bold text-success">${{ number_format($order->total_amount, 2) }}</td>
                                        <td>
                                            <span class="badge bg-warning text-dark">{{ ucfirst($order->status) }}</span>
                                        </td>
                                        <td class="pe-4 text-end">
                                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-primary btn-sm">
                                                View Details
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="bi bi-basket display-1 text-muted"></i>
                        <h5 class="mt-3 text-muted">No orders found yet.</h5>
                        <p class="text-secondary">Place your first food order now!</p>
                        <a href="{{ route('orders.create') }}" class="btn btn-primary mt-2">Place an Order</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection