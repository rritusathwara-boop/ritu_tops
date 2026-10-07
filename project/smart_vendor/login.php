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
    <title>Login | Smart Events</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!-- Cool animated blob backdrop generated via css gradient -->
</head>
<body class="auth-page">

    <div class="glass-card">
        <h2>Welcome Back</h2>
        <form  method="post" name="login">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="user@example.com" required>
            </div>
            
            <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
        </form>
        
        <p class="text-center mt-4">
            <span style="color: var(--text-secondary);">Don't have an account?</span> 
            <a href="register" style="color: var(--primary-color); font-weight: 600;">Sign up</a>
        </p>
        <p class="text-center mt-2">
            <a href="index" style="color: var(--text-secondary); font-size: 0.9rem;">&larr; Back to Home</a>
        </p>
    </div>

</body>
</html>
