<?php

class OrderHistory
{
    private array $orders = [];

    // Add a new order
    public function addOrder(int $id, float $amount): void
    {
        $this->orders[] = [
            'id' => $id,
            'amount' => $amount
        ];
    }

    // Get all orders
    public function getOrders(): array
    {
        return $this->orders;
    }

    // Display all orders
    public function displayOrders(): void
    {
        if (empty($this->orders)) {
            echo "<p>No orders found.</p>";
            return;
        }

        echo "<h2>User Order History</h2>";
        echo "<table border='1' cellpadding='10' cellspacing='0'>";
        echo "<tr>";
        echo "<th>Order ID</th>";
        echo "<th>Amount</th>";
        echo "</tr>";

        foreach ($this->orders as $order) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars((string)$order['id']) . "</td>";
            echo "<td>₹" . number_format($order['amount'], 2) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
}

// Create OrderHistory object
$orderHistory = new OrderHistory();

// Add user's orders
$orderHistory->addOrder(101, 499.00);
$orderHistory->addOrder(102, 799.50);
$orderHistory->addOrder(103, 1299.00);
$orderHistory->addOrder(104, 599.99);

// Display order list
$orderHistory->displayOrders();

?>