<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of all restaurants for public browsing.
     */
    public function index()
    {
        $restaurants = Restaurant::withCount('menuItems')->latest()->get();

        return view('restaurants.index', compact('restaurants'));
    }

    /**
     * Display the specified restaurant and its menu items grouped by category.
     * Demonstrates Eloquent Relationship 1: Restaurant -> MenuItems with Category eager loading.
     */
    public function show($id)
    {
        // Eloquent Relationship Demonstration 1:
        // Loading Restaurant with its related MenuItems and each MenuItem's Category
        $restaurant = Restaurant::with([
            'menuItems.category'
        ])->findOrFail($id);

        return view('restaurants.show', compact('restaurant'));
    }
}
