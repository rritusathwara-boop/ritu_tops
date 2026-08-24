@extends('layouts.app')

@section('title', 'Edit Restaurant')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-primary text-white py-3">
                <h3 class="h5 mb-0 fw-bold"><i class="bi bi-pencil-square me-2"></i>Edit Restaurant: {{ $restaurant->name }}</h3>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.restaurants.update', $restaurant->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Restaurant Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $restaurant->name) }}" required>
                        @error('name')
                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">Description</label>
                        <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description', $restaurant->description) }}</textarea>
                        @error('description')
                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="address" class="form-label fw-bold">Address <span class="text-danger">*</span></label>
                        <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $restaurant->address) }}" required>
                        @error('address')
                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('admin.restaurants.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary fw-bold px-4">Update Restaurant</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
