class Song {
    private String title;
    private String artist;

    // Getter
    public String getTitle() {
        return title;
    }

    // Setter
    public void setTitle(String title) {
        this.title = title;
    }

    // Getter
    public String getArtist() {
        return artist;
    }

    // Setter
    public void setArtist(String artist) {
        this.artist = artist;
    }
}

public class SongDemo {
    public static void main(String[] args) {

        Song song = new Song();

        song.setTitle("Perfect");
        song.setArtist("Ed Sheeran");

        System.out.println("Title: " + song.getTitle());
        System.out.println("Artist: " + song.getArtist());

        // Update title
        song.setTitle("Shape of You");

        System.out.println("Updated Title: " + song.getTitle());
    }
}