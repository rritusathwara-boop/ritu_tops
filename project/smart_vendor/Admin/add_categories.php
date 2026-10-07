<?php
include_once('header.php');
?>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-lg">

                <div class="card-header bg-primary text-white text-center py-4">
                    <h2 class="mb-0">
                        <i class="fas fa-layer-group me-2"></i>
                        Add New Category
                    </h2>
                    <p class="mb-0 mt-2">
                        Create and manage vendor categories
                    </p>
                </div>

                <div class="card-body p-5">

                    <form method="post" enctype="multipart/form-data">

                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="fas fa-tag text-primary me-2"></i>
                                Category Name
                            </label>
                            <input type="text"
                                   name="name"
                                   class="form-control form-control-lg"
                                   placeholder="Enter Category Name">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="fas fa-image text-success me-2"></i>
                                Category Image
                            </label>
                            <input type="file"
                                   name="image"
                                   class="form-control">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="fas fa-align-left text-warning me-2"></i>
                                Description
                            </label>
                            <textarea name="description"
                                      class="form-control"
                                      rows="5"
                                      placeholder="Enter category description"></textarea>
                        </div>

                        <div class="text-center">

                            <button type="submit"
                                    name="submit"
                                    class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-save me-2"></i>
                                Save Category
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
                        <i class="fas fa-lightbulb"></i>
                        Category Examples
                    </h5>

                    <div class="mt-3">

                        <span class="badge bg-primary p-2 m-1">Wedding</span>
                        <span class="badge bg-success p-2 m-1">Birthday</span>
                        <span class="badge bg-warning p-2 m-1">Photography</span>
                        <span class="badge bg-danger p-2 m-1">Catering</span>
                        <span class="badge bg-info p-2 m-1">Decoration</span>
                        <span class="badge bg-dark p-2 m-1">Reception</span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
