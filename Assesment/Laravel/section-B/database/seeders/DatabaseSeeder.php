<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database for assessment verification.
     */
    public function run(): void
    {
        // 1. Seed Users (Admin & Customer) using firstOrCreate to avoid duplicates
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        $customer = User::firstOrCreate(
            ['email' => 'customer@example.com'],
            [
                'name' => 'Customer User',
                'password' => Hash::make('password123'),
                'role' => 'customer',
            ]
        );

        // 2. Seed Categories (At least 2 categories)
        $mainCourse = Category::firstOrCreate(['name' => 'Main Course']);
        $beverages = Category::firstOrCreate(['name' => 'Beverages']);
        $appetizers = Category::firstOrCreate(['name' => 'Appetizers']);
        $desserts = Category::firstOrCreate(['name' => 'Desserts']);

        // 3. Seed Restaurants (At least 3 restaurants)
        $pizzaPalace = Restaurant::firstOrCreate(
            ['name' => 'Pizza Palace'],
            [
                'description' => 'Authentic wood-fired Italian pizzas and pastas.',
                'address' => '12 North Street, Foodville',
            ]
        );

        $burgerHouse = Restaurant::firstOrCreate(
            ['name' => 'Burger House'],
            [
                'description' => 'Gourmet handcrafted smash burgers & thick milkshakes.',
                'address' => '45 South Avenue, Grilltown',
            ]
        );

        $spiceKitchen = Restaurant::firstOrCreate(
            ['name' => 'Spice Kitchen'],
            [
                'description' => 'Rich aromatic Indian curries and fresh tandoori naan.',
                'address' => '88 East Boulevard, Currybay',
            ]
        );

        // 4. Seed Menu Items (At least 10 items distributed, including available & unavailable items)
        $itemsData = [
            // Pizza Palace
            [
                'restaurant_id' => $pizzaPalace->id,
                'category_id' => $mainCourse->id,
                'name' => 'Margherita Special Pizza',
                'description' => 'Fresh mozzarella, San Marzano tomato sauce, and fresh basil.',
                'price' => 299.00,
                'is_available' => true,
            ],
            [
                'restaurant_id' => $pizzaPalace->id,
                'category_id' => $mainCourse->id,
                'name' => 'Truffle Mushroom Pizza',
                'description' => 'Wild mushrooms, white truffle oil, and creamy fontina cheese.',
                'price' => 450.00,
                'is_available' => false, // Demonstrated Unavailable condition
            ],
            [
                'restaurant_id' => $pizzaPalace->id,
                'category_id' => $beverages->id,
                'name' => 'Italian Sparkling Lemonade',
                'description' => 'Chilled sparkling water with freshly squeezed Sicilian lemons.',
                'price' => 99.00,
                'is_available' => true,
            ],
            [
                'restaurant_id' => $pizzaPalace->id,
                'category_id' => $desserts->id,
                'name' => 'Classic Tiramisu',
                'description' => 'Espresso-soaked ladyfingers with mascarpone cream.',
                'price' => 180.00,
                'is_available' => true,
            ],

            // Burger House
            [
                'restaurant_id' => $burgerHouse->id,
                'category_id' => $mainCourse->id,
                'name' => 'Double Bacon Cheeseburger',
                'description' => 'Two Angus beef patties, sharp cheddar, smoked bacon, and house sauce.',
                'price' => 349.00,
                'is_available' => true,
            ],
            [
                'restaurant_id' => $burgerHouse->id,
                'category_id' => $mainCourse->id,
                'name' => 'Crispy Plant-Based Burger',
                'description' => 'Crispy plant patty, avocado, lettuce, and vegan mayo.',
                'price' => 310.00,
                'is_available' => false, // Demonstrated Unavailable condition
            ],
            [
                'restaurant_id' => $burgerHouse->id,
                'category_id' => $appetizers->id,
                'name' => 'Loaded Fries with Cheese & Jalapeños',
                'description' => 'Golden fries topped with warm cheese sauce and pickled jalapeños.',
                'price' => 149.00,
                'is_available' => true,
            ],
            [
                'restaurant_id' => $burgerHouse->id,
                'category_id' => $beverages->id,
                'name' => 'Thick Chocolate Milkshake',
                'description' => 'Rich Belgian chocolate ice cream blended with fresh milk.',
                'price' => 129.00,
                'is_available' => true,
            ],

            // Spice Kitchen
            [
                'restaurant_id' => $spiceKitchen->id,
                'category_id' => $mainCourse->id,
                'name' => 'Butter Chicken Special',
                'description' => 'Tender chicken cooked in rich tomato butter gravy.',
                'price' => 380.00,
                'is_available' => true,
            ],
            [
                'restaurant_id' => $spiceKitchen->id,
                'category_id' => $mainCourse->id,
                'name' => 'Paneer Tikka Masala',
                'description' => 'Char-grilled cottage cheese in spiced bell pepper sauce.',
                'price' => 320.00,
                'is_available' => true,
            ],
            [
                'restaurant_id' => $spiceKitchen->id,
                'category_id' => $beverages->id,
                'name' => 'Mango Lassi',
                'description' => 'Traditional sweet yogurt beverage infused with Alphonso mango pulp.',
                'price' => 89.00,
                'is_available' => true,
            ],
            [
                'restaurant_id' => $spiceKitchen->id,
                'category_id' => $appetizers->id,
                'name' => 'Crispy Veg Samosas (3pcs)',
                'description' => 'Golden pastry filled with spiced potato and green peas.',
                'price' => 79.00,
                'is_available' => false, // Demonstrated Unavailable condition
            ],
        ];

        foreach ($itemsData as $data) {
            MenuItem::firstOrCreate(
                [
                    'restaurant_id' => $data['restaurant_id'],
                    'name' => $data['name'],
                ],
                $data
            );
        }

        // 5. Seed a Sample Order for Customer
        if (Order::count() === 0) {
            $sampleOrder = Order::create([
                'user_id' => $customer->id,
                'restaurant_id' => $pizzaPalace->id,
                'total_amount' => 398.00,
                'status' => 'confirmed',
            ]);

            $pizzaItem = MenuItem::where('name', 'Margherita Special Pizza')->first();
            $drinkItem = MenuItem::where('name', 'Italian Sparkling Lemonade')->first();

            if ($pizzaItem) {
                OrderItem::create([
                    'order_id' => $sampleOrder->id,
                    'menu_item_id' => $pizzaItem->id,
                    'quantity' => 1,
                    'price' => $pizzaItem->price,
                ]);
            }

            if ($drinkItem) {
                OrderItem::create([
                    'order_id' => $sampleOrder->id,
                    'menu_item_id' => $drinkItem->id,
                    'quantity' => 1,
                    'price' => $drinkItem->price,
                ]);
            }
        }
    }
}
