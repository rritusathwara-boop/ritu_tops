<?php
	session_start();

	// Check if user is logged in
	if(!isset($_SESSION['user']))
	{
		header("Location: login.php");
		exit();
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Dashboard</title>
	</head>
	<body>

	<h2>Welcome, <?php echo $_SESSION['user']; ?></h2>

	<p>You have successfully logged in.</p>

	<a href="logout.php">Logout</a>

	</body>
</html>