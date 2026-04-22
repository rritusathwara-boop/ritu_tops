<?php
$num1 = 10;
$num2 = 5;
$operator = "+";

if ($operator == "+") {
    $result = $num1 + $num2;
    echo "Addition = " . $result;
}
else if ($operator == "-") {
    $result = $num1 - $num2;
    echo "Subtraction = " . $result;
}
else if ($operator == "*") {
    $result = $num1 * $num2;
    echo "Multiplication = " . $result;
}
else if ($operator == "/") {
    if ($num2 != 0) {
        $result = $num1 / $num2;
        echo "Division = " . $result;
    } 
    else {
        echo "Error: Division by zero not allowed!";
    }
}
else {
    echo "Invalid Operator!";
}
?>
