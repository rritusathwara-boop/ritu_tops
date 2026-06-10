<?php
session_start();
require_once "creator.php";

$message = "";

if(isset($_POST['save']))
{
    $name = htmlspecialchars(trim($_POST['name']));
    $bio = htmlspecialchars(trim($_POST['bio']));
    $category = htmlspecialchars(trim($_POST['category']));

    if(empty($name) || empty($bio) || empty($category))
    {
        $message = "Please complete all profile fields before saving.";
    }
    else
    {
        $creator = new Creator($name, $bio, $category);

        $_SESSION['creator'] = serialize($creator);

        $message = "Profile saved successfully!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Creator Profile Hub</title>
</head>
<body>

<h2>Create / Edit Profile</h2>

<form method="post">

    Name:
    <input type="text" name="name"><br><br>

    Bio:
    <textarea name="bio"></textarea><br><br>

    Category:
    <input type="text" name="category"><br><br>

    <input type="submit" name="save" value="Save Profile">

</form>

<p><?php echo $message; ?></p>

<a href="dashboard.php">View Dashboard</a>

</body>
</html>