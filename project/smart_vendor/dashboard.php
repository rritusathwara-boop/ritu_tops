<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard | Smart Events</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="dashboard-layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <a href="index.php" class="logo" style="font-size: 1.5rem;">SmartEvents.</a>
            
            <div class="nav-links">
                <a href="dashboard.php" class="active"><i class="fas fa-home"></i> Dashboard Overview</a>
                <a href="#"><i class="fas fa-calendar-check"></i> My Bookings</a>
                <a href="#"><i class="fas fa-heart"></i> Saved Vendors</a>
                <a href="#"><i class="fas fa-cog"></i> Settings</a>
                <a href="index.php" style="color: var(--danger-color); margin-top: auto;"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
            <!-- Mobile Menu Toggle just for layout integrity -->
            <div class="mobile-menu-btn" style="display:none;" id="mobile-menu-btn"><i class="fas fa-bars"></i></div>
        </aside>

        <!-- Main Workspace -->
        <main class="main-content">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                <div>
                    <h1 style="font-size: 2rem; font-weight: 800;">Welcome back, User! 👋</h1>
                    <p style="color: var(--text-secondary);">Here is what's happening with your upcoming events.</p>
                </div>
                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=1064&auto=format&fit=crop" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;" alt="User">
            </div>

            <!-- Stats Grid -->
            <div class="grid" style="grid-template-columns: repeat(3, 1fr); margin-bottom: 2rem;">
                <div class="stat-card">
                    <div>
                        <p style="color: var(--text-secondary); font-size: 0.9rem; font-weight: 600; text-transform: uppercase;">Upcoming Events</p>
                        <h2 style="font-size: 2rem; font-weight: 800; margin-top: 5px;">2</h2>
                    </div>
                    <div class="stat-icon"><i class="fas fa-calendar-day"></i></div>
                </div>
                
                <div class="stat-card">
                    <div>
                        <p style="color: var(--text-secondary); font-size: 0.9rem; font-weight: 600; text-transform: uppercase;">Active Bookings</p>
                        <h2 style="font-size: 2rem; font-weight: 800; margin-top: 5px;">4</h2>
                    </div>
                    <div class="stat-icon" style="background: rgba(16, 185, 129, 0.1); color: var(--success-color);"><i class="fas fa-check-circle"></i></div>
                </div>

                <div class="stat-card">
                    <div>
                        <p style="color: var(--text-secondary); font-size: 0.9rem; font-weight: 600; text-transform: uppercase;">Total Spent</p>
                        <h2 style="font-size: 2rem; font-weight: 800; margin-top: 5px;">₹35k</h2>
                    </div>
                    <div class="stat-icon" style="background: rgba(239, 68, 68, 0.1); color: var(--danger-color);"><i class="fas fa-wallet"></i></div>
                </div>
            </div>

            <!-- Recent Activity Table -->
            <h3 style="margin-bottom: 1rem;">Recent Booking Activity</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Vendor Name</th>
                            <th>Service Type</th>
                            <th>Event Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong style="color: var(--text-primary)">Luxe Catering Co.</strong></td>
                            <td>Catering</td>
                            <td>Dec 15, 2026</td>
                            <td><span class="badge badge-success">Confirmed</span></td>
                            <td><button class="btn btn-outline" style="padding: 5px 10px; font-size: 0.8rem;">View</button></td>
                        </tr>
                        <tr>
                            <td><strong style="color: var(--text-primary)">Elite Florals & Decor</strong></td>
                            <td>Decoration</td>
                            <td>Dec 15, 2026</td>
                            <td><span class="badge badge-warning">Pending</span></td>
                            <td><button class="btn btn-outline" style="padding: 5px 10px; font-size: 0.8rem;">View</button></td>
                        </tr>
                        <tr>
                            <td><strong style="color: var(--text-primary)">Cinematic Event Photography</strong></td>
                            <td>Photography</td>
                            <td>Nov 02, 2026</td>
                            <td><span class="badge badge-success">Completed</span></td>
                            <td><button class="btn btn-outline" style="padding: 5px 10px; font-size: 0.8rem;">Invoice</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </main>
    </div>

</body>
</html>
