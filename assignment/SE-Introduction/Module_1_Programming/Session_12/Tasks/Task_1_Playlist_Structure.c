#include <stdio.h>

struct Playlist {
    char title[50];
    char artist[50];
    int duration;
};

int main() {
    struct Playlist song = {"Perfect", "Ed Sheeran", 263};

    printf("Title: %s\n", song.title);
    printf("Artist: %s\n", song.artist);
    printf("Duration: %d seconds\n", song.duration);

    return 0;
}
