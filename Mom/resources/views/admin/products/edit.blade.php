@extends('admin.layout')

@section('header', 'Edit Product')

@section('content')
<div class="card border-0">
    <div class="card-header bg-white pt-4 pb-0 px-4 border-bottom-0 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0">Edit: {{ $product->name }}</h5>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left me-1"></i> Back</a>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-4">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Product Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control rounded-0" value="{{ old('name', $product->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Slug</label>
                        <input type="text" name="slug" class="form-control rounded-0" value="{{ old('slug', $product->slug) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="description" class="form-control rounded-0" rows="5">{{ old('description', $product->description) }}</textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Category <span class="text-danger">*</span></label>
                        <select name="category_id" class="form-select rounded-0" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Price (₹) <span class="text-danger">*</span></label>
                        <input type="number" name="price" step="0.01" class="form-control rounded-0" value="{{ old('price', $product->price) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Discount Price (₹)</label>
                        <input type="number" name="discount_price" step="0.01" class="form-control rounded-0" value="{{ old('discount_price', $product->discount_price) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Stock Quantity <span class="text-danger">*</span></label>
                        <input type="number" name="stock" class="form-control rounded-0" value="{{ old('stock', $product->stock) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">SKU</label>
                        <input type="text" name="sku" class="form-control rounded-0" value="{{ old('sku', $product->sku) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Add More Images</label>
                        <input type="file" name="images[]" class="form-control rounded-0" accept="image/*" multiple>
                        <small class="text-muted">Select new images to add. Existing images remain untouched.</small>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_featured" value="1" {{ $product->is_featured ? 'checked' : '' }}>
                            <label class="form-check-label">Featured Product</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_new_arrival" value="1" {{ $product->is_new_arrival ? 'checked' : '' }}>
                            <label class="form-check-label">New Arrival</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-4 border-top pt-4">
                <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary rounded-0 px-4 me-2">Cancel</a>
                <button type="submit" class="btn btn-primary rounded-0 px-5">Update Product</button>
            </div>
        </form>
    </div>
</div>
@endsection
