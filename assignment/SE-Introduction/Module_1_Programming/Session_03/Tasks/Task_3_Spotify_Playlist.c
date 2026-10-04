#include <stdio.h>

int main() {
    char playlistName[] = "My Favourites";
    int totalSongs = 25;
    float averageDuration = 3.75f;

    printf("My Spotify playlist '%s' has %d songs with an average duration of %.2f minutes.\n",
           playlistName, totalSongs, averageDuration);

    return 0;
}
