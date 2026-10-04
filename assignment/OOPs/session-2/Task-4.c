class Playlist {
    constructor(name, createdOn, isPublic) {
        this.name = name;
        this.createdOn = createdOn;
        this.isPublic = isPublic;
        this.songs = [];
    }

    togglePublic() {
        this.isPublic = !this.isPublic;
    }

    addSong(songTitle) {
        this.songs.push(songTitle);
    }
}

let playlist1 = new Playlist(
    "My Favorite Songs",
    "2026-10-01",
    true
);

// Add three songs
playlist1.addSong("Espresso");
playlist1.addSong("Birds of a Feather");
playlist1.addSong("Beautiful Things");

// Display songs
console.log("Playlist:", playlist1.name);
console.log("Songs:");

for (let song of playlist1.songs) {
    console.log(song);
}