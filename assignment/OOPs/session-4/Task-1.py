class SocialMediaUser:
    def __init__(self, username, followers):
        self.username = username
        self.followers = followers

    def displayProfile(self):
        print("Username:", self.username)
        print("Followers:", self.followers)


# Create object
user1 = SocialMediaUser("Ritu", 5000)

user1.displayProfile()