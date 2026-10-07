<?php
if(isset($_SESSION['user_email']))
{
	echo "<script>window.location='index';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Smart Events</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
	<script src="validation.js"></script>
</head>
<body class="auth-page">

    <div class="glass-card">
        <h2>Create Account</h2>
        <form method="post" name="register" onsubmit="return reg_form(this)">
			<!-- Display error-->
			<h3 id="msg1" style="color:red; font-weight:bold;"></h3>
			
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Vidhi Rana" >
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="user@example.com" >
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Create a password" >
            </div>
			
			
			<div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile" maxlength="10">
            </div>
			
			<div class="form-group">
                <label for="gender">Gender</label>
                Male<input name="gender" type="radio" value="Male">
				Female<input name="gender" type="radio" value="Female">
            </div>
			
            
            <button type="submit" name="submit" class="btn btn-primary" >Sign Up Now</button>
        </form>
        
        <p class="text-center mt-4">
            <span style="color: var(--text-secondary);">Already have an account?</span> 
            <a href="login" style="color: var(--primary-color); font-weight: 600;">Log in</a>
        </p>
    </div>

</body>
</html>
