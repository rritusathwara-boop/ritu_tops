<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $ordersCount = Order::count();
        $revenue = Order::where('status', 'Completed')->sum('total_amount');
        $productsCount = Product::count();
        $usersCount = User::where('role', 'customer')->count();
        $recentOrders = Order::with('user')->orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('ordersCount', 'revenue', 'productsCount', 'usersCount', 'recentOrders'));
    }
}
