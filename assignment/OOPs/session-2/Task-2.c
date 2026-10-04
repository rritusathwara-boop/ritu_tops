class Playlist {
    constructor(name, createdOn, isPublic) {
        this.name = name;
        this.createdOn = createdOn;
        this.isPublic = isPublic;
    }

    togglePublic() {
        this.isPublic = !this.isPublic;
    }
}

let playlist1 = new Playlist(
    "My Favorite Songs",
    "2026-10-01",
    true
);

console.log("Before:", playlist1.isPublic);

playlist1.togglePublic();
console.log("After First Toggle:", playlist1.isPublic);

playlist1.togglePublic();
console.log("After Second Toggle:", playlist1.isPublic);