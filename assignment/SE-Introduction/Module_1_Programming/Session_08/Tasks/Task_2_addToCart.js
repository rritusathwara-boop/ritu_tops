function addToCart(cart, productName) {
    cart.push(productName);
    console.log("Updated Cart:", cart);
}

let cart = ["T-shirt", "Shoes"];

addToCart(cart, "Watch");

console.log("Cart outside function:", cart);
