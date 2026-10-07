<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Mom &amp; Me</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body { background:#1e1e2d; min-height:100vh; display:flex; align-items:center; justify-content:center; font-family:Inter,sans-serif; }
        .login-card { background:#fff; border-radius:16px; padding:2.5rem; width:100%; max-width:420px; box-shadow:0 20px 60px rgba(0,0,0,.4); }
        .brand-icon { width:60px; height:60px; background:#1e1e2d; border-radius:12px; display:flex; align-items:center; justify-content:center; margin:0 auto 1rem; }
        .btn-admin { background:#1e1e2d; color:#fff; border:none; padding:.75rem; font-weight:600; border-radius:8px; }
        .btn-admin:hover { background:#2d2d44; color:#fff; }
        .form-control:focus { border-color:#1e1e2d; box-shadow:0 0 0 .2rem rgba(30,30,45,.15); }
    </style>
</head>
<body>
<div class="login-card">
    <div class="brand-icon"><i class="fas fa-crown text-warning fs-4"></i></div>
    <h4 class="text-center fw-bold mb-1">Admin Login</h4>
    <p class="text-center text-muted small mb-4">Mom &amp; Me &mdash; Admin Panel</p>

    @if(session('error'))
        <div class="alert alert-danger py-2">{{ session('error') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger py-2">
            @foreach($errors->all() as $error) {{ $error }}<br>@endforeach
        </div>
    @endif

    <form action="{{ route('admin.login.post') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus placeholder="admin@momandme.com">
        </div>
        <div class="mb-4">
            <label class="form-label fw-semibold">Password</label>
            <input type="password" name="password" class="form-control" required placeholder="†††††††">
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-admin"><i class="fas fa-sign-in-alt me-2"></i>Login</button>
        </div>
    </form>
</div>
</body>
</html>