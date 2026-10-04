class FoodOrder {
    constructor(order) {
        this.orderId = order.orderId;
        this.restaurantName = order.restaurantName;
        this.isDelivered = order.isDelivered;
    }

    markDelivered() {
        this.isDelivered = true;
        console.log("Order " + this.orderId + " has been delivered.");
    }
}

// Create object using object parameter
let order1 = new FoodOrder({
    orderId: 101,
    restaurantName: "Dominos",
    isDelivered: false
});

// Display details
console.log("Order ID:", order1.orderId);
console.log("Restaurant:", order1.restaurantName);
console.log("Delivered:", order1.isDelivered);

// Mark as delivered
order1.markDelivered();

console.log("Updated Delivered:", order1.isDelivered);