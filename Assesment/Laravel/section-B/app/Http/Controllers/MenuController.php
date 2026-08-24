<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Task 1 requirement: Display restaurant menu.
     * Returns a Blade view passing an associative array of at least 5 menu items using compact().
     */
    public function index()
    {
        // Associative array of menu items with name, category, and price
        $menuItems = [
            [
                'name' => 'Margherita Pizza',
                'category' => 'Pizza',
                'price' => 12.99
            ],
            [
                'name' => 'Cheeseburger Delight',
                'category' => 'Burgers',
                'price' => 8.50
            ],
            [
                'name' => 'Creamy Alfredo Pasta',
                'category' => 'Pasta',
                'price' => 11.25
            ],
            [
                'name' => 'Caesar Salad',
                'category' => 'Salads',
                'price' => 7.99
            ],
            [
                'name' => 'Chocolate Lava Cake',
                'category' => 'Desserts',
                'price' => 5.50
            ],
        ];

        // Pass data to resources/views/menu.blade.php using compact()
        return view('menu', compact('menuItems'));
    }
}
