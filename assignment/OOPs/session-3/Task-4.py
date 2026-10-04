class Ticket:
    def __init__(self, movieName):
        self.movieName = movieName
        print("Ticket booked for:", self.movieName)

    def __del__(self):
        print("Saving your ticket...")


# Create Ticket object
ticket1 = Ticket("Avengers")

# Delete object
del ticket1

print("Ticket object deleted.")