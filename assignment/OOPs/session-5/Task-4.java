class MusicPlayer {

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