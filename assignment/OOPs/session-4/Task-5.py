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


class Podcaster(SocialMediaUser):
    def __init__(self, username, followers, podcastName):
        super().__init__(username, followers)
        self.podcastName = podcastName

    def publishEpisode(self, episodeTitle):
        print("Episode", episodeTitle, "published on", self.podcastName)


class InstagramInfluencer(SocialMediaUser):
    def postStory(self, storyTitle):
        print(self.username, "posted a new story:", storyTitle)


# Create Instagram Influencer
influencer = InstagramInfluencer("Ritu", 8000)

influencer.displayProfile()
influencer.postStory("New Fashion Look")