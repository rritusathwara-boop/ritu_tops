<?php

function login($username, $password)
{
    $correctUsername = "admin";
    $correctPassword = "12345";

    if ($username === $correctUsername && $password === $correctPassword) {
        return true;
    }

    return false;
}

// Sample tests

$tests = [
    ["admin", "12345"],
    ["admin", "wrongpass"],
    ["wronguser", "12345"],
    ["wronguser", "wrongpass"]
];

foreach ($tests as $test) {

    $username = $test[0];
    $password = $test[1];

    if (login($username, $password)) {
        echo "Username: $username | Password: $password | Login successful!<br>";
    } else {
        echo "Username: $username | Password: $password | Login failed!<br>";
    }
}

?>