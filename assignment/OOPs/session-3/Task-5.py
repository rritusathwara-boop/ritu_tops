class Playlist:
    def __init__(self, name):
        self.name = name
        print("Playlist created:", self.name)

    def __del__(self):
        with open("autosave.txt", "w") as file:
            file.write(self.name)

        print("Playlist auto-saved successfully.")


# Create playlist
playlist1 = Playlist("My Favourites")

# Delete object
del playlist1

print("Program finished.")