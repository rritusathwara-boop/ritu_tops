class SocialMediaUser:
    def __init__(self, username, followers):
        self.username = username
        self.followers = followers

    def displayProfile(self):
        print("Username:", self.username)
        print("Followers:", self.followers)


class Podcaster(SocialMediaUser):
    def __init__(self, username, followers, podcastName):
        super().__init__(username, followers)
        self.podcastName = podcastName

    def publishEpisode(self, episodeTitle):
        print("Episode", episodeTitle, "published on", self.podcastName)


# Create Podcaster object
podcaster1 = Podcaster("Ritu", 3000, "Tech Talks")

podcaster1.displayProfile()
podcaster1.publishEpisode("Introduction to OOP")