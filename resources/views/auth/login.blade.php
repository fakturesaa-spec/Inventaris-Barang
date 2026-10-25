<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login to AplikasiArre">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login | {{ config('app.name', 'AplikasiArre') }}</title>
    <link rel="stylesheet" href="{{ asset('adminhmd-1.0.0/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminhmd-1.0.0/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('adminhmd-1.0.0/assets/css/style.css') }}">
</head>
<body class="auth-body">
    <button class="icon-button theme-toggle auth-theme-toggle" type="button" data-theme-toggle aria-label="Switch color theme" title="Switch color theme">
        <i class="bi bi-moon-stars" data-theme-icon aria-hidden="true"></i>
    </button>
    <main class="auth-page">
        <section class="auth-card">
            <a class="auth-brand text-decoration-none" href="{{ url('/') }}">
                <span class="brand-icon"><i class="bi bi-grid-1x2-fill" aria-hidden="true"></i></span>
                <span><strong>Inventaris Barang</strong></span>
            </a>

            @if (session('status'))
                <div class="alert alert-success" role="status">{{ session('status') }}</div>
            @endif

            <form class="needs-validation" method="POST" action="{{ route('login') }}" novalidate>
                @csrf
                <div class="mb-4">
                    <h1 class="h3 mb-1">Login</h1>
                    <p class="text-muted mb-0">Masuk ke akun Anda.</p>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">Alamat email</label>
                    <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="username" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="invalid-feedback">Masukkan alamat email yang valid.</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">Password</label>
                        @if (Route::has('password.request'))
                            <a class="small fw-semibold" href="{{ route('password.request') }}">Lupa password?</a>
                        @endif
                    </div>
                    <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" autocomplete="current-password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="invalid-feedback">Password wajib diisi.</div>
                    @enderror
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember" value="1" @checked(old('remember'))>
                    <label class="form-check-label" for="remember">Ingat saya</label>
                </div>
                <button class="btn btn-primary w-100" type="submit"><i class="bi bi-box-arrow-in-right" aria-hidden="true"></i> Masuk</button>
            </form>

            <div class="auth-footer">Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></div>
        </section>
    </main>
    <script src="{{ asset('adminhmd-1.0.0/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminhmd-1.0.0/assets/js/main.js') }}"></script>
</body>
</html>
