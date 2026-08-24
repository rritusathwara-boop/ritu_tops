<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display the Admin Dashboard.
     */
    public function index()
    {
        $restaurantCount = Restaurant::count();
        $menuItemCount = MenuItem::count();
        $orderCount = Order::count();
        $customerCount = User::where('role', 'customer')->count();

        $recentOrders = Order::with(['user', 'restaurant'])->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'restaurantCount',
            'menuItemCount',
            'orderCount',
            'customerCount',
            'recentOrders'
        ));
    }
}
