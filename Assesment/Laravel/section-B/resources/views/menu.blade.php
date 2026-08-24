@extends('layouts.app')

@section('title', 'Restaurant Menu - Task 1')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h4 class="mb-0 text-primary fw-bold">
                    <i class="bi bi-journal-richtext me-2"></i>Restaurant Menu
                </h4>
                <span class="badge bg-success fs-6">Task 1 Requirement</span>
            </div>
            <div class="card-body p-0">
                <!-- Bootstrap responsive HTML table -->
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="ps-4">#</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Category</th>
                                <th scope="col" class="pe-4 text-end">Price ($)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop through array passed via compact('menuItems') -->
                            @foreach($menuItems as $index => $item)
                                <tr>
                                    <td class="ps-4 fw-bold text-secondary">{{ $index + 1 }}</td>
                                    <td class="fw-bold text-dark">{{ $item['name'] }}</td>
                                    <td>
                                        <span class="badge bg-info text-dark">{{ $item['category'] }}</span>
                                    </td>
                                    <td class="pe-4 text-end fw-bold text-success">
                                        ${{ number_format($item['price'], 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-light text-muted text-center py-2">
                <small>Showing {{ count($menuItems) }} delicious items available for online order.</small>
            </div>
        </div>
    </div>
</div>
@endsection