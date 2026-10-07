<?php
include_once('header.php');
?>

        <!-- Main Content Area -->
        <div class="container-fluid p-4">
            
            <div class="row mb-4">
                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="card card-stats h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-box bg-light-primary me-3">
                                <i class="fas fa-store"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Total Vendors</h6>
                                <h3 class="mb-0 fw-bold">145</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="card card-stats h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-box bg-light-success me-3">
                                <i class="fas fa-users"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Total Customers</h6>
                                <h3 class="mb-0 fw-bold">1,250</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="card card-stats h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-box bg-light-warning me-3">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Total Bookings</h6>
                                <h3 class="mb-0 fw-bold">894</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-stats h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-box bg-light-info me-3">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Total Revenue</h6>
                                <h3 class="mb-0 fw-bold">$45,200</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Section -->
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 fw-bold"><i class="fas fa-list text-primary me-2"></i> Recent Bookings</h6>
                            <a href="bookings" class="btn btn-sm btn-outline-primary">View All</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Customer</th>
                                            <th>Vendor</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#BK-1001</td>
                                            <td>John Doe</td>
                                            <td>Elite Catering</td>
                                            <td>Oct 24, 2023</td>
                                            <td><span class="badge bg-success">Confirmed</span></td>
                                        </tr>
                                        <tr>
                                            <td>#BK-1002</td>
                                            <td>Jane Smith</td>
                                            <td>Lumina Photography</td>
                                            <td>Oct 25, 2023</td>
                                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <td>#BK-1003</td>
                                            <td>Mike Johnson</td>
                                            <td>Grand Decorators</td>
                                            <td>Oct 26, 2023</td>
                                            <td><span class="badge bg-success">Confirmed</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-bottom py-3">
                            <h6 class="mb-0 fw-bold"><i class="fas fa-star text-warning me-2"></i> Recent Feedback</h6>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-start mb-3 border-bottom pb-2">
                                <img src="https://ui-avatars.com/api/?name=A+B&background=random" class="rounded-circle me-3" width="40" alt="Avatar">
                                <div>
                                    <h6 class="mb-1">Amazing Service!</h6>
                                    <p class="text-muted small mb-1">"Elite Catering was fantastic for our wedding!"</p>
                                    <div class="text-warning small text-nowrap">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-start">
                                <img src="https://ui-avatars.com/api/?name=C+D&background=random" class="rounded-circle me-3" width="40" alt="Avatar">
                                <div>
                                    <h6 class="mb-1">Good photos</h6>
                                    <p class="text-muted small mb-1">"Photographer arrived slightly late but photos were good."</p>
                                    <div class="text-warning small text-nowrap">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
