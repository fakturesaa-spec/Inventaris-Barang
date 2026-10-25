<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Register for AplikasiArre">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register | {{ config('app.name', 'AplikasiArre') }}</title>
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

            <form class="needs-validation" method="POST" action="{{ route('register') }}" novalidate>
                @csrf
                <div class="mb-4">
                    <h1 class="h3 mb-1">Buat akun</h1>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="name">Nama lengkap</label>
                    <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="name" required autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="invalid-feedback">Nama wajib diisi.</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">Alamat email</label>
                    <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="username" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="invalid-feedback">Masukkan alamat email yang valid.</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" autocomplete="new-password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="invalid-feedback">Password wajib diisi.</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label" for="password_confirmation">Konfirmasi password</label>
                    <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" required>
                    <div class="invalid-feedback">Konfirmasi password wajib diisi.</div>
                </div>
                <button class="btn btn-primary w-100" type="submit"><i class="bi bi-person-plus" aria-hidden="true"></i> Buat akun</button>
            </form>

            <div class="auth-footer">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></div>
        </section>
    </main>
    <script src="{{ asset('adminhmd-1.0.0/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminhmd-1.0.0/assets/js/main.js') }}"></script>
</body>
</html>
