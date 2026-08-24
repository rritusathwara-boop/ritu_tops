<?php
function reverseString($str) {
    $reversed = "";
    $length = strlen($str);

    // Start from the last character (length - 1) 
    // and go down to the first character (0)
    for ($i = $length - 1; $i >= 0; $i--) {
        // Append each character to our new string
        $reversed .= $str[$i];
    }

    return $reversed;
}

// Usage:
$input = "Gemini";
echo "Original: " . $input . "<br>";
echo "Reversed: " . reverseString($input);

?>
