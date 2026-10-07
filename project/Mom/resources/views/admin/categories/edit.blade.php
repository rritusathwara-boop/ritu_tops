@extends('admin.layout')

@section('header', 'Edit Category')

@section('content')
<div class="card border-0">
    <div class="card-header bg-white pt-4 pb-0 px-4 border-bottom-0 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0">Edit: {{ $category->name }}</h5>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left me-1"></i> Back</a>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control rounded-0" value="{{ old('name', $category->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Slug</label>
                        <input type="text" name="slug" class="form-control rounded-0" value="{{ old('slug', $category->slug) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="description" class="form-control rounded-0" rows="3">{{ old('description', $category->description) }}</textarea>
                    </div>
                    <div class="d-flex justify-content-end pt-2">
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary rounded-0 px-4 me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary rounded-0 px-5">Update Category</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
