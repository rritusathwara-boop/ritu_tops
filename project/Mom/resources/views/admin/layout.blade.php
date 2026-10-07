<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Mom & Me</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        :root {
            --admin-primary: #1e1e2d;
            --admin-secondary: #f3f6f9;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--admin-secondary);
        }
        .sidebar {
            background-color: var(--admin-primary);
            min-height: 100vh;
            color: #fff;
        }
        .sidebar a {
            color: #a2a3b7;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
            border-left: 3px solid transparent;
            transition: all 0.3s;
        }
        .sidebar a:hover, .sidebar a.active {
            color: #fff;
            background-color: rgba(255,255,255,0.05);
            border-left-color: #3699ff;
        }
        .sidebar .brand {
            padding: 20px;
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
        }
        .main-content {
            padding: 30px;
        }
        .card {
            border: 0;
            box-shadow: 0 0 20px 0 rgba(76,87,125,.02);
            border-radius: .475rem;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar flex-shrink-0" style="width: 250px;">
            <div class="brand text-center">Mom & Me<br><small class="fs-6 text-muted font-sans">Admin Panel</small></div>
            <nav class="nav flex-column">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="fas fa-home me-2"></i> Dashboard</a>
                <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}"><i class="fas fa-box me-2"></i> Products</a>
                <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}"><i class="fas fa-tags me-2"></i> Categories</a>
                <a href="{{ route('admin.orders.index') }}" class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}"><i class="fas fa-shopping-cart me-2"></i> Orders</a>
                <a href="#"><i class="fas fa-users me-2"></i> Customers</a>
                <a href="{{ route('home') }}" class="mt-5"><i class="fas fa-external-link-alt me-2"></i> View Website</a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">@csrf</form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
            </nav>
        </div>

        <!-- Content -->
        <div class="flex-grow-1">
            <!-- Topbar -->
            <header class="bg-white py-3 px-4 shadow-sm d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-dark fw-bold">@yield('header')</h5>
                <div class="d-flex align-items-center">
                    <span class="me-3 text-muted">{{ auth('admin')->user()?->name ?? 'Admin' }}</span>
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width:40px;height:40px;">
                        {{ substr(auth('admin')->user()?->name ?? 'A', 0, 1) }}
                    </div>
                </div>
            </header>

            <div class="main-content">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
