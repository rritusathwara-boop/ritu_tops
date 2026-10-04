with open("playlist.txt", "r", encoding="utf-8") as file:
    for song in file:
        song = song.strip()

        if "love" in song.lower():
            print(song)
