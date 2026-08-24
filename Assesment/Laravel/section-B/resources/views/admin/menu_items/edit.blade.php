@extends('layouts.app')

@section('title', 'Edit Menu Item')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-success text-white py-3">
                <h3 class="h5 mb-0 fw-bold"><i class="bi bi-pencil-square me-2"></i>Edit Menu Item: {{ $menuItem->name }}</h3>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.menu_items.update', $menuItem->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="restaurant_id" class="form-label fw-bold">Restaurant <span class="text-danger">*</span></label>
                            <select name="restaurant_id" id="restaurant_id" class="form-select @error('restaurant_id') is-invalid @enderror" required>
                                <option value="">-- Select Restaurant --</option>
                                @foreach($restaurants as $restaurant)
                                    <option value="{{ $restaurant->id }}" {{ old('restaurant_id', $menuItem->restaurant_id) == $restaurant->id ? 'selected' : '' }}>
                                        {{ $restaurant->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('restaurant_id')
                                <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="category_id" class="form-label fw-bold">Category <span class="text-danger">*</span></label>
                            <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                                <option value="">-- Select Category --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $menuItem->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Item Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $menuItem->name) }}" required>
                        @error('name')
                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">Description</label>
                        <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description', $menuItem->description) }}</textarea>
                        @error('description')
                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="price" class="form-label fw-bold">Price (₹) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" min="0.01" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $menuItem->price) }}" required>
                            @error('price')
                                <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 d-flex align-items-end">
                            <div class="form-check form-switch mb-2 fs-5">
                                <input class="form-check-input" type="checkbox" name="is_available" id="is_available" value="1" {{ old('is_available', $menuItem->is_available) ? 'checked' : '' }}>
                                <label class="form-check-label fw-bold text-dark fs-6" for="is_available">Available for Order</label>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('admin.menu_items.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success fw-bold px-4">Update Menu Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
