@extends('admin.layout')

@section('header', 'Manage Products')

@section('content')
<div class="card border-0 mb-4">
    <div class="card-header bg-white pt-4 pb-0 px-4 d-flex justify-content-between align-items-center border-bottom-0">
        <h5 class="fw-bold mb-0">All Products</h5>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Add Product</a>
    </div>
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="bg-light text-muted">
                    <tr>
                        <th class="rounded-start">Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th class="text-end rounded-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td><img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="rounded" style="width: 50px; height: 50px; object-fit: cover;"></td>
                        <td>
                            <div class="fw-bold text-dark">{{ $product->name }}</div>
                            <small class="text-muted">SKU: {{ $product->sku ?? 'N/A' }}</small>
                        </td>
                        <td>{{ $product->category->name ?? 'Uncategorized' }}</td>
                        <td>₹{{ number_format($product->price, 2) }}</td>
                        <td>
                            @if($product->stock > 0)
                                <span class="badge bg-success bg-opacity-10 text-success">{{ $product->stock }} in stock</span>
                            @else
                                <span class="badge bg-danger bg-opacity-10 text-danger">Out of stock</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-light text-primary me-2"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-light text-danger" onclick="return confirm('Delete this product?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No products found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end mt-3">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
