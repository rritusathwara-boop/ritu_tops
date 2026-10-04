class Task:
    def __init__(self, title):
        self.title = title
        self.isDone = False

    def markDone(self):
        self.isDone = True

    def display(self):
        if self.isDone:
            print(self.title, "- DONE")
        else:
            print(self.title, "- PENDING")


# Create a task
task1 = Task("Complete assignment")

task1.display()

task1.markDone()

task1.display()