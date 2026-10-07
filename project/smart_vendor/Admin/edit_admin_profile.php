<?php
include_once('header.php');
?>

<div class="container-fluid py-4">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow">

                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">
                        <i class="fas fa-user-edit"></i>
                        Edit Admin Profile
                    </h3>
                </div>

                <div class="card-body">

                    <form method="post">

                        <div class="text-center mb-4">

                            <i class="fas fa-user-shield text-primary"
                               style="font-size:100px;"></i>

                            <h4 class="mt-3">
                                <?php echo $fetch->name; ?>
                            </h4>

                            <span class="badge bg-success">
                                Administrator
                            </span>

                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Admin ID
                            </label>

                            <input type="text"
                                   class="form-control"
                                   value="<?php echo $fetch->id; ?>"
                                   readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Full Name
                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="<?php echo $fetch->name; ?>"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Email Address
                            </label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="<?php echo $fetch->email; ?>"
                                   required>
                        </div>

                        <div class="row mt-4">

                            <div class="col-md-6 d-grid">
                                <button type="submit"
                                        name="submit"
                                        class="btn btn-primary">

                                    <i class="fas fa-save"></i>
                                    Update Profile

                                </button>
                            </div>

                            <div class="col-md-6 d-grid">
                                <a href="admin_profile"
                                   class="btn btn-secondary">

                                    <i class="fas fa-arrow-left"></i>
                                    Back

                                </a>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>
