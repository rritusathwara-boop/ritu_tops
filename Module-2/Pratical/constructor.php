<?php
// Creating a class with constructor

class Student
{
    // Properties
    public $name;
    public $rollNo;

    // Constructor
    public function __construct($name, $rollNo)
    {
        $this->name = $name;
        $this->rollNo = $rollNo;
    }

    // Method to display details
    public function display()
    {
        echo "Student Name: " . $this->name . "<br>";
        echo "Roll Number: " . $this->rollNo;
    }
}

// Creating object
$student1 = new Student("Rahul", 101);

// Calling method
$student1->display();

?>