@extends('admin.layout')

@section('header', 'Order Details')

@section('content')
<div class="row g-4">
    <div class="col-md-8">
        <div class="card border-0 mb-4">
            <div class="card-header bg-white pt-4 pb-0 px-4 border-bottom-0 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0">Order #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</h5>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left me-1"></i> Back</a>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="bg-light text-muted">
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $item->product ? $item->product->image_url : asset('assets/images/partyware.jpeg') }}" class="rounded me-3" style="width:50px;height:50px;object-fit:cover;" alt="">
                                        <div>
                                            <div class="fw-bold">{{ $item->product->name ?? 'Deleted Product' }}</div>
                                            <small class="text-muted">SKU: {{ $item->product->sku ?? 'N/A' }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>₹{{ number_format($item->price, 2) }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td class="fw-bold">₹{{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="border-top">
                            <tr>
                                <td colspan="3" class="text-end fw-bold">Total:</td>
                                <td class="fw-bold fs-5">₹{{ number_format($order->total_amount, 2) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <!-- Order Status -->
        <div class="card border-0 mb-4">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-3">Update Status</h6>
                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="status" class="form-select rounded-0 mb-3">
                        @foreach(['Pending','Processing','Shipped','Completed','Cancelled'] as $status)
                        <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary rounded-0 w-100">Update Status</button>
                </form>
            </div>
        </div>

        <!-- Customer Info -->
        <div class="card border-0 mb-4">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-3">Customer</h6>
                <p class="mb-1"><i class="fas fa-user me-2 text-muted"></i>{{ $order->user->name }}</p>
                <p class="mb-1"><i class="fas fa-envelope me-2 text-muted"></i>{{ $order->user->email }}</p>
                <p class="mb-0"><i class="fas fa-phone me-2 text-muted"></i>{{ $order->user->phone ?? 'N/A' }}</p>
            </div>
        </div>

        <!-- Shipping Info -->
        <div class="card border-0">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-3">Shipping Address</h6>
                <address class="mb-0 text-muted">
                    {{ $order->shipping_address }}<br>
                    {{ $order->shipping_city }}, {{ $order->shipping_state }}<br>
                    PIN: {{ $order->shipping_pincode }}
                </address>
                <hr>
                <p class="mb-1"><strong>Payment:</strong> {{ $order->payment_method }}</p>
                <p class="mb-0"><strong>Placed:</strong> {{ $order->created_at->format('d M Y, h:i A') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
