<?php
include_once('header.php');
?>

    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-primary d-lg-none d-block">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="ms-auto">
                    <button class="btn btn-outline-primary"><i class="fas fa-download"></i> Export Report</button>
                </div>
            </div>
        </nav>

        <div class="container-fluid p-4">
            <h3 class="mb-4 fw-bold">Reports & Analytics</h3>

            <div class="row mb-4">
                <div class="col-md-8">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-bottom py-3">
                            <h6 class="mb-0 fw-bold">Revenue Analytics</h6>
                        </div>
                        <div class="card-body">
                            <!-- Container for Chart.js -->
                            <div style="height: 300px;">
                                <canvas id="revenueChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-bottom py-3">
                            <h6 class="mb-0 fw-bold">Category Distribution</h6>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <!-- Circular UI mockup instead of loading another chart strictly -->
                            <div class="text-center">
                                <i class="fas fa-chart-pie fa-5x text-primary opacity-50 mb-3"></i>
                                <div class="small">
                                    <div class="text-primary"><i class="fas fa-circle px-2"></i>Catering (45%)</div>
                                    <div class="text-success"><i class="fas fa-circle px-2"></i>Photography (30%)</div>
                                    <div class="text-warning"><i class="fas fa-circle px-2"></i>Decoration (25%)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="mb-0 fw-bold">Top Performing Vendors</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Rank</th>
                                    <th>Vendor Name</th>
                                    <th>Category</th>
                                    <th>Total Bookings</th>
                                    <th>Revenue Generated</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="badge rounded-pill bg-warning text-dark"><i class="fas fa-trophy"></i> 1</span></td>
                                    <td class="fw-bold">Elite Catering</td>
                                    <td>Catering</td>
                                    <td>142</td>
                                    <td>$82,500</td>
                                </tr>
                                <tr>
                                    <td><span class="badge rounded-pill bg-secondary"><i class="fas fa-medal"></i> 2</span></td>
                                    <td class="fw-bold">Grand Decorators</td>
                                    <td>Decoration</td>
                                    <td>98</td>
                                    <td>$41,200</td>
                                </tr>
                                <tr>
                                    <td><span class="badge rounded-pill bg-danger"><i class="fas fa-medal"></i> 3</span></td>
                                    <td class="fw-bold">Lumina Photography</td>
                                    <td>Photography</td>
                                    <td>85</td>
                                    <td>$38,900</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


</body>
</html>
