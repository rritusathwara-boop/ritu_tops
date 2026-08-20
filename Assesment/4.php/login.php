<?php
	session_start();

	if(isset($_POST['login']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		// Simple authentication
		if($username == "admin" && $password == "1234")
		{
			session_regenerate_id(true); // Security best practice
			$_SESSION['user'] = $username;

			header("Location: dashboard.php");
			exit();
		}
		else
		{
			echo "Invalid Username or Password";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
	</head>
	<body>

	<h2>Login Form</h2>

	<form method="post">
		Username:
		<input type="text" name="username" required><br><br>

		Password:
		<input type="password" name="password" required><br><br>

		<input type="submit" name="login" value="Login">
	</form>

	</body>
</html>