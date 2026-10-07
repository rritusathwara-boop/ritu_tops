@extends('admin.layout')

@section('header', 'Dashboard Overview')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card h-100 border-0 p-4">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 bg-light-primary text-primary rounded p-3 me-3">
                    <i class="fas fa-shopping-cart fa-2x"></i>
                </div>
                <div>
                    <h3 class="mb-1 fw-bold">{{ $ordersCount ?? 0 }}</h3>
                    <span class="text-muted">Total Orders</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card h-100 border-0 p-4">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 bg-light-success text-success rounded p-3 me-3">
                    <i class="fas fa-rupee-sign fa-2x"></i>
                </div>
                <div>
                    <h3 class="mb-1 fw-bold">₹{{ number_format($revenue ?? 0) }}</h3>
                    <span class="text-muted">Total Revenue</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card h-100 border-0 p-4">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 bg-light-warning text-warning rounded p-3 me-3">
                    <i class="fas fa-box fa-2x"></i>
                </div>
                <div>
                    <h3 class="mb-1 fw-bold">{{ $productsCount ?? 0 }}</h3>
                    <span class="text-muted">Total Products</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card h-100 border-0 p-4">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 bg-light-info text-info rounded p-3 me-3">
                    <i class="fas fa-users fa-2x"></i>
                </div>
                <div>
                    <h3 class="mb-1 fw-bold">{{ $usersCount ?? 0 }}</h3>
                    <span class="text-muted">Total Customers</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-8">
        <div class="card border-0">
            <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                <h5 class="fw-bold">Recent Orders</h5>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-borderless align-middle">
                        <thead class="text-muted bg-light">
                            <tr>
                                <th class="rounded-start">Order ID</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th class="rounded-end">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentOrders ?? [] as $order)
                            <tr>
                                <td><span class="fw-bold text-primary">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span></td>
                                <td>{{ $order->user->name }}</td>
                                <td>₹{{ number_format($order->total_amount, 2) }}</td>
                                <td>
                                    @if($order->status == 'Pending')
                                        <span class="badge bg-warning text-dark">{{ $order->status }}</span>
                                    @else
                                        <span class="badge bg-success">{{ $order->status }}</span>
                                    @endif
                                </td>
                                <td>{{ $order->created_at->format('M d, Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">No recent orders found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 h-100">
            <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                <h5 class="fw-bold">Quick Actions</h5>
            </div>
            <div class="card-body p-4">
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary w-100 mb-3 py-2"><i class="fas fa-plus me-1"></i> Add New Product</a>
                <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-primary w-100 mb-3 py-2"><i class="fas fa-plus me-1"></i> Add New Category</a>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-light w-100 py-2"><i class="fas fa-list me-1"></i> View All Orders</a>
            </div>
        </div>
    </div>
</div>
@endsection
