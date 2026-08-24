<!DOCTYPE html>
<html>
<head>
    <title>Creator Bio Form</title>
</head>
<body>

<h2>Creator Bio Submission</h2>

<form method="post">
    <label>Enter Creator Bio:</label><br><br>
    <textarea name="bio" rows="5" cols="40" required></textarea><br><br>
    <input type="submit" name="submit" value="Save Bio">
</form>

<?php
if(isset($_POST['submit']))
{
    $bio = $_POST['bio'];

    // Open file in append mode
    $file = fopen("registry.txt", "a");

    // Write bio to file
    fwrite($file, $bio . PHP_EOL);

    // Close file
    fclose($file);

    echo "<p>Bio saved successfully!</p>";
}
?>

</body>
</html>