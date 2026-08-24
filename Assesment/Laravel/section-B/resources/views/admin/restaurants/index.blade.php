@extends('layouts.app')

@section('title', 'Admin - Restaurants')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="fw-bold text-dark mb-1">Manage Restaurants</h1>
        <p class="text-muted mb-0">Add, edit, or delete platform restaurants.</p>
    </div>
    <a href="{{ route('admin.restaurants.create') }}" class="btn btn-primary fw-semibold">
        <i class="bi bi-plus-circle me-1"></i>Add New Restaurant
    </a>
</div>

<div class="card shadow-sm border-0 rounded-3 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Restaurant Name</th>
                        <th>Description</th>
                        <th>Address</th>
                        <th>Menu Items</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($restaurants as $restaurant)
                        <tr>
                            <td class="fw-bold">{{ $restaurant->id }}</td>
                            <td class="fw-bold text-primary">{{ $restaurant->name }}</td>
                            <td>{{ Str::limit($restaurant->description, 50) }}</td>
                            <td>{{ $restaurant->address }}</td>
                            <td>
                                <span class="badge bg-info text-dark">{{ $restaurant->menu_items_count }} items</span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.restaurants.edit', $restaurant->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-pencil me-1"></i>Edit
                                </a>
                                <form action="{{ route('admin.restaurants.destroy', $restaurant->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this restaurant?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash me-1"></i>Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">No restaurants found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($restaurants->hasPages())
        <div class="card-footer bg-white py-3">
            {{ $restaurants->links() }}
        </div>
    @endif
</div>
@endsection
