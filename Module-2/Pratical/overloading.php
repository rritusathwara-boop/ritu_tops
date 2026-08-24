<?php
// PHP does not support method overloading directly.
// It can be achieved using __call() magic method.

class Calculator
{
    // Method overloading using __call()
    public function __call($method, $arguments)
    {
        if ($method == "add") {
            $count = count($arguments);

            // Two parameters
            if ($count == 2) {
                return $arguments[0] + $arguments[1];
            }

            // Three parameters
            elseif ($count == 3) {
                return $arguments[0] + $arguments[1] + $arguments[2];
            }

            else {
                return "Invalid number of arguments";
            }
        }
    }
}

// Creating object
$calc = new Calculator();

// Calling overloaded methods
echo "Addition of 2 numbers: " . $calc->add(10, 20) . "<br>";
echo "Addition of 3 numbers: " . $calc->add(10, 20, 30);

?>