@extends('layouts.app')

@section('content')
<div class="bg-light py-4 border-bottom mb-4">
    <div class="container">
        <h2 class="font-playfair mb-1">My Account &amp; Orders</h2>
        <p class="text-muted small mb-0">Manage your orders, profile details and wishlist from here.</p>
    </div>
</div>

<div class="container py-3">
    <div class="row g-4">
        <!-- Sidebar Profile Card -->
        <div class="col-lg-3">
            <div class="card border-0 shadow-sm rounded-0 mb-4">
                <div class="card-body p-0">
                    <div class="p-4 bg-light text-center border-bottom">
                        <div class="rounded-circle bg-dark text-white d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" style="width: 70px; height: 70px; font-size: 1.8rem; font-family: 'Playfair Display', serif;">
                            {{ substr($user->name ?? auth()->user()->name, 0, 1) }}
                        </div>
                        <h5 class="font-playfair mb-1">{{ $user->name ?? auth()->user()->name }}</h5>
                        <small class="text-muted d-block">{{ $user->email ?? auth()->user()->email }}</small>
                        <span class="badge bg-dark bg-opacity-10 text-dark rounded-pill mt-2 px-3 py-1 text-uppercase small" style="font-size: 0.7rem;">Verified Customer</span>
                    </div>
                    <div class="list-group list-group-flush rounded-0">
                        <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action active bg-dark border-dark text-white rounded-0 py-3">
                            <i class="fas fa-th-large me-2"></i> Dashboard &amp; Orders
                        </a>
                        <a href="{{ route('wishlist.index') }}" class="list-group-item list-group-item-action py-3">
                            <i class="far fa-heart me-2"></i> My Wishlist
                        </a>
                        <a href="{{ route('shop') }}" class="list-group-item list-group-item-action py-3">
                            <i class="fas fa-shopping-bag me-2"></i> Continue Shopping
                        </a>
                        <a href="#" class="list-group-item list-group-item-action text-danger py-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i> Sign Out
                        </a>
                    </div>
                </div>
            </div>

            <!-- Profile Info Box -->
            <div class="card border-0 shadow-sm rounded-0 p-3">
                <h6 class="font-playfair fw-bold mb-3 border-bottom pb-2">Delivery Address</h6>
                <p class="small text-muted mb-1"><i class="fas fa-phone me-2 text-dark"></i> {{ $user->phone ?? 'Not specified' }}</p>
                <p class="small text-muted mb-0"><i class="fas fa-map-marker-alt me-2 text-dark"></i> {{ $user->address ?? 'Ahmedabad, Gujarat' }}</p>
                @if($user->city)
                    <p class="small text-muted mb-0 ms-3 ps-1">{{ $user->city }}, {{ $user->state }} – {{ $user->pincode }}</p>
                @endif
            </div>
        </div>

        <!-- Main Dashboard Content -->
        <div class="col-lg-9">
            <!-- Metrics Row -->
            <div class="row g-3 mb-4">
                <div class="col-md-4 col-12">
                    <div class="card border-0 shadow-sm rounded-0 h-100 bg-light p-3 border-start border-4 border-dark">
                        <div class="d-flex align-items-center">
                            <div class="rounded p-3 bg-white shadow-sm me-3 text-dark">
                                <i class="fas fa-shopping-bag fa-2x"></i>
                            </div>
                            <div>
                                <h3 class="font-playfair mb-0 fw-bold">{{ $totalOrders ?? 0 }}</h3>
                                <small class="text-muted text-uppercase fw-semibold" style="font-size: 0.75rem;">Total Orders</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="card border-0 shadow-sm rounded-0 h-100 bg-light p-3 border-start border-4 border-warning">
                        <div class="d-flex align-items-center">
                            <div class="rounded p-3 bg-white shadow-sm me-3 text-warning">
                                <i class="fas fa-clock fa-2x"></i>
                            </div>
                            <div>
                                <h3 class="font-playfair mb-0 fw-bold">{{ $pendingOrders ?? 0 }}</h3>
                                <small class="text-muted text-uppercase fw-semibold" style="font-size: 0.75rem;">In Progress</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="card border-0 shadow-sm rounded-0 h-100 bg-light p-3 border-start border-4 border-success">
                        <div class="d-flex align-items-center">
                            <div class="rounded p-3 bg-white shadow-sm me-3 text-success">
                                <i class="fas fa-check-circle fa-2x"></i>
                            </div>
                            <div>
                                <h3 class="font-playfair mb-0 fw-bold">{{ $completedOrders ?? 0 }}</h3>
                                <small class="text-muted text-uppercase fw-semibold" style="font-size: 0.75rem;">Delivered</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders List -->
            <div class="card border-0 shadow-sm rounded-0">
                <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                    <h5 class="font-playfair mb-0">Order History</h5>
                    <a href="{{ route('shop') }}" class="btn btn-outline-dark btn-sm rounded-0">Shop More</a>
                </div>
                <div class="card-body p-4">
                    @if(isset($orders) && $orders->count() > 0)
                        <div class="table-responsive">
                            <table class="table align-middle table-hover">
                                <thead class="bg-light text-muted small text-uppercase">
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Items</th>
                                        <th>Total Amount</th>
                                        <th>Payment</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>
                                            <span class="fw-bold text-dark">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span>
                                        </td>
                                        <td class="small text-muted">{{ $order->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="small">
                                                @foreach($order->items as $item)
                                                    <div class="text-truncate" style="max-width: 200px;">
                                                        • {{ $item->product->name ?? 'Product' }} <span class="text-muted">(x{{ $item->quantity }})</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="fw-bold">₹{{ number_format($order->total_amount, 2) }}</td>
                                        <td><span class="badge bg-light text-dark border">{{ $order->payment_method }}</span></td>
                                        <td>
                                            @if($order->status == 'Pending')
                                                <span class="badge bg-warning text-dark px-2 py-1">Pending</span>
                                            @elseif($order->status == 'Processing' || $order->status == 'Shipped')
                                                <span class="badge bg-info text-white px-2 py-1">{{ $order->status }}</span>
                                            @elseif($order->status == 'Delivered' || $order->status == 'Completed')
                                                <span class="badge bg-success px-2 py-1">Delivered</span>
                                            @else
                                                <span class="badge bg-danger px-2 py-1">{{ $order->status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="text-muted mb-3"><i class="fas fa-box-open fa-3x"></i></div>
                            <h5 class="font-playfair">No orders placed yet</h5>
                            <p class="text-muted small mb-4">When you place an order, you can track its delivery status and review details here.</p>
                            <a href="{{ route('shop') }}" class="btn btn-dark rounded-0 px-4 py-2 text-uppercase fw-semibold" style="background-color: var(--primary-color);">Start Shopping</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
@endsection
