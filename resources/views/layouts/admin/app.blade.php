<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard Admin') | KSPM STMIK Adhi Guna</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
    :root {
        --admin-green: #103d2e;
        --admin-green-light: #176044;
        --admin-gold: #d4af37;
        --admin-bg: #f4f7f5;
        --admin-sidebar-width: 260px;
    }

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        background: var(--admin-bg);
        color: #25352c;
        font-size: 14px;
    }

    .admin-sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        width: var(--admin-sidebar-width);
        background: var(--admin-green);
        color: #fff;
        overflow-y: auto;
        z-index: 1040;
        transition: transform .25s ease;
    }

    .admin-brand {
        min-height: 90px;
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 18px;
        border-bottom: 1px solid rgba(255, 255, 255, .12);
        color: white;
        text-decoration: none;
    }

    .admin-brand img {
        width: 48px;
        height: 48px;
        object-fit: contain;
        background: white;
        border-radius: 10px;
        padding: 4px;
    }

    .admin-brand-title {
        font-size: 13px;
        font-weight: 700;
        line-height: 1.5;
    }

    .admin-brand-subtitle {
        font-size: 10px;
        color: #c6d8cd;
    }

    .sidebar-label {
        padding: 22px 20px 8px;
        font-size: 10px;
        font-weight: 600;
        color: #a9c4b5;
        letter-spacing: 1px;
    }

    .admin-sidebar .nav-link {
        display: flex;
        align-items: center;
        gap: 12px;
        margin: 3px 12px;
        padding: 11px 13px;
        color: #dce8e0;
        border-radius: 8px;
        font-size: 12px;
        transition: .2s;
    }

    .admin-sidebar .nav-link i {
        font-size: 17px;
        width: 20px;
        text-align: center;
    }

    .admin-sidebar .nav-link:hover,
    .admin-sidebar .nav-link.active {
        background: var(--admin-green-light);
        color: #fff;
    }

    .admin-sidebar .nav-link.active {
        border-left: 3px solid var(--admin-gold);
        padding-left: 10px;
    }

    .admin-main {
        min-height: 100vh;
        margin-left: var(--admin-sidebar-width);
        display: flex;
        flex-direction: column;
    }

    .admin-topbar {
        min-height: 76px;
        padding: 15px 28px;
        background: #fff;
        border-bottom: 1px solid #e8eee9;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
    }

    .admin-content {
        flex: 1;
        padding: 28px;
    }

    .admin-page-title {
        font-size: 22px;
        font-weight: 700;
        color: var(--admin-green);
    }

    .admin-muted {
        color: #77847c;
    }

    .admin-card {
        background: #fff;
        border: 1px solid #e9efea;
        border-radius: 14px;
        box-shadow: 0 3px 15px rgba(25, 60, 40, .035);
    }

    .admin-footer {
        padding: 18px 28px;
        background: white;
        border-top: 1px solid #e8eee9;
        color: #77847c;
        font-size: 11px;
    }

    .sidebar-overlay {
        display: none;
    }

    @media (max-width: 991.98px) {
        .admin-sidebar {
            transform: translateX(-100%);
        }

        .admin-sidebar.show {
            transform: translateX(0);
        }

        .admin-main {
            margin-left: 0;
        }

        .sidebar-overlay.show {
            display: block;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .4);
            z-index: 1030;
        }

        .admin-topbar {
            padding: 14px 18px;
        }

        .admin-content {
            padding: 18px;
        }

        .admin-footer {
            padding: 16px 18px;
        }
    }
    </style>

    @stack('styles')
</head>

<body>

    @include('layouts.admin.partials.navbar')

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="admin-main">

        <header class="admin-topbar">
            <div class="d-flex align-items-center gap-3">
                <button type="button" class="btn btn-light border d-lg-none" id="sidebarToggle"
                    aria-label="Buka navigasi">
                    <i class="bi bi-list fs-5"></i>
                </button>

                <div>
                    <div class="fw-semibold">
                        @yield('page-heading', 'Dashboard')
                    </div>
                    <div class="small admin-muted">
                        Panel Administrasi Galeri Investasi
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center gap-2">
                <div class="text-end d-none d-sm-block">
                    <div class="fw-semibold small">
                        {{ auth()->user()->name ?? 'Admin' }}
                    </div>
                    <div class="admin-muted" style="font-size: 11px;">
                        Administrator
                    </div>
                </div>

                <div class="rounded-circle d-flex align-items-center justify-content-center text-white"
                    style="width: 40px; height: 40px; background: var(--admin-green);">
                    <i class="bi bi-person-fill fs-5"></i>
                </div>
            </div>
        </header>

        <main class="admin-content">
            @yield('content')
        </main>

        @include('layouts.admin.partials.footer')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    const sidebar = document.getElementById('adminSidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const toggle = document.getElementById('sidebarToggle');

    function closeSidebar() {
        sidebar?.classList.remove('show');
        overlay?.classList.remove('show');
    }

    toggle?.addEventListener('click', function() {
        sidebar?.classList.toggle('show');
        overlay?.classList.toggle('show');
    });

    overlay?.addEventListener('click', closeSidebar);
    </script>

    @stack('scripts')
</body>

</html>