<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Mail\OrderConfirmationMail;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Show the order placement form for customers.
     */
    public function create(Request $request)
    {
        $restaurants = Restaurant::with(['menuItems' => function ($query) {
            $query->where('is_available', true)->with('category');
        }])->get();

        $selectedRestaurantId = $request->query('restaurant_id', $restaurants->first()?->id);

        return view('orders.create', compact('restaurants', 'selectedRestaurantId'));
    }

    /**
     * Store a newly created order in storage.
     * Follows strict step-by-step logic:
     * 1. Validate request using StoreOrderRequest
     * 2. Verify selected items belong to restaurant and are available
     * 3. Calculate total amount
     * 4. Create Order with initial status 'pending'
     * 5. Create related OrderItem records using Eloquent relationship
     * 6. Update order status from 'pending' to 'confirmed'
     * 7. Dispatch queued order confirmation email
     * 8. Redirect to order history with session flash message
     */
    public function store(StoreOrderRequest $request)
    {
        $validated = $request->validated();

        $restaurant = Restaurant::findOrFail($validated['restaurant_id']);

        // Filter and collect selected menu items
        $totalAmount = 0;
        $orderItemsData = [];

        foreach ($validated['items'] as $itemData) {
            if (empty($itemData['quantity']) || $itemData['quantity'] < 1) {
                continue;
            }

            $menuItem = MenuItem::findOrFail($itemData['menu_item_id']);

            // Verify item belongs to the selected restaurant
            if ($menuItem->restaurant_id != $restaurant->id) {
                return back()->withErrors(['items' => "Item {$menuItem->name} does not belong to {$restaurant->name}."]);
            }

            // Verify item is available
            if (!$menuItem->is_available) {
                return back()->withErrors(['items' => "Item {$menuItem->name} is currently unavailable."]);
            }

            $subtotal = $menuItem->price * $itemData['quantity'];
            $totalAmount += $subtotal;

            $orderItemsData[] = [
                'menu_item_id' => $menuItem->id,
                'quantity' => $itemData['quantity'],
                'price' => $menuItem->price,
            ];
        }

        if (empty($orderItemsData)) {
            return back()->withErrors(['items' => 'Please select at least one menu item with a valid quantity.']);
        }

        // Step 5: Create Order with initial status 'pending'
        $order = Order::create([
            'user_id' => auth()->id(),
            'restaurant_id' => $restaurant->id,
            'total_amount' => $totalAmount,
            'status' => 'pending',
        ]);

        // Step 7: Create related OrderItem records using Eloquent relationship
        foreach ($orderItemsData as $item) {
            $order->orderItems()->create([
                'menu_item_id' => $item['menu_item_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Step 8: Update status from 'pending' to 'confirmed'
        $order->update([
            'status' => 'confirmed',
        ]);

        // Step 9: Dispatch queued order confirmation mail
        Mail::to(auth()->user()->email)
            ->queue(new OrderConfirmationMail($order->load(['user', 'restaurant', 'orderItems.menuItem'])));

        // Step 10: Redirect to order history with session flash message
        return redirect()
            ->route('orders.history')
            ->with('success', 'Order placed successfully!');
    }

    /**
     * Display the authenticated customer's order history.
     * Demonstrates Eloquent Relationship 2: Order -> User, Restaurant, and OrderItems.
     */
    public function history()
    {
        // Eloquent Relationship Demonstration 2:
        // Retrieving customer's orders with eagerly loaded Restaurant, OrderItems, and related MenuItems
        $orders = auth()->user()
            ->orders()
            ->with(['restaurant', 'orderItems.menuItem'])
            ->latest()
            ->get();

        return view('orders.history', compact('orders'));
    }
}
