<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRestaurantRequest;
use App\Models\Restaurant;

class AdminRestaurantController extends Controller
{
    /**
     * Display a listing of restaurants.
     */
    public function index()
    {
        $restaurants = Restaurant::withCount('menuItems')->latest()->paginate(10);
        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new restaurant.
     */
    public function create()
    {
        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created restaurant in storage.
     */
    public function store(AdminRestaurantRequest $request)
    {
        Restaurant::create($request->validated());

        return redirect()->route('admin.restaurants.index')
            ->with('success', 'Restaurant added successfully!');
    }

    /**
     * Show the form for editing the specified restaurant.
     */
    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified restaurant in storage.
     */
    public function update(AdminRestaurantRequest $request, Restaurant $restaurant)
    {
        $restaurant->update($request->validated());

        return redirect()->route('admin.restaurants.index')
            ->with('success', 'Restaurant updated successfully!');
    }

    /**
     * Remove the specified restaurant from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return redirect()->route('admin.restaurants.index')
            ->with('success', 'Restaurant deleted successfully!');
    }
}
