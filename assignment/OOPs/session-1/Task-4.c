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


class TaskList:
    def __init__(self):
        self.tasks = []

    def addTask(self, title):
        task = Task(title)
        self.tasks.append(task)

    def markTaskDone(self, index):
        if index >= 0 and index < len(self.tasks):
            self.tasks[index].markDone()
        else:
            print("Invalid task number!")

    def showTasks(self):
        print("\n--- Task List ---")

        for i, task in enumerate(self.tasks):
            print(i + 1, end=". ")
            task.display()


# Create TaskList object
taskList = TaskList()

# Add 3 tasks
taskList.addTask("Complete assignment")
taskList.addTask("Study PHP")
taskList.addTask("Practice OOP")

# Mark second task as done
taskList.markTaskDone(1)

# Display tasks
taskList.showTasks()