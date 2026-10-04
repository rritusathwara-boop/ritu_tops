function calculateFinalPrice(price, discountPercentage, isMember) {
    let discount = price * discountPercentage / 100;
    let finalPrice = price - discount;

    if (isMember) {
        finalPrice = finalPrice - (finalPrice * 5 / 100);
    }

    return finalPrice;
}

console.log("Final Price: Rs. " + calculateFinalPrice(2000, 10, true));
console.log("Final Price for non-member: Rs. " + calculateFinalPrice(2000, 10, false));
