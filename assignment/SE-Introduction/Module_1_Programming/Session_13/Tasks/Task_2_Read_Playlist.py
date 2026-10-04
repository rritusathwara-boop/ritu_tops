with open("playlist.txt", "r", encoding="utf-8") as file:
    for song in file:
        print(song.strip())
