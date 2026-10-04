let likes = 1200;
let comments = 150;
let shares = 60;

let trending = likes >= 1000 || (comments > 200 && shares >= 50);

console.log("Is the post trending? " + trending);
