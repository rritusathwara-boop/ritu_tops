<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminMenuItemRequest;
use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class AdminMenuItemController extends Controller
{
    /**
     * Display a listing of menu items.
     */
    public function index()
    {
        $menuItems = MenuItem::with(['restaurant', 'category'])->latest()->paginate(15);
        return view('admin.menu_items.index', compact('menuItems'));
    }

    /**
     * Show the form for creating a new menu item.
     */
    public function create()
    {
        $restaurants = Restaurant::all();
        $categories = Category::all();
        return view('admin.menu_items.create', compact('restaurants', 'categories'));
    }

    /**
     * Store a newly created menu item in storage.
     */
    public function store(AdminMenuItemRequest $request)
    {
        $data = $request->validated();
        $data['is_available'] = $request->has('is_available');

        MenuItem::create($data);

        return redirect()->route('admin.menu_items.index')
            ->with('success', 'Menu item added successfully!');
    }

    /**
     * Show the form for editing the specified menu item.
     */
    public function edit(MenuItem $menuItem)
    {
        $restaurants = Restaurant::all();
        $categories = Category::all();
        return view('admin.menu_items.edit', compact('menuItem', 'restaurants', 'categories'));
    }

    /**
     * Update the specified menu item in storage.
     */
    public function update(AdminMenuItemRequest $request, MenuItem $menuItem)
    {
        $data = $request->validated();
        $data['is_available'] = $request->has('is_available');

        $menuItem->update($data);

        return redirect()->route('admin.menu_items.index')
            ->with('success', 'Menu item updated successfully!');
    }

    /**
     * Remove the specified menu item from storage.
     */
    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();

        return redirect()->route('admin.menu_items.index')
            ->with('success', 'Menu item deleted successfully!');
    }

    /**
     * Toggle menu item availability status.
     */
    public function toggleAvailability(MenuItem $menuItem)
    {
        $menuItem->update([
            'is_available' => !$menuItem->is_available,
        ]);

        $statusStr = $menuItem->is_available ? 'Available' : 'Unavailable';

        return redirect()->back()->with('success', "Menu item set to {$statusStr}!");
    }
}
