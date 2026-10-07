<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
            'size' => 'nullable|string',
            'color' => 'nullable|string',
        ]);

        $product = Product::with(['images', 'category'])->findOrFail($request->product_id);
        $cart = session()->get('cart', []);

        $quantity = (int) $request->input('quantity', 1);
        $size = $request->input('size', 'M');
        $color = $request->input('color', 'Default');

        // Create a unique cart item key based on product id, size and color
        $cartKey = $product->id . '_' . $size . '_' . str_replace(' ', '', strtolower($color));

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $quantity;
        } else {
            $cart[$cartKey] = [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'quantity' => $quantity,
                'price' => (float) ($product->discount_price ?? $product->price),
                'original_price' => (float) $product->price,
                'image' => $product->image_url,
                'size' => $size,
                'color' => $color,
                'category' => $product->category->name ?? 'Western Wear',
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', '“' . $product->name . '” added to cart successfully!');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        $quantity = (int) $request->input('quantity', 1);

        if (isset($cart[$id])) {
            if ($quantity > 0) {
                $cart[$id]['quantity'] = $quantity;
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Cart updated successfully!');
            } else {
                unset($cart[$id]);
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Item removed from cart.');
            }
        }

        return redirect()->back()->with('error', 'Item not found in cart.');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Item removed from cart.');
        }
        return redirect()->back()->with('error', 'Item not found in cart.');
    }
}
