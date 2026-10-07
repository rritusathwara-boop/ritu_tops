<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class PageController extends Controller
{
    public function home()
    {
        $categories = Category::withCount('products')->where('status', 1)->take(4)->get();
        $featuredProducts = Product::with(['category', 'images'])->where('is_featured', true)->where('status', 1)->take(4)->get();
        $newArrivals = Product::with(['category', 'images'])->where('is_new_arrival', true)->where('status', 1)->take(4)->get();

        return view('welcome', compact('categories', 'featuredProducts', 'newArrivals'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
