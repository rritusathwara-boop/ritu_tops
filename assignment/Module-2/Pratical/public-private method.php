<?php
// Simple PHP class demonstrating Encapsulation

class Student
{
    // Private properties (cannot be accessed directly outside the class)
    private $name;
    private $marks;

    // Public method to set values
    public function setStudent($name, $marks)
    {
        $this->name = $name;
        $this->marks = $marks;
    }

    // Public method to display values
    public function getStudent()
    {
        echo "Student Name: " . $this->name . "<br>";
        echo "Student Marks: " . $this->marks;
    }
}

// Creating object
$student1 = new Student();

// Setting values using public method
$student1->setStudent("Rahul", 85);

// Getting values using public method
$student1->getStudent();
?>