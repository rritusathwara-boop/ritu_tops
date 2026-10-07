<?php
if(isset($_SESSION['user_email']))
{
	
}
else
{
	echo "<script>window.location='index';</script>";
}	

include_once('header.php');
?>

<div class="container py-5">

    <div class="row">

        <!-- Left Profile Card -->
        <div class="col-lg-4">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                     <i class="fa-solid fa-circle-user text-primary" style="font-size:120px;"></i>

                    <h3><?php echo $fetch->name; ?></h3>

                    <p class="text-muted">
                        Customer ID : <?php echo $fetch->id; ?>
                    </p>

                    <span class="badge bg-success">
                        Active Member
                    </span>

                    <hr>

                    <a href="edit_profile?edit=<?php echo $fetch->id;?>"  class="btn btn-primary w-100 mb-2">
                        <i class="fa fa-edit"></i>
                        Edit Profile
                    </a>

                    <a href="change_password" class="btn btn-warning w-100">
                        <i class="fa fa-key"></i>
                        Change Password
                    </a>

                </div>

            </div>

        </div>

        <!-- Right Information -->
        <div class="col-lg-8">

            <div class="card shadow border-0">

                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fa fa-user"></i>
                        My Profile
                    </h4>
                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>
                            <th width="30%">Customer ID</th>
                            <td><?php echo $fetch->id; ?></td>
                        </tr>

                        <tr>
                            <th>Full Name</th>
                            <td><?php echo $fetch->name; ?></td>
                        </tr>

                        <tr>
                            <th>Email Address</th>
                            <td><?php echo $fetch->email; ?></td>
                        </tr>

                        <tr>
                            <th>Mobile Number</th>
                            <td><?php echo $fetch->mobile; ?></td>
                        </tr>

                        <tr>
                            <th>Gender</th>
                            <td><?php echo $fetch->gender; ?></td>
                        </tr>

                    </table>

                </div>

            </div>

            <!-- Booking History -->
            <div class="card shadow border-0 mt-4">

                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">
                        <i class="fa fa-calendar"></i>
                        My Bookings
                    </h4>
                </div>

                <div class="card-body">

                    <table class="table table-striped">

                        <thead class="table-dark">

                            <tr>
                                <th>Booking ID</th>
                                <th>Vendor</th>
                                <th>Event Date</th>
                                <th>Status</th>
                            </tr>

                        </thead>

                        <tbody>

                            <tr>
                                <td>BK101</td>
                                <td>Royal Catering</td>
                                <td>15-Jun-2026</td>
                                <td>
                                    <span class="badge bg-success">
                                        Confirmed
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td>BK102</td>
                                <td>Dream Photography</td>
                                <td>20-Jun-2026</td>
                                <td>
                                    <span class="badge bg-warning">
                                        Pending
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td>BK103</td>
                                <td>Wedding Decoration</td>
                                <td>25-Jun-2026</td>
                                <td>
                                    <span class="badge bg-primary">
                                        Completed
                                    </span>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

<?php
include_once('footer.php');
?>