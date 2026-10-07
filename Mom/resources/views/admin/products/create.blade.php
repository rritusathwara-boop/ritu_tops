@extends('admin.layout')

@section('header', 'Add New Product')

@section('content')
<div class="card border-0">
    <div class="card-header bg-white pt-4 pb-0 px-4 border-bottom-0 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0">Add Product</h5>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left me-1"></i> Back</a>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-4">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Product Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control rounded-0 @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control rounded-0" value="{{ old('slug') }}" placeholder="Auto-generated from name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="description" class="form-control rounded-0" rows="5">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Category <span class="text-danger">*</span></label>
                        <select name="category_id" class="form-select rounded-0" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Price (₹) <span class="text-danger">*</span></label>
                        <input type="number" name="price" step="0.01" class="form-control rounded-0 @error('price') is-invalid @enderror" value="{{ old('price') }}" required>
                        @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Discount Price (₹)</label>
                        <input type="number" name="discount_price" step="0.01" class="form-control rounded-0" value="{{ old('discount_price') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Stock Quantity <span class="text-danger">*</span></label>
                        <input type="number" name="stock" class="form-control rounded-0" value="{{ old('stock', 1) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">SKU</label>
                        <input type="text" name="sku" class="form-control rounded-0" value="{{ old('sku') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Product Images</label>
                        <input type="file" name="images[]" class="form-control rounded-0" accept="image/*" multiple>
                        <small class="text-muted">Upload one or more product images. First image will be treated as primary.</small>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                            <label class="form-check-label">Featured Product</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_new_arrival" value="1" {{ old('is_new_arrival') ? 'checked' : '' }}>
                            <label class="form-check-label">New Arrival</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-4 border-top pt-4">
                <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary rounded-0 px-4 me-2">Cancel</a>
                <button type="submit" class="btn btn-primary rounded-0 px-5">Save Product</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.querySelector('[name="name"]').addEventListener('input', function () {
        document.getElementById('slug').value = this.value
            .toLowerCase().replace(/[^a-z0-9\s-]/g, '').trim().replace(/\s+/g, '-');
    });
</script>
@endsection
