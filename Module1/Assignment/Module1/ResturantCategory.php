<?php
echo "---- Restaurant Menu ----\n";
echo "1. Starter\n";
echo "2. Main Course\n";
echo "3. Dessert\n";

$choice = readline("Enter your choice (1-3): ");

switch($choice)
{
    case 1:
        echo "\nCategory: Starter\n";
        echo "Dish: Veg Manchurian\n";
        break;

    case 2:
        echo "\nCategory: Main Course\n";
        echo "Dish: Paneer Butter Masala\n";
        break;

    case 3:
        echo "\nCategory: Dessert\n";
        echo "Dish: Gulab Jamun\n";
        break;

    default:
        echo "\nInvalid choice! Please select between 1 to 3.\n";
}
?>
