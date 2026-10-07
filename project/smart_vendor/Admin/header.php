<?php
if(isset($_SESSION['admin_email']))
{
	
}
else
{
	echo "<script>alert('Login First');window.location='admin-login';</script>";
}	

?>


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
    <title>Dashboard - Smart Vendor Recommendation System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="style.css" rel="stylesheet">
	
	<!-- Bootstrap JS Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Chart.js -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<!-- Custom JS -->
	<script src="script.js"></script>
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h4><i class="fas fa-handshake" ></i> SmartEvent </h4>
        </div>

        <ul class="list-unstyled components">
            <li class="<?php active('index'); ?>">
                <a href="dashboard"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
            </li>
            <li>
                <a href="#vendorSubmenu" data-bs-toggle="collapse"  class="dropdown">
                    <i class="fas fa-store me-2"></i> Vendor 
                </a>
                <ul class="collapse list-unstyled" id="vendorSubmenu">
                    <li class="<?php active('view_vendors'); ?>"><a href="view_vendors"><i class="fas fa-eye me-2"></i> View Vendors</a></li>
                    <li class="<?php active('add_vendors'); ?>"><a href="add_vendors"><i class="fas fa-plus me-2"></i> Add Vendor</a></li>
                </ul>
            </li>
            <li>
                <a href="#categorySubmenu" data-bs-toggle="collapse"  class="dropdown">
                    <i class="fas fa-tags me-2"></i> Category 
                </a>
                <ul class="collapse list-unstyled" id="categorySubmenu">
                    <li class="<?php active('view_categories'); ?>"><a href="view_categories"><i class="fas fa-eye me-2"></i> View Categories</a></li>
					<li class="<?php active('add_categories'); ?>"><a href="add_categories" ><i class="fas fa-plus me-2"></i> Add Categories</a></li>
                </ul>
            </li>
            <li class="<?php active('customers'); ?>">
                <a href="#customerSubmenu" data-bs-toggle="collapse" class="dropdown">
                    <i class="fas fa-users me-2"></i> Customer 
                </a>
                <ul class="collapse list-unstyled" id="customerSubmenu">
                    <li><a href="customers"><i class="fas fa-eye me-2"></i> View Customers</a></li>
                </ul>
            </li>
            <li class="<?php active('bookings'); ?>">
                <a href="#bookingSubmenu" data-bs-toggle="collapse" class="dropdown">
                    <i class="fas fa-calendar-check me-2"></i> Booking 
                </a>
                <ul class="collapse list-unstyled" id="bookingSubmenu">
                    <li><a href="bookings"><i class="fas fa-eye me-2"></i> View Bookings</a></li>
                </ul>
            </li>
            <li class="<?php active('feedback'); ?>">
                <a href="#feedbackSubmenu" data-bs-toggle="collapse"  class="dropdown">
                    <i class="fas fa-comments me-2"></i> Feedback
                </a>
                <ul class="collapse list-unstyled" id="feedbackSubmenu">
                    <li><a href="feedback"><i class="fas fa-eye me-2"></i> View Feedback</a></li>
                </ul>
            </li>
            <li class="<?php active('contact'); ?>">
                <a href="#contactSubmenu" data-bs-toggle="collapse"  class="dropdown">
                    <i class="fas fa-comments me-2"></i> Contact
                </a>
                <ul class="collapse list-unstyled" id="contactSubmenu">
                    <li><a href="manage_contact"><i class="fas fa-eye me-2"></i>Manage Contact</a></li>
                </ul>
            </li>
			
            <li class="mt-4">
                <a href="admin-login" class="text-danger"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content -->
    <div id="content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                
                <h5 class="ms-3 mb-0 d-none d-md-block">Admin Dashboard</h5>

                <div class="ms-auto d-flex align-items-center">
                    
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name=Admin+User&background=0D8ABC&color=fff" alt="Profile" class="rounded-circle" width="32" height="32">
                              <span class="user-name"><?php echo $_SESSION['admin_name']?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="admin_profile"><i class="fas fa-user-circle me-2"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="admin-login"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
