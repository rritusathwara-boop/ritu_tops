<?php
include_once('header.php');
?>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-lg">

                <div class="card-header bg-primary text-white text-center py-4">
                    <h2 class="mb-0">
                        <i class="fas fa-store me-2"></i>
                        Add New Vendor
                    </h2>
                    <p class="mb-0 mt-2">
                        Register a new vendor for Smart Vendor Recommendation System
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
                                   class="form-control form-control-lg"
                                   placeholder="Enter Vendor Name">
                        </div>

                        <!-- Category -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="fas fa-list text-success me-2"></i>
                                Category
                            </label>

                            <select class="form-select form-select-lg" name="category_id">
                                <option selected disabled>Select Category</option>
                                <option value="1">🍽 Catering</option>
                                <option value="2">🎂 Birthday</option>
                                <option value="3">📸 Photography</option>
                                <option value="4">💍 Engagement</option>
                                <option value="5">👰 Wedding</option>
                                <option value="6">🎉 Reception</option>
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
                                   class="form-control form-control-lg"
                                   placeholder="Enter Price">
                        </div>

                        <!-- Rating -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="fas fa-star text-warning me-2"></i>
                                Rating
                            </label>
                            <input type="text"
                                   name="rating"
                                   class="form-control form-control-lg"
                                   placeholder="Enter Rating (e.g. 4.5)">
                        </div>

                        <!-- Location -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="fas fa-location-dot text-danger me-2"></i>
                                Location
                            </label>
                            <input type="text"
                                   name="location"
                                   class="form-control form-control-lg"
                                   placeholder="Enter Vendor Location">
                        </div>

                        <!-- Image -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="fas fa-image text-info me-2"></i>
                                Vendor Image
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
                                Save Vendor
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
                        <i class="fas fa-lightbulb"></i>
                        Vendor Categories
                    </h5>

                    <div class="mt-3">

                        <span class="badge bg-danger p-2 m-1">Catering</span>
                        <span class="badge bg-primary p-2 m-1">Birthday</span>
                        <span class="badge bg-success p-2 m-1">Photography</span>
                        <span class="badge bg-warning text-dark p-2 m-1">Engagement</span>
                        <span class="badge bg-dark p-2 m-1">Wedding</span>
                        <span class="badge bg-info text-dark p-2 m-1">Reception</span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
</html>