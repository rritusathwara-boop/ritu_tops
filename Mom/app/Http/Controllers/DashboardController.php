<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)
            ->with(['items.product'])
            ->orderBy('created_at', 'desc')
            ->get();

        $totalOrders = $orders->count();
        $pendingOrders = $orders->where('status', 'Pending')->count();
        $completedOrders = $orders->where('status', 'Delivered')->count() + $orders->where('status', 'Completed')->count();

        return view('dashboard.index', compact('user', 'orders', 'totalOrders', 'pendingOrders', 'completedOrders'));
    }
}
