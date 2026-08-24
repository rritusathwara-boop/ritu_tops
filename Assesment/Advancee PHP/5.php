<?php

	$message = "";

	if(isset($_POST['save']))
	{
		// Sanitize inputs
		$name = htmlspecialchars(trim($_POST['name']));
		$platform = htmlspecialchars(trim($_POST['platform']));
		$followers = htmlspecialchars(trim($_POST['followers']));

		// Check for empty fields
		if(empty($name) || empty($platform) || empty($followers))
		{
			$message = "Please complete all profile fields before saving.";
		}
		else
		{
			$message = "Profile saved successfully!";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Creator Profile Form</title>
	</head>
	<body>

	<h2>Creator Profile</h2>

	<form method="post">
		Name:
		<input type="text" name="name"><br><br>

		Platform:
		<input type="text" name="platform"><br><br>

		Followers:
		<input type="number" name="followers"><br><br>

		<input type="submit" name="save" value="Save Profile">
	</form>

	<p><?php echo $message; ?></p>

	</body>
</html>