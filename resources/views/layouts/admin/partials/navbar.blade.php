<aside class="admin-sidebar" id="adminSidebar">

    <a href="{{ route('dashboard') }}" class="admin-brand">
        <img src="{{ asset('images/logo/logo.png') }}" alt="Logo KSPM">

        <div>
            <div class="admin-brand-title">KSPM STMIK Adhi Guna</div>
            <div class="admin-brand-subtitle">ADMIN PANEL</div>
        </div>
    </a>

    <nav class="pb-4">

        <div class="sidebar-label">MENU UTAMA</div>

        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2"></i>
            <span>Dashboard</span>
        </a>

        <div class="sidebar-label">KONTEN WEBSITE</div>

        <a href="#" class="nav-link">
            <i class="bi bi-newspaper"></i>
            <span>Berita & Artikel</span>
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-book"></i>
            <span>Materi Edukasi</span>
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-calendar-event"></i>
            <span>Kegiatan</span>
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-images"></i>
            <span>Galeri</span>
        </a>

        <div class="sidebar-label">LAYANAN</div>

        <a href="#" class="nav-link">
            <i class="bi bi-people"></i>
            <span>Peserta Kegiatan</span>
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-robot"></i>
            <span>Chatbot & Percakapan</span>
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-journal-text"></i>
            <span>Laporan</span>
        </a>

        <div class="sidebar-label">PENGATURAN</div>

        <a href="#" class="nav-link">
            <i class="bi bi-person-gear"></i>
            <span>Pengguna</span>
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-shield-lock"></i>
            <span>Role & Permission</span>
        </a>

        <a href="{{ url('/') }}" target="_blank" class="nav-link">
            <i class="bi bi-globe2"></i>
            <span>Lihat Website</span>
        </a>

        <div class="px-3 mt-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="btn btn-outline-light btn-sm w-100 py-2">
                    <i class="bi bi-box-arrow-left me-2"></i>
                    Logout
                </button>
            </form>
        </div>

    </nav>
</aside>