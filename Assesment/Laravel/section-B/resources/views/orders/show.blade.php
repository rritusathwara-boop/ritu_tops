@extends('layouts.app')

@section('title', 'Order #' . $order->id . ' Details')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h4 class="mb-0 text-primary fw-bold">
                    <i class="bi bi-file-earmark-text me-2"></i>Order Details #{{ $order->id }}
                </h4>
                <span class="badge bg-warning text-dark fs-6">{{ ucfirst($order->status) }}</span>
            </div>
            <div class="card-body p-4">
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <h6 class="text-muted fw-bold text-uppercase fs-7">Customer Details</h6>
                        <p class="mb-1 fw-bold">{{ $order->user->name }}</p>
                        <p class="mb-0 text-secondary">{{ $order->user->email }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h6 class="text-muted fw-bold text-uppercase fs-7">Restaurant</h6>
                        <p class="mb-1 fw-bold">{{ $order->restaurant ? $order->restaurant->name : 'N/A' }}</p>
                        <p class="mb-0 text-secondary">{{ $order->restaurant ? $order->restaurant->phone : '' }}</p>
                    </div>
                </div>

                <hr>

                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <h6 class="text-muted fw-bold text-uppercase fs-7">Delivery Address</h6>
                        <p class="mb-0">{{ $order->delivery_address }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h6 class="text-muted fw-bold text-uppercase fs-7">Total Amount</h6>
                        <p class="fs-4 fw-bold text-success mb-0">${{ number_format($order->total_amount, 2) }}</p>
                    </div>
                </div>

                <div class="alert alert-info d-flex align-items-center mb-0 mt-3" role="alert">
                    <i class="bi bi-envelope-check-fill fs-3 me-3"></i>
                    <div>
                        <strong>Queued Email Dispatched!</strong> An order confirmation email was dispatched to <code>{{ $order->user->email }}</code> using Laravel's queue.
                    </div>
                </div>
            </div>
            <div class="card-footer bg-light py-3 d-flex justify-content-between">
                <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i>Back to My Orders
                </a>
                <a href="{{ route('orders.create') }}" class="btn btn-primary">
                    Place Another Order
                </a>
            </div>
        </div>
    </div>
</div>
@endsection