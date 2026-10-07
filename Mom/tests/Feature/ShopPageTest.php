<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShopPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_shop_pages_render_successfully(): void
    {
        $category = Category::create([
            'name' => 'Dresses',
            'slug' => 'dresses',
            'status' => 1,
        ]);

        Product::create([
            'category_id' => $category->id,
            'name' => 'Party Dress',
            'slug' => 'party-dress',
            'description' => 'A beautiful evening dress.',
            'price' => 1999.00,
            'discount_price' => 1499.00,
            'sku' => 'PD-001',
            'stock' => 10,
            'is_new_arrival' => true,
            'status' => 1,
        ]);

        $shopResponse = $this->get('/shop');
        $shopResponse->assertStatus(200);

        $productResponse = $this->get('/product/party-dress');
        $productResponse->assertStatus(200);
    }
}
