<?php
function active($current_page)
{
	$url_array = explode('/',$_SERVER['REQUEST_URI']);
	$url = end($url_array);
	if($current_page == $url)
	{
		echo 'active';
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Events | Vendor Recommendation System</title>

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

	<!--bootstrap-->
	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
	
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="container">
        <a href="index" class="logo"><i class="fas fa-handshake" ></i> SmartEvents.</a>

        <div class="mobile-menu-btn" id="mobile-menu-btn">
            <i class="fas fa-bars"></i>
        </div>

        <ul class="nav-links" id="nav-links">
            <!-- ✅ FIXED LINKS -->
            <li><a href="index" class="<?php active('index'); ?>">Home</a></li>
            <li><a href="vendors" class="<?php active('vendors'); ?>">Vendors</a></li>
            <li><a href="contact" class="<?php active('contact'); ?>">Contact Us</a></li>
			
							<?php
							if(isset($_SESSION['user_email']))
							{	
							?>
							<li class="submenu">
							<a href="#" class="btn btn-outline">Hi.. <?php echo $_SESSION['user_name']; ?> <i class="fa fa-angle-down"></i></a>

							<ul class="submenu-list">
								<li><a href="user_profile"><i class="fas fa-user"></i>Profile</a></li>
								<li><a href="products">My Orders</a></li>
								<li><a href="user_logout">Logout</a></li>
							</ul>
							</li>
							 <?php
							}
							else
							{	
							?>
							<li><a href="login" class="btn btn-outline <?php active('login'); ?>" style="padding: 8px 16px;">Login</a></li>
							<li><a href="register" class="btn btn-outline <?php active('register'); ?>" style="padding: 8px 16px;">Sign Up</a></li>
							<?php
							}
							?>
							
            
        </ul>
    </div>
</nav>
