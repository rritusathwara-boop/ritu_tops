@extends('admin.layout')

@section('header', 'All Categories')

@section('content')
<div class="card border-0 mb-4">
    <div class="card-header bg-white pt-4 pb-0 px-4 d-flex justify-content-between align-items-center border-bottom-0">
        <h5 class="fw-bold mb-0">All Categories</h5>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Add Category</a>
    </div>
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="bg-light text-muted">
                    <tr>
                        <th class="rounded-start">ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th class="text-end rounded-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td class="fw-bold">{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="text-muted">{{ $category->slug }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-light text-primary me-2"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-light text-danger" onclick="return confirm('Delete this category?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">No categories found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end mt-3">
            {{ $categories->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
