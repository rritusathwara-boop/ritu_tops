class SocialMediaUser:
    def __init__(self, username, followers):
        self.username = username
        self.followers = followers

    def displayProfile(self):
        print("Username:", self.username)
        print("Followers:", self.followers)


class YouTuber(SocialMediaUser):
    def __init__(self, username, followers, channelName):
        super().__init__(username, followers)
        self.channelName = channelName

    def uploadVideo(self, title):
        print("Video", title, "uploaded to", self.channelName)


class GamingYouTuber(YouTuber):
    def streamGame(self, gameName):
        print(
            self.username,
            "is now streaming",
            gameName,
            "on",
            self.channelName
        )


# Create GamingYouTuber object
gamer = GamingYouTuber("Ritu", 10000, "Ritu Gaming")

gamer.displayProfile()
gamer.uploadVideo("GTA 5 Gameplay")
gamer.streamGame("GTA 5")