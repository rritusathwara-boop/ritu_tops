<?php
// Defining an interface

interface VehicleInterface
{
    public function start();
    public function stop();
}

// Implementing interface in Car class
class Car implements VehicleInterface
{
    public function start()
    {
        echo "Car started.<br>";
    }

    public function stop()
    {
        echo "Car stopped.<br>";
    }
}

// Implementing interface in Bike class
class Bike implements VehicleInterface
{
    public function start()
    {
        echo "Bike started.<br>";
    }

    public function stop()
    {
        echo "Bike stopped.<br>";
    }
}

// Creating objects
$car = new Car();
$bike = new Bike();

// Calling methods
$car->start();
$car->stop();

echo "<br>";

$bike->start();
$bike->stop();

?>