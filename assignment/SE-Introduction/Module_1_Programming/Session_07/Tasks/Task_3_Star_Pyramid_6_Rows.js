let rows = 6;

for (let i = 1; i <= rows; i++) {
    let line = "";

    for (let space = 1; space <= rows - i; space++) {
        line += " ";
    }

    for (let star = 1; star <= (2 * i - 1); star++) {
        line += "*";
    }

    console.log(line);
}
