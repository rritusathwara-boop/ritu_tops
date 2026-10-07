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
                        Edit Category
                    </h2>
                    <p class="mb-0 mt-2">
                        Update category information
                    </p>
                </div>

                <div class="card-body p-5">

                    <form method="post" enctype="multipart/form-data">

                        <!-- Category Name -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="fas fa-tag text-primary me-2"></i>
                                Category Name
                            </label>

                            <input type="text"
                                   name="name"
                                   value="<?php echo $fetch->name;?>"
                                   class="form-control form-control-lg">
                        </div>

                        <!-- Current Image -->
                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                <i class="fas fa-image text-success me-2"></i>
                                Current Image
                            </label>

                            <div class="text-center mb-3">

                                <img src="../assets/upload/category/<?php echo $fetch->image;?>"
                                     class="img-thumbnail shadow"
                                     style="width:200px;height:150px;object-fit:cover;">

                            </div>

                            <label class="form-label fw-bold">
                                Change Image
                            </label>

                            <input type="file"
                                   name="image"
                                   class="form-control">
                        </div>

                        <!-- Description -->
                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                <i class="fas fa-align-left text-danger me-2"></i>
                                Description
                            </label>

                            <textarea class="form-control"
                                      name="description"
                                      rows="5"><?php echo $fetch->description;?></textarea>

                        </div>

                        <!-- Buttons -->
                        <div class="text-center">

                            <button type="submit"
                                    name="submit"
                                    class="btn btn-success btn-lg px-5">
                                <i class="fas fa-save me-2"></i>
                                Update Category
                            </button>

                            <a href="view_categories"
                               class="btn btn-secondary btn-lg px-5 ms-2">
                                <i class="fas fa-arrow-left me-2"></i>
                                Back
                            </a>

                        </div>

                    </form>

                </div>

            </div>

            <!-- Info Card -->
            <div class="card mt-4 border-0 shadow">

                <div class="card-body text-center">

                    <h5 class="text-primary">
                        <i class="fas fa-info-circle"></i>
                        Category Information
                    </h5>

                    <p class="text-muted">
                        Update category details, image, and description. Changes will be reflected across all vendor listings.
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>
</html>