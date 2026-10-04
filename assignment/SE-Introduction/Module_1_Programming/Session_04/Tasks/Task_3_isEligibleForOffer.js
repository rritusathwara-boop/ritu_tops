function isEligibleForOffer(age, orderValue) {
    return age >= 18 && orderValue > 500;
}

console.log(isEligibleForOffer(20, 750)); // true
console.log(isEligibleForOffer(17, 750)); // false
