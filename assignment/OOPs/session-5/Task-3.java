class ProductSearch {

    // Search by product name
    void searchProduct(String productName) {
        System.out.println("Searching for: " + productName);
    }

    // Search by product name + category
    void searchProduct(String productName, String category) {
        System.out.println(
            "Searching for: " + productName +
            " in category: " + category
        );
    }

    public static void main(String[] args) {

        ProductSearch search = new ProductSearch();

        // Search only by name
        search.searchProduct("iPhone 15");

        System.out.println();

        // Search by name and category
        search.searchProduct("iPhone 15", "Mobiles");
    }
}class MusicPlayer {

    void play(String song) {
        System.out.println("Playing: " + song);
    }
}

class SpotifyPlayer extends MusicPlayer {

    @Override
    void play(String song) {
        System.out.println("Streaming on Spotify: " + song);
    }
}

public class MusicDemo {

    public static void main(String[] args) {

        MusicPlayer player = new SpotifyPlayer();

        player.play("Perfect");
    }
}