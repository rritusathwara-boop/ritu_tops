@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card border-0 shadow-sm rounded-0 p-4 p-md-5">
                <div class="text-center mb-4">
                    <h2 class="font-playfair mb-1">Welcome Back</h2>
                    <p class="text-muted small">Sign in to your Mom &amp; Me customer account.</p>
                </div>

                @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger rounded-0 small py-2 mb-3">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label small fw-bold">Email Address</label>
                        <input type="email" class="form-control rounded-0" id="email" name="email" value="{{ old('email') }}" placeholder="e.g. customer@momandme.com" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label small fw-bold">Password</label>
                        <input type="password" class="form-control rounded-0" id="password" name="password" placeholder="Enter your password" required>
                    </div>

                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input class="form-check-input rounded-0" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label small text-muted" for="remember">Remember me</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark w-100 rounded-0 py-3 text-uppercase fw-bold shadow-sm" style="background-color: var(--primary-color); letter-spacing: 1px;">
                        Sign In
                    </button>
                </form>

                <div class="mt-4 pt-3 border-top text-center">
                    <p class="small text-muted mb-0">Don't have an account yet? <a href="{{ route('register') }}" class="text-dark fw-bold text-decoration-none">Create an account</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
