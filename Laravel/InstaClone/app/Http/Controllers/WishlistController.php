<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function add($product)
    {
        return back()->with('success', 'Product added to wishlist.');
    }

    public function remove($product)
    {
        return back()->with('success', 'Product removed from wishlist.');
    }
}