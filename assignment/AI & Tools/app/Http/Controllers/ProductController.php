<?php
//session-5 Task-2
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use OpenAI\Client;

class ProductController extends Controller
{
    protected Client $openAi;

    public function __construct()
    {
        $this->openAi = new Client(env('OPENAI_API_KEY'));
    }

    // read all products
    public function index()
    {
        $products = Product::latest()->get();

        return response()->json([
            'data' => $products,
        ], 200);
    }

    // create a new product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'stock' => ['nullable', 'integer', 'min:0'],
        ]);

        $product = Product::create($validated);

        return response()->json([
            'message' => 'Product created successfully.',
            'data' => $product,
        ], 201);
    }

    // read a single product
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return response()->json([
            'data' => $product,
        ], 200);
    }

    // update an existing product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'price' => ['sometimes', 'required', 'numeric', 'min:0'],
            'category' => ['sometimes', 'required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'stock' => ['sometimes', 'nullable', 'integer', 'min:0'],
        ]);

        $product->update($validated);

        return response()->json([
            'message' => 'Product updated successfully.',
            'data' => $product->fresh(),
        ], 200);
    }

    // delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully.',
        ], 200);
    }
}
