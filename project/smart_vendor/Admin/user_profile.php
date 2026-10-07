<?php
include_once('header.php');
?>

<div class="container mt-5 mb-5">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card border-0 shadow-lg">

                <div class="card-header bg-primary text-white py-3">
                    <h3 class="mb-0">
                        <i class="fas fa-user-circle"></i>
                        Customer Profile
                    </h3>
                </div>

                <div class="card-body p-4">

                    <div class="row">

                        <!-- Profile Card -->
                        <div class="col-md-4 text-center border-end">

                            <i class="fa-solid fa-circle-user text-primary"
                               style="font-size:150px;"></i>

                            <h3 class="mt-3 fw-bold">
                                <?php echo $fetch->name; ?>
                            </h3>

                            <p class="text-muted">
                                Customer ID :
                                <?php echo $fetch->id; ?>
                            </p>

                            <span class="badge bg-success fs-6">
                                Active Customer
                            </span>

                        </div>

                        <!-- Profile Details -->
                        <div class="col-md-8">

                            <h4 class="text-primary mb-4">
                                Customer Information
                            </h4>

                            <table class="table table-bordered table-striped">

                                <tr>
                                    <th width="35%">Customer ID</th>
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

                            <div class="mt-4">

                                <a href="customers"
                                   class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i>
                                    Back
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Extra Information Card -->
            <div class="card border-0 shadow mt-4">

                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-info-circle"></i>
                        Account Information
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row text-center">

                        <div class="col-md-4">
                            <h4 class="text-primary">
                                <?php echo $fetch->id; ?>
                            </h4>
                            <p>Total Customer ID</p>
                        </div>

                        <div class="col-md-4">
                            <h4 class="text-success">
                                Active
                            </h4>
                            <p>Account Status</p>
                        </div>

                        <div class="col-md-4">
                            <h4 class="text-warning">
                                Customer
                            </h4>
                            <p>User Type</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
