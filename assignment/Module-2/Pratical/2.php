<?php
// Creating a class named Car

class Car
{
    // Properties
    public $make;
    public $model;
    public $year;

    // Constructor to initialize values
    public function __construct($make, $model, $year)
    {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    // Method to display car details
    public function displayDetails()
    {
        echo "Car Make: " . $this->make . "<br>";
        echo "Car Model: " . $this->model . "<br>";
        echo "Car Year: " . $this->year;
    }
}

// Creating an object of Car class
$car1 = new Car("Toyota", "Corolla", 2022);

// Calling the method
$car1->displayDetails();

?>