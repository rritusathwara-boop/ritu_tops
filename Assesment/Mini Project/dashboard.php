<?php
	session_start();
	require_once "creator.php";

	if(!isset($_SESSION['creator']))
	{
		echo "No profile found.";
		exit();
	}

	$creator = unserialize($_SESSION['creator']);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Creator Dashboard</title>
	</head>
	<body>

	<?php
	$creator->renderProfile();
	?>

	<br>

	<a href="profile.php">Edit Profile</a>

	</body>
</html>