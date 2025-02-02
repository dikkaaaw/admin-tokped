@extends('public.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center min-vh-100 align-items-center">
            <div class="col-md-6">
                <div class="shadow card">
                    <div class="p-5 card-body">
                        <div class="mb-4 text-center main-logo">
                            <img src="{{ asset('dist/assets/img/logo/logo.jpg') }}" style="width: 100px" alt="logo"
                                class="img-fluid" />
                        </div>
                        <div class="text-center">
                            <h2 class="mb-3 fw-bold">Welcome Back!</h2>
                            <p class="text-muted small">Please sign in to your account</p>
                        </div>

                        <form class="mt-4" method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Email Input -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input id="email" name="email" type="email" class="form-control" required
                                        placeholder="Enter your email">
                                </div>
                            </div>

                            <!-- Password Input -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input id="password" name="password" type="password" class="form-control" required
                                        placeholder="Enter your password">
                                    <span class="input-group-text">
                                        <i class="fa fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                                    </span>
                                </div>
                            </div>

                            <!-- Login Button -->
                            <div class="gap-2 d-grid">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>Sign in
                                </button>
                            </div>

                            <!-- Register Link -->
                            <div class="mt-3 text-center">
                                <p class="text-muted">
                                    Don't have an account?
                                    <a href="{{ route('register') }}" class="text-decoration-none">Register here</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function(e) {
            const password = document.getElementById('password');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
@endsection
