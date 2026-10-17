@extends('layouts/public/app')

@section('title', 'Login Admin | KSPM STMIK Adhi Guna')

@section('content')

<div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden" style="width: 100%; max-width: 440px;">

        <div class="text-center text-white p-4" style="background: #0f3d2e;">

            <img src="{{ asset('images/logo/logo.png') }}" alt="Logo KSPM" class="mb-3"
                style="width: 75px; height: 75px; object-fit: contain;">

            <h4 class="fw-bold mb-1">Admin KSPM</h4>

            <p class="small mb-0">
                Galeri Investasi STMIK Adhi Guna
            </p>
        </div>

        <div class="card-body p-4 p-md-5">

            <div class="mb-4">
                <h5 class="fw-bold text-dark">Selamat Datang</h5>

                <p class="text-secondary small mb-0">
                    Silakan login untuk mengakses dashboard admin.
                </p>
            </div>

            @if (session('status'))
            <div class="alert alert-success small">
                {{ session('status') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger small">
                Email atau password tidak valid. Silakan periksa kembali.
            </div>
            @endif

            <form method="POST" action="{{ route('login.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label fw-medium">
                        Alamat Email
                    </label>

                    <div class="input-group">
                        <span class="input-group-text bg-light">
                            <i class="bi bi-envelope"></i>
                        </span>

                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror" placeholder="admin@kspmadhi.ac.id"
                            required autofocus autocomplete="username">
                    </div>

                    @error('email')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-medium">
                        Password
                    </label>

                    <div class="input-group">
                        <span class="input-group-text bg-light">
                            <i class="bi bi-lock"></i>
                        </span>

                        <input id="password" type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password"
                            required autocomplete="current-password">
                    </div>

                    @error('password')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div class="form-check">
                        <input id="remember" type="checkbox" name="remember" class="form-check-input" value="1">

                        <label for="remember" class="form-check-label small">
                            Ingat saya
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="small text-success text-decoration-none">
                        Lupa password?
                    </a>
                    @endif

                </div>

                <button type="submit" class="btn text-white w-100 py-2 fw-semibold" style="background: #176044;">
                    <i class="bi bi-box-arrow-in-right me-2"></i>
                    Login Admin
                </button>

            </form>

            <div class="text-center mt-4">
                <a href="{{ url('/') }}" class="text-secondary text-decoration-none small">
                    <i class="bi bi-arrow-left me-1"></i>
                    Kembali ke Beranda
                </a>
            </div>

        </div>
    </div>

</div>

@endsection