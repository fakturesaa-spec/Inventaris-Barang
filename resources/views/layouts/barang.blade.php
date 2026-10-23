<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="adminHMD professional admin dashboard template">
    <title>Inventaris Barang</title>

    <link rel="stylesheet" href="/adminhmd-1.0.0/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/adminhmd-1.0.0/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/adminhmd-1.0.0/assets/css/style.css">
</head>

<body>
    <div class="admin-shell">
        <div class="sidebar-backdrop" data-sidebar-close></div>

        <aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
            <div class="sidebar-header">
                <a class="brand-mark" href="{{ route('dashboard') }}" aria-label="dashboard">
                    <span class="brand-icon"><i class="bi bi-box"></i></span>
                    <span class="brand-copy">
                        <span class="brand-title">Inventaris Barang</span>
                    </span>
                </a>
            </div>

            <nav class="sidebar-nav">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <span class="nav-icon"><i class="bi bi-house-door"></i></span>
                    <span class="nav-text">Beranda</span>
                </a>
                <a class="nav-link" href="{{ route('barang.index') }}">
                    <span class="nav-icon"><i class="bi bi-box"></i></span>
                    <span class="nav-text">Daftar Barang</span>
                </a>
                <a class="nav-link" href="{{ route('peminjaman.index') }}">
                    <span class="nav-icon"><i class="bi bi-box"></i></span>
                    <span class="nav-text">Daftar Peminjam</span>
                </a>

            </nav>


            <div class="sidebar-footer">
                <span><i class="bi bi-box-arrow-in-left"></i></span>
                <span class="sidebar-footer-text">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item" type="submit">Sign out</button>
                    </form>
                </span>
            </div>
        </aside>

        <div class="admin-main">
            <nav class="navbar admin-navbar navbar-expand bg-white">
                <div class="container-fluid px-3 px-lg-4">
                    <button class="sidebar-toggle" type="button" data-sidebar-toggle aria-controls="adminSidebar"
                        aria-expanded="true" aria-label="Toggle sidebar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>



                    <div class="navbar-actions ms-auto">
                        <button class="icon-button theme-toggle" type="button" data-theme-toggle
                            aria-label="Switch color theme" title="Switch color theme">
                            <i class="bi bi-moon-stars" data-theme-icon aria-hidden="true"></i>
                        </button>
                        <div class="dropdown">
                            <button class="profile-button" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false" aria-label="Buka profil {{ Auth::user()->name }}">
                                <img class="avatar-img avatar-sm"
                                    src="/adminhmd-1.0.0/assets/images/avatar/avatar-fallback.jpg" alt="Foto profil">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end notification-menu">
                                <div class="dropdown-item">
                                    <span class="notification-title">Nama</span>
                                    <span class="notification-time">{{ Auth::user()->name }}</span>
                                </div>
                                <div class="dropdown-item">
                                    <span class="notification-title">Email</span>
                                    <span class="notification-time">{{ Auth::user()->email }}</span>
                                </div>
                                
                                <div class="sidebar-footer">
                                    <span><i class="bi bi-box-arrow-in-left"></i></span>
                                    <span class="sidebar-footer-text">
                                        
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button class="dropdown-item" type="submit">Sign out</button>
                                        </form>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </nav>

            <main class="dashboard-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>

            <footer class="admin-footer">
                <div class="container-fluid px-3 px-lg-4">
                    <span>&copy;2026 Sistem Inventaris Barang</span>
                    <span>Dibuat oleh Anif Fakturesa R.</span>
                    <span>Laravel-13 . Bootstrap</span>
                </div>
            </footer>
        </div>
    </div>

    <script src="/adminhmd-1.0.0/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/adminhmd-1.0.0/assets/js/main.js"></script>
</body>

</html>
