<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\ProductColor;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partyWear = Category::where('slug', 'party-wear')->first();
        $dresses = Category::where('slug', 'dresses')->first();
        $gowns = Category::where('slug', 'evening-gowns')->first();
        $skirts = Category::where('slug', 'skirts-tops')->first();
        $coord = Category::where('slug', 'co-ord-sets')->first();
        $summer = Category::where('slug', 'summer-wear')->first();

        $products = [
            [
                'category_id' => $gowns ? $gowns->id : 1,
                'name' => 'Midnight Glamour Black Party Dress',
                'slug' => 'midnight-glamour-black-party-dress',
                'description' => 'Make an unforgettable entrance with this breathtaking midnight black party dress. Tailored to perfection with premium breathable fabric, stunning silhouette, and refined finish.',
                'price' => 3499.00,
                'discount_price' => 2799.00,
                'sku' => 'MM-DR-BLK01',
                'stock' => 35,
                'is_featured' => true,
                'is_new_arrival' => true,
                'image' => 'assets/images/black_partyware.jpeg',
                'images' => [
                    'assets/images/black_partyware.jpeg',
                    'assets/images/partyware.jpeg',
                    'assets/images/partyware1.jpeg',
                ],
                'sizes' => ['XS', 'S', 'M', 'L', 'XL'],
                'colors' => [
                    ['name' => 'Midnight Black', 'code' => '#111111'],
                    ['name' => 'Wine Red', 'code' => '#6b1021'],
                    ['name' => 'Navy Blue', 'code' => '#1b2a4a'],
                ],
            ],
            [
                'category_id' => $partyWear ? $partyWear->id : 1,
                'name' => 'Royal Crimson Flare Party Dress',
                'slug' => 'royal-crimson-flare-party-dress',
                'description' => 'Exquisite western flare dress designed for celebrations and special evenings. Combines rich texture with comfortable fit.',
                'price' => 2999.00,
                'discount_price' => 2499.00,
                'sku' => 'MM-PW-CRM02',
                'stock' => 50,
                'is_featured' => true,
                'is_new_arrival' => true,
                'image' => 'assets/images/partyware.jpeg',
                'images' => [
                    'assets/images/partyware.jpeg',
                    'assets/images/partyware1.jpeg',
                    'assets/images/pink_partyware.jpeg',
                ],
                'sizes' => ['S', 'M', 'L', 'XL'],
                'colors' => [
                    ['name' => 'Crimson Red', 'code' => '#a0122e'],
                    ['name' => 'Rose Gold', 'code' => '#b76e79'],
                    ['name' => 'Emerald Green', 'code' => '#097969'],
                ],
            ],
            [
                'category_id' => $dresses ? $dresses->id : 1,
                'name' => 'Blush Pink Pastel Flounce Frock',
                'slug' => 'blush-pink-pastel-flounce-frock',
                'description' => 'A charming pastel pink flounce dress that radiates effortless grace. Perfect for brunch dates, casual parties, and sunny outings.',
                'price' => 2499.00,
                'discount_price' => 1899.00,
                'sku' => 'MM-DR-PNK03',
                'stock' => 45,
                'is_featured' => true,
                'is_new_arrival' => false,
                'image' => 'assets/images/light_pink_frock.jpeg',
                'images' => [
                    'assets/images/light_pink_frock.jpeg',
                    'assets/images/pink_partyware.jpeg',
                ],
                'sizes' => ['S', 'M', 'L'],
                'colors' => [
                    ['name' => 'Blush Pink', 'code' => '#f4c2c2'],
                    ['name' => 'Ivory White', 'code' => '#fffff0'],
                ],
            ],
            [
                'category_id' => $coord ? $coord->id : 1,
                'name' => 'Sunshine Yellow Ruffled Summer Frock',
                'slug' => 'sunshine-yellow-ruffled-summer-frock',
                'description' => 'Brighten up every room with this vibrant sunshine yellow dress. Features airy fabric, delicate frills, and a flattering waistline.',
                'price' => 2199.00,
                'discount_price' => 1699.00,
                'sku' => 'MM-SU-YLW04',
                'stock' => 30,
                'is_featured' => true,
                'is_new_arrival' => true,
                'image' => 'assets/images/yellow_frock.jpeg',
                'images' => [
                    'assets/images/yellow_frock.jpeg',
                    'assets/images/light_pink_frock.jpeg',
                ],
                'sizes' => ['S', 'M', 'L', 'XL'],
                'colors' => [
                    ['name' => 'Sunshine Yellow', 'code' => '#f3ca28'],
                    ['name' => 'Coral Peach', 'code' => '#f88379'],
                ],
            ],
            [
                'category_id' => $skirts ? $skirts->id : 1,
                'name' => 'Chic Urban Skirt & Top Co-ord Ensemble',
                'slug' => 'chic-urban-skirt-top-coord-ensemble',
                'description' => 'Step out in modern sophistication with this stylish two-piece set. Effortlessly versatile for day wear and evening gatherings.',
                'price' => 3299.00,
                'discount_price' => 2699.00,
                'sku' => 'MM-SK-SET05',
                'stock' => 25,
                'is_featured' => true,
                'is_new_arrival' => true,
                'image' => 'assets/images/skitus.jpeg',
                'images' => [
                    'assets/images/skitus.jpeg',
                    'assets/images/partyware.jpeg',
                ],
                'sizes' => ['XS', 'S', 'M', 'L'],
                'colors' => [
                    ['name' => 'Classic Monochrome', 'code' => '#2b2b2b'],
                    ['name' => 'Beige Tan', 'code' => '#d2b48c'],
                ],
            ],
            [
                'category_id' => $summer ? $summer->id : 1,
                'name' => 'Rose Quartz Shimmer Party Gown',
                'slug' => 'rose-quartz-shimmer-party-gown',
                'description' => 'Dazzle the crowd with soft shimmer and flattering contours. An exquisite party wear essential designed for confident modern women.',
                'price' => 3799.00,
                'discount_price' => 2999.00,
                'sku' => 'MM-PW-SHM06',
                'stock' => 40,
                'is_featured' => true,
                'is_new_arrival' => false,
                'image' => 'assets/images/pink_partyware.jpeg',
                'images' => [
                    'assets/images/pink_partyware.jpeg',
                    'assets/images/partyware1.jpeg',
                ],
                'sizes' => ['S', 'M', 'L', 'XL'],
                'colors' => [
                    ['name' => 'Rose Quartz', 'code' => '#aa5478'],
                    ['name' => 'Champagne', 'code' => '#fad6a5'],
                ],
            ],
            [
                'category_id' => $partyWear ? $partyWear->id : 1,
                'name' => 'Enchanted Evening Cocktail Dress',
                'slug' => 'enchanted-evening-cocktail-dress',
                'description' => 'A masterpiece in contemporary evening fashion. Clean lines, luxe drape, and striking style that make a timeless statement.',
                'price' => 3199.00,
                'discount_price' => 2599.00,
                'sku' => 'MM-PW-ENC07',
                'stock' => 20,
                'is_featured' => false,
                'is_new_arrival' => true,
                'image' => 'assets/images/partyware1.jpeg',
                'images' => [
                    'assets/images/partyware1.jpeg',
                    'assets/images/black_partyware.jpeg',
                ],
                'sizes' => ['S', 'M', 'L'],
                'colors' => [
                    ['name' => 'Deep Onyx', 'code' => '#0f0f0f'],
                    ['name' => 'Ruby', 'code' => '#9b111e'],
                ],
            ],
            [
                'category_id' => $dresses ? $dresses->id : 1,
                'name' => 'Starlight Velvet Glam Dress',
                'slug' => 'starlight-velvet-glam-dress',
                'description' => 'Crafted with premium soft velvet and exquisite cut. Designed to celebrate elegance in comfort.',
                'price' => 3599.00,
                'discount_price' => 2899.00,
                'sku' => 'MM-DR-VLV08',
                'stock' => 35,
                'is_featured' => true,
                'is_new_arrival' => true,
                'image' => 'assets/images/party_ware.jpeg',
                'images' => [
                    'assets/images/party_ware.jpeg',
                    'assets/images/partyware.jpeg',
                ],
                'sizes' => ['S', 'M', 'L', 'XL'],
                'colors' => [
                    ['name' => 'Midnight Velvet', 'code' => '#1a1a2e'],
                    ['name' => 'Burgundy', 'code' => '#800020'],
                ],
            ]
        ];

        foreach ($products as $item) {
            $images = $item['images'];
            $sizes = $item['sizes'];
            $colors = $item['colors'];
            unset($item['images'], $item['sizes'], $item['colors'], $item['image']);

            $product = Product::updateOrCreate(['slug' => $item['slug']], $item);

            // Seed Images
            ProductImage::where('product_id', $product->id)->delete();
            foreach ($images as $index => $imgPath) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $imgPath,
                    'is_primary' => ($index === 0),
                ]);
            }

            // Seed Sizes
            ProductSize::where('product_id', $product->id)->delete();
            foreach ($sizes as $size) {
                ProductSize::create([
                    'product_id' => $product->id,
                    'size' => $size,
                ]);
            }

            // Seed Colors
            ProductColor::where('product_id', $product->id)->delete();
            foreach ($colors as $color) {
                ProductColor::create([
                    'product_id' => $product->id,
                    'color_name' => $color['name'],
                    'color_code' => $color['code'],
                ]);
            }
        }
    }
}
