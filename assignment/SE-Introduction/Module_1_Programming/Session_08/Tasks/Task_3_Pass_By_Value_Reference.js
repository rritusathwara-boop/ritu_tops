function increaseFollowersByValue(followers) {
    followers += 1000;
    console.log("Inside by-value function:", followers);
}

function increaseFollowersByReference(user) {
    user.followers += 1000;
    console.log("Inside by-reference-style object function:", user.followers);
}

let followers = 5000;
increaseFollowersByValue(followers);
console.log("Original after by-value:", followers);

let user = { followers: 5000 };
increaseFollowersByReference(user);
console.log("Original after object update:", user.followers);
