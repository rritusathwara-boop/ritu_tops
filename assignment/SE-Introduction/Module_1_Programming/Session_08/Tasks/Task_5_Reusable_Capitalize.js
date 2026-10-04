function capitalizeFirstLetter(text) {
    if (text.length === 0) {
        return text;
    }

    return text.charAt(0).toUpperCase() + text.slice(1);
}

console.log(capitalizeFirstLetter("product"));
console.log(capitalizeFirstLetter("vidhi"));
console.log(capitalizeFirstLetter("instagram"));
