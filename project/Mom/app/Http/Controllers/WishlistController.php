<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\WishlistItem;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::firstOrCreate(['user_id' => auth()->id()]);
        $items = $wishlist->items()->with('product')->get();
        return view('wishlist.index', compact('items'));
    }

    public function add(Request $request)
    {
        $wishlist = Wishlist::firstOrCreate(['user_id' => auth()->id()]);
        $exists = WishlistItem::where('wishlist_id', $wishlist->id)
                              ->where('product_id', $request->product_id)
                              ->exists();
        if (!$exists) {
            WishlistItem::create([
                'wishlist_id' => $wishlist->id,
                'product_id'  => $request->product_id
            ]);
        }
        return redirect()->back()->with('success', 'Added to wishlist!');
    }

    public function remove($id)
    {
        WishlistItem::where('id', $id)->where('wishlist_id', function ($q) {
            $q->select('id')->from('wishlists')->where('user_id', auth()->id());
        })->delete();
        return redirect()->back()->with('success', 'Removed from wishlist.');
    }
}
