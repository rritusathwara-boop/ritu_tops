function formatFollowersCount(count) {
    // Format millions.
    if (count >= 1000000) {
        return (count / 1000000).toFixed(1) + "M";
    }

    // Format thousands.
    if (count >= 1000) {
        return (count / 1000).toFixed(1) + "K";
    }

    // Keep numbers below 1000 as they are.
    return String(count);
}

console.log(formatFollowersCount(1500));
console.log(formatFollowersCount(1200000));
console.log(formatFollowersCount(900));
