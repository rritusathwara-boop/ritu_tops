class Movie:
    def __init__(self, title, year, rating):
        self.title = title
        self.year = year
        self.rating = rating

    def displayInfo(self):
        print("Movie:", self.title)
        print("Year:", self.year)
        print("Rating:", self.rating)


# Original movie
movie1 = Movie("3 Idiots", 2009, 4.5)

# Copy movie
movie2 = Movie(movie1.title, movie1.year, movie1.rating)

print("Original Movie:")
movie1.displayInfo()

print("\nCopied Movie:")
movie2.displayInfo()