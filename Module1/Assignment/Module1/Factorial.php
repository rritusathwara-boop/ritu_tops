<?php
function findFactorial($n) {
    // 1. Base Case: The factorial of 0 or 1 is 1
    if ($n <= 1) 
	{
        return 1;
    }

    // 2. Recursive Case: n * factorial of (n - 1)
    return $n * findFactorial($n - 1);
}

	// Usage:
	$number = 5;
	echo "The factorial of $number is " . findFactorial($number);
	// Output: The factorial of 5 is 120
?>
