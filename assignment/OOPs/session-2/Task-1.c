class Playlist {
    constructor(name, createdOn, isPublic) {
        this.name = name;
        this.createdOn = createdOn;
        this.isPublic = isPublic;
    }
}

// Create object
let playlist1 = new Playlist(
    "My Favorite Songs",
    "2026-10-01",
    true
);

// Print properties
console.log("Name:", playlist1.name);
console.log("Created On:", playlist1.createdOn);
console.log("Is Public:", playlist1.isPublic);