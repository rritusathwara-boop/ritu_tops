class FoodOrder {
    constructor(orderId, restaurantName, isDelivered) {
        this.orderId = orderId;
        this.restaurantName = restaurantName;
        this.isDelivered = isDelivered;
    }

    markDelivered() {
        this.isDelivered = true;
        console.log("Order " + this.orderId + " has been delivered.");
    }
}

let order1 = new FoodOrder(
    101,
    "Dominos",
    false
);

order1.markDelivered();

console.log("Order ID:", order1.orderId);
console.log("Restaurant:", order1.restaurantName);
console.log("Delivered:", order1.isDelivered);