<?php
include_once('header.php');
?>

<div class="container-fluid p-4">

    <div class="row">

        <!-- Profile Card -->
        <div class="col-lg-4">

            <div class="card shadow border-0">
                <div class="card-body text-center">

                    <i class="fa-solid fa-user-shield text-primary mb-3" style="font-size:120px;"></i>

                    <h3><?php echo $fetch->name; ?></h3>

                    <p class="text-muted">
                        Admin ID : <?php echo $fetch->id; ?>
                    </p>

                    <span class="badge bg-success fs-6">
                        Administrator
                    </span>

                    <hr>

                    <a href="edit_admin_profile" class="btn btn-primary w-100 mb-2">
                        <i class="fa fa-edit"></i> Edit Profile
                    </a>

                    <a href="change_admin_password" class="btn btn-warning w-100">
                        <i class="fa fa-key"></i> Change Password
                    </a>

                </div>
            </div>

        </div>

        <!-- Profile Details -->
        <div class="col-lg-8">

            <div class="card shadow border-0">

                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fa fa-user-shield"></i>
                        Admin Profile
                    </h4>
                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>
                            <th width="30%">Admin ID</th>
                            <td><?php echo $fetch->id; ?></td>
                        </tr>

                        <tr>
                            <th>Name</th>
                            <td><?php echo $fetch->name; ?></td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td><?php echo $fetch->email; ?></td>
                        </tr>

                        <tr>
                            <th>Role</th>
                            <td>
                                <span class="badge bg-primary">
                                    Super Admin
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="badge bg-success">
                                    Active
                                </span>
                            </td>
                        </tr>

                    </table>

                </div>

            </div>

            <!-- Dashboard Summary -->
            <div class="row mt-4">

                <div class="col-md-4">
                    <div class="card shadow border-0 text-center">
                        <div class="card-body">
                            <i class="fas fa-users text-primary fa-3x"></i>
                            <h3 class="mt-2">120</h3>
                            <p>Total Customers</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow border-0 text-center">
                        <div class="card-body">
                            <i class="fas fa-store text-success fa-3x"></i>
                            <h3 class="mt-2">35</h3>
                            <p>Total Vendors</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow border-0 text-center">
                        <div class="card-body">
                            <i class="fas fa-calendar-check text-warning fa-3x"></i>
                            <h3 class="mt-2">85</h3>
                            <p>Total Bookings</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>
