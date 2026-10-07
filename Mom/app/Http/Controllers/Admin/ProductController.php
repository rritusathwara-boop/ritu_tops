<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'images'      => 'nullable|array',
            'images.*'    => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $product = Product::create([
            'name'           => $request->name,
            'slug'           => $request->slug ?: Str::slug($request->name),
            'description'    => $request->description,
            'category_id'    => $request->category_id,
            'price'          => $request->price,
            'discount_price' => $request->discount_price ?: null,
            'stock'          => $request->stock,
            'sku'            => $request->sku,
            'is_featured'    => $request->has('is_featured') ? 1 : 0,
            'is_new_arrival' => $request->has('is_new_arrival') ? 1 : 0,
        ]);

        $this->saveProductImages($product, $request->file('images', []));

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully!');
    }

    public function show(string $id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    public function edit(string $id)
    {
        $product    = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'images'      => 'nullable|array',
            'images.*'    => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name'           => $request->name,
            'slug'           => $request->slug ?: Str::slug($request->name),
            'description'    => $request->description,
            'category_id'    => $request->category_id,
            'price'          => $request->price,
            'discount_price' => $request->discount_price ?: null,
            'stock'          => $request->stock,
            'sku'            => $request->sku,
            'is_featured'    => $request->has('is_featured') ? 1 : 0,
            'is_new_arrival' => $request->has('is_new_arrival') ? 1 : 0,
        ]);

        $this->saveProductImages($product, $request->file('images', []));

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }

    protected function saveProductImages(Product $product, array $images): void
    {
        if (empty($images)) {
            return;
        }

        $hasExistingPrimary = $product->images()->where('is_primary', true)->exists();

        foreach ($images as $index => $image) {
            $filename = time() . '_' . $index . '_' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
            $storedPath = $image->storeAs('products', $filename, 'public');

            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => 'storage/' . $storedPath,
                'is_primary' => ! $hasExistingPrimary && $index === 0,
            ]);
        }
    }
}
