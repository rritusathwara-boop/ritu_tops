<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function create()
    {
        return view('restaurant.create');
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $cuisine = $request->cuisine;

        return "Restaurant added successfully!<br>Name: $name<br>Cuisine: $cuisine";
    }
}