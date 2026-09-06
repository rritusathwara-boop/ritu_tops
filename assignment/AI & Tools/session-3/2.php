<?php

// function to calculate total cart price with 5% delivery charge
function calculateTotalCartPrice($items)
{
    $subtotal = 0;

    foreach ($items as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }

    $deliveryCharge = $subtotal * 0.05;

    return $subtotal + $deliveryCharge;
}

$cart = [
    ['name' => 'Pizza', 'price' => 200, 'quantity' => 2],
    ['name' => 'Burger', 'price' => 150, 'quantity' => 1],
    ['name' => 'Cold Drink', 'price' => 50, 'quantity' => 2]
];

$total = calculateTotalCartPrice($cart);

echo "Total Cart Price: ₹" . $total;