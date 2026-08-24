<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMenuItemController;
use App\Http\Controllers\AdminRestaurantController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Laravel Food Delivery Platform
|--------------------------------------------------------------------------
*/

// Root redirect to Public Restaurants page
Route::get('/', function () {
    return redirect()->route('restaurants.index');
});

// Section 7: Public Restaurant & Menu Pages
Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');
Route::get('/restaurants/{restaurant}', [RestaurantController::class, 'show'])->name('restaurants.show');

// Section 4 & Section 10 & Section 14: Customer Protected Routes
Route::middleware('auth')->group(function () {

    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders', [OrderController::class, 'history'])->name('orders.history');

    // Profile Management (Laravel Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Section 5 & Section 6: Admin Role-Based Protected Routes
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Admin Dashboard
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');

        // Admin Restaurants CRUD
        Route::resource('restaurants', AdminRestaurantController::class);

        // Admin Menu Items CRUD & Availability Toggle
        Route::resource('menu_items', AdminMenuItemController::class);
        Route::patch('/menu_items/{menuItem}/toggle', [AdminMenuItemController::class, 'toggleAvailability'])
            ->name('menu_items.toggle');
    });

require __DIR__.'/auth.php';
