<?php
// Creating a class named Car

class Car
{
    // Properties
    public $make;
    public $model;
    public $year;

    // Constructor
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
        echo "Car Year: " . $this->year . "<br><br>";
    }
}

// Instantiating multiple objects
$car1 = new Car("Toyota", "Corolla", 2022);
$car2 = new Car("Honda", "Civic", 2021);
$car3 = new Car("Hyundai", "i20", 2023);

// Accessing properties directly
echo "First Car Model: " . $car1->model . "<br>";
echo "Second Car Make: " . $car2->make . "<br><br>";

// Accessing methods
$car1->displayDetails();
$car2->displayDetails();
$car3->displayDetails();

?>