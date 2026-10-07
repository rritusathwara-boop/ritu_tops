@extends('admin.layout')

@section('header', 'Add Category')

@section('content')
<div class="card border-0">
    <div class="card-header bg-white pt-4 pb-0 px-4 border-bottom-0 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0">Add New Category</h5>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left me-1"></i> Back</a>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="cat-name" class="form-control rounded-0 @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Slug</label>
                        <input type="text" name="slug" id="cat-slug" class="form-control rounded-0" value="{{ old('slug') }}" placeholder="Auto-generated">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="description" class="form-control rounded-0" rows="3">{{ old('description') }}</textarea>
                    </div>
                    <div class="d-flex justify-content-end pt-2">
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary rounded-0 px-4 me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary rounded-0 px-5">Save Category</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('cat-name').addEventListener('input', function () {
        document.getElementById('cat-slug').value = this.value
            .toLowerCase().replace(/[^a-z0-9\s-]/g, '').trim().replace(/\s+/g, '-');
    });
</script>
@endsection
