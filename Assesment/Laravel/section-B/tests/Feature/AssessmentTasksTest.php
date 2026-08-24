<?php

namespace Tests\Feature;

use App\Mail\OrderConfirmationMail;
use App\Models\FoodItem;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class AssessmentTasksTest extends TestCase
{
    use RefreshDatabase;

    /**
     * TASK 1 Test: GET /menu calls MenuController@index and returns Blade view with menu items.
     */
    public function test_task_1_menu_route_and_blade_view()
    {
        $response = $this->get('/menu');

        $response->assertStatus(200);
        $response->assertViewIs('menu');
        $response->assertViewHas('menuItems');
        $response->assertSee('Margherita Pizza');
        $response->assertSee('Category');
        $response->assertSee('Price');
    }

    /**
     * TASK 2 Test: FoodItem API CRUD with Eloquent ORM.
     */
    public function test_task_2_food_item_crud_api()
    {
        // 1. Test index() returns JSON
        FoodItem::create([
            'name' => 'Taco Supreme',
            'description' => 'Delicious mexican taco',
            'price' => 5.99,
            'category' => 'Mexican',
            'is_available' => true,
        ]);

        $indexResponse = $this->getJson('/api/food-items');
        $indexResponse->assertStatus(200);
        $indexResponse->assertJsonFragment(['name' => 'Taco Supreme']);

        // 2. Test store() creates food item and returns HTTP 201
        $storePayload = [
            'name' => 'Sushi Roll',
            'description' => 'Fresh salmon roll',
            'price' => 15.50,
            'category' => 'Japanese',
            'is_available' => true,
        ];

        $storeResponse = $this->postJson('/api/food-items', $storePayload);
        $storeResponse->assertStatus(201);
        $this->assertDatabaseHas('food_items', ['name' => 'Sushi Roll']);

        // 3. Test destroy() deletes food item and returns HTTP 200
        $foodItem = FoodItem::first();
        $destroyResponse = $this->deleteJson('/api/food-items/' . $foodItem->id);
        $destroyResponse->assertStatus(200);
        $this->assertDatabaseMissing('food_items', ['id' => $foodItem->id]);
    }

    /**
     * TASK 3 Test: Auth protection and RedirectIfAuthenticated custom middleware.
     */
    public function test_task_3_customer_authentication_and_middleware()
    {
        // 1. Unauthenticated users visiting /dashboard redirect to /login
        $unauthDashboard = $this->get('/dashboard');
        $unauthDashboard->assertRedirect('/login');

        // 2. Authenticated user can view /dashboard and /orders group
        $user = User::factory()->create();
        $authDashboard = $this->actingAs($user)->get('/dashboard');
        $authDashboard->assertStatus(200);

        $authOrdersIndex = $this->actingAs($user)->get('/orders');
        $authOrdersIndex->assertStatus(200);

        // 3. Already logged-in user visiting /login is redirected to /dashboard (RedirectIfAuthenticated)
        $loginRedirect = $this->actingAs($user)->get('/login');
        $loginRedirect->assertRedirect('/dashboard');
    }

    /**
     * TASK 4 Test: Order placement with FormRequest validation, relationships & queued email.
     */
    public function test_task_4_order_placement_validation_relationships_and_queued_mail()
    {
        Mail::fake();

        $user = User::factory()->create();
        $restaurant = Restaurant::create([
            'name' => 'Bistro Express',
            'address' => '789 Main St',
            'phone' => '1234567890',
        ]);

        // 1. Test validation failure when delivery_address is less than 10 chars
        $invalidResponse = $this->actingAs($user)->post('/orders', [
            'restaurant_id' => $restaurant->id,
            'delivery_address' => 'Short', // < 10 chars
            'total_amount' => 19.99,
        ]);
        $invalidResponse->assertSessionHasErrors(['delivery_address']);

        // 2. Test successful order placement with valid PlaceOrderRequest
        $validPayload = [
            'restaurant_id' => $restaurant->id,
            'delivery_address' => '123 Tech Park Avenue, Suite 400',
            'total_amount' => 45.00,
        ];

        $response = $this->actingAs($user)->post('/orders', $validPayload);

        // Verify order saved to database with belongsTo relationships
        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'restaurant_id' => $restaurant->id,
            'delivery_address' => '123 Tech Park Avenue, Suite 400',
            'total_amount' => 45.00,
            'status' => 'pending',
        ]);

        $order = Order::first();
        $this->assertEquals($user->id, $order->user->id);
        $this->assertEquals($restaurant->id, $order->restaurant->id);

        // Verify OrderConfirmationMail queued
        Mail::assertQueued(OrderConfirmationMail::class, function ($mail) use ($user, $order) {
            return $mail->hasTo($user->email) && $mail->order->id === $order->id;
        });
    }
}