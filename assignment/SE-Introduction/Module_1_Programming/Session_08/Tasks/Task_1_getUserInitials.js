function getUserInitials(fullName) {
    let words = fullName.trim().split(/\s+/);
    let initials = "";

    for (let word of words) {
        initials += word[0].toUpperCase();
    }

    return initials;
}

console.log(getUserInitials("Virat Kohli"));
