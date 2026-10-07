<?php
include_once('header.php');
?>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-lg">

                <div class="card-header bg-warning text-dark text-center py-4">
                    <h2 class="mb-0">
                        <i class="fas fa-edit me-2"></i>
                        Edit Vendor
                    </h2>
                    <p class="mb-0 mt-2">
                        Update vendor information
                    </p>
                </div>

                <div class="card-body p-5">

                    <form method="post" enctype="multipart/form-data">

                        <!-- Vendor Name -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="fas fa-user-tie text-primary me-2"></i>
                                Vendor Name
                            </label>

                            <input type="text"
                                   name="name"
                                   value="<?php echo $fetch->name;?>"
                                   class="form-control form-control-lg">
                        </div>

                        <!-- Category -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="fas fa-list text-success me-2"></i>
                                Category
                            </label>

                            <select class="form-select form-select-lg" name="category_id">

                                <option value="1" <?php if($fetch->category_id==1) echo "selected"; ?>>
                                    Catering
                                </option>

                                <option value="2" <?php if($fetch->category_id==2) echo "selected"; ?>>
                                    Birthday
                                </option>

                                <option value="3" <?php if($fetch->category_id==3) echo "selected"; ?>>
                                    Photography
                                </option>

                                <option value="4" <?php if($fetch->category_id==4) echo "selected"; ?>>
                                    Engagement
                                </option>

                                <option value="5" <?php if($fetch->category_id==5) echo "selected"; ?>>
                                    Wedding
                                </option>

                                <option value="6" <?php if($fetch->category_id==6) echo "selected"; ?>>
                                    Reception
                                </option>

                            </select>
                        </div>

                        <!-- Price -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="fas fa-indian-rupee-sign text-warning me-2"></i>
                                Price
                            </label>

                            <input type="number"
                                   name="price"
                                   value="<?php echo $fetch->price;?>"
                                   class="form-control form-control-lg">
                        </div>

                        <!-- Rating -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="fas fa-star text-warning me-2"></i>
                                Rating
                            </label>

                            <input type="text"
                                   name="rating"
                                   value="<?php echo $fetch->rating;?>"
                                   class="form-control form-control-lg">
                        </div>

                        <!-- Location -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="fas fa-location-dot text-danger me-2"></i>
                                Location
                            </label>

                            <input type="text"
                                   name="location"
                                   value="<?php echo $fetch->location;?>"
                                   class="form-control form-control-lg">
                        </div>

                        <!-- Current Image -->
                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                <i class="fas fa-image text-info me-2"></i>
                                Current Vendor Image
                            </label>

                            <div class="text-center mb-3">

                                <img src="../assets/upload/vendor/<?php echo $fetch->image;?>"
                                     class="img-thumbnail shadow"
                                     style="width:220px;height:160px;object-fit:cover;">

                            </div>

                            <label class="form-label">
                                Change Image
                            </label>

                            <input type="file"
                                   name="image"
                                   class="form-control">

                        </div>

                        <!-- Buttons -->
                        <div class="text-center">

                            <button type="submit"
                                    name="submit"
                                    class="btn btn-success btn-lg px-5">
                                <i class="fas fa-save me-2"></i>
                                Update Vendor
                            </button>

                            <a href="view_vendors"
                               class="btn btn-secondary btn-lg px-5 ms-2">
                                <i class="fas fa-arrow-left me-2"></i>
                                Back
                            </a>

                        </div>

                    </form>

                </div>

            </div>

            <!-- Information Card -->
            <div class="card mt-4 border-0 shadow">

                <div class="card-body text-center">

                    <h5 class="text-primary">
                        <i class="fas fa-store"></i>
                        Vendor Information
                    </h5>

                    <p class="text-muted">
                        Update vendor details including category, pricing,
                        rating, location and vendor image.
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>
</html>