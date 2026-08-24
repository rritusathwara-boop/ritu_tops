@extends('layouts.app')

@section('title', 'Admin - Menu Items')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="fw-bold text-dark mb-1">Manage Menu Items</h1>
        <p class="text-muted mb-0">View, create, edit, delete, or toggle availability of menu items.</p>
    </div>
    <a href="{{ route('admin.menu_items.create') }}" class="btn btn-success fw-semibold">
        <i class="bi bi-plus-circle me-1"></i>Add New Menu Item
    </a>
</div>

<div class="card shadow-sm border-0 rounded-3 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Item Name</th>
                        <th>Restaurant</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($menuItems as $item)
                        <tr>
                            <td class="fw-bold">{{ $item->id }}</td>
                            <td>
                                <span class="fw-bold text-dark d-block">{{ $item->name }}</span>
                                <small class="text-muted">{{ Str::limit($item->description, 40) }}</small>
                            </td>
                            <td>
                                <span class="badge bg-secondary">{{ $item->restaurant->name ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span class="badge bg-outline-dark border text-dark">{{ $item->category->name ?? 'Uncategorized' }}</span>
                            </td>
                            <td class="fw-bold text-primary">₹{{ number_format($item->price, 2) }}</td>
                            <td>
                                <form action="{{ route('admin.menu_items.toggle', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    @if($item->is_available)
                                        <button type="submit" class="btn btn-sm btn-success" title="Click to mark Unavailable">
                                            <i class="bi bi-check-circle me-1"></i>Available
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-sm btn-danger" title="Click to mark Available">
                                            <i class="bi bi-x-circle me-1"></i>Unavailable
                                        </button>
                                    @endif
                                </form>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.menu_items.edit', $item->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-pencil me-1"></i>Edit
                                </a>
                                <form action="{{ route('admin.menu_items.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this menu item?');">
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
                            <td colspan="7" class="text-center py-4 text-muted">No menu items found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($menuItems->hasPages())
        <div class="card-footer bg-white py-3">
            {{ $menuItems->links() }}
        </div>
    @endif
</div>
@endsection
