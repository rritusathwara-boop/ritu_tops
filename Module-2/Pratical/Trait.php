<?php
// First Trait
trait Logger {
    public function logMessage() {
        echo "Logging information...<br>";
    }
}

// Second Trait
trait Notifier {
    public function sendNotification() {
        echo "Sending notification...<br>";
    }
}

// Class using both traits
class User {
    use Logger, Notifier;

    public function display() {
        echo "User Class Example<br>";
    }
}

// Create object
$user = new User();
$user->display();
$user->logMessage();
$user->sendNotification();
?>