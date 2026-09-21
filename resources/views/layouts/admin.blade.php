<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Dashboard') - MAPALA Giril Lokal Paksi
    </title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f4f7f6;
            color: #1f2937;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }


        /* =========================================
           SIDEBAR
        ========================================= */

        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;

            background: linear-gradient(
                180deg,
                #12372a 0%,
                #0d2b21 100%
            );

            color: white;
            z-index: 1100;
            overflow-y: auto;
            transition: all .3s ease;

            box-shadow: 5px 0 25px rgba(0, 0, 0, .08);
        }

        .admin-sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .admin-sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,.15);
            border-radius: 20px;
        }


        /* =========================================
           BRAND
        ========================================= */

        .sidebar-brand {
            height: 82px;
            padding: 0 22px;

            display: flex;
            align-items: center;
            gap: 12px;

            border-bottom: 1px solid rgba(255,255,255,.08);
        }


        /* LOGO MAPALA */

        .brand-logo {
            width: 48px;
            height: 48px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;

            border-radius: 10px;

            background: rgba(255,255,255,.12);
        }

        .brand-logo img {
            width: 100%;
            height: 100%;

            object-fit: contain;

            display: block;
        }


        .brand-text {
            line-height: 1.15;
        }

        .brand-title {
            font-size: 16px;
            font-weight: 800;
            letter-spacing: .3px;
        }

        .brand-subtitle {
            font-size: 10px;
            color: rgba(255,255,255,.58);
            margin-top: 4px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }


        /* =========================================
           MENU
        ========================================= */

        .sidebar-menu {
            padding: 20px 14px;
        }

        .menu-label {
            padding: 0 12px;
            margin: 8px 0 10px;

            color: rgba(255,255,255,.38);

            font-size: 10px;
            font-weight: 700;

            text-transform: uppercase;
            letter-spacing: 1.3px;
        }

        .sidebar-menu a {
            position: relative;

            display: flex;
            align-items: center;

            gap: 13px;

            min-height: 46px;

            padding: 0 14px;
            margin-bottom: 5px;

            border-radius: 11px;

            color: rgba(255,255,255,.68);

            font-size: 13px;
            font-weight: 500;

            transition: all .2s ease;
        }

        .sidebar-menu a i {
            width: 22px;

            text-align: center;

            font-size: 17px;
        }

        .sidebar-menu a:hover {
            color: white;

            background: rgba(255,255,255,.07);

            transform: translateX(2px);
        }

        .sidebar-menu a.active {
            color: white;

            background: linear-gradient(
                90deg,
                rgba(52,211,153,.23),
                rgba(52,211,153,.08)
            );

            box-shadow: inset 3px 0 0 #34d399;
        }

        .sidebar-menu a.active i {
            color: #6ee7b7;
        }

        .sidebar-divider {
            height: 1px;

            background: rgba(255,255,255,.07);

            margin: 18px 10px;
        }


        /* =========================================
           LOGOUT
        ========================================= */

        .sidebar-logout {
            margin-top: 15px;
        }

        .sidebar-logout button {
            width: 100%;

            border: 0;

            background: transparent;

            color: #fca5a5;

            display: flex;
            align-items: center;

            gap: 13px;

            padding: 12px 14px;

            border-radius: 11px;

            font-size: 13px;
            font-weight: 500;

            transition: .2s;
        }

        .sidebar-logout button:hover {
            background: rgba(239,68,68,.10);
            color: #fecaca;
        }

        .sidebar-logout i {
            width: 22px;

            text-align: center;

            font-size: 17px;
        }


        /* =========================================
           MAIN
        ========================================= */

        .admin-main {
            margin-left: 260px;

            min-height: 100vh;

            transition: all .3s ease;
        }


        /* =========================================
           TOPBAR
        ========================================= */

        .admin-topbar {
            height: 82px;

            background: rgba(255,255,255,.95);

            border-bottom: 1px solid #e8eeeb;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 30px;

            position: sticky;
            top: 0;

            z-index: 1000;

            backdrop-filter: blur(10px);
        }

        .topbar-left {
            display: flex;
            align-items: center;

            gap: 15px;
        }

        .page-heading {
            font-size: 14px;
            font-weight: 700;

            color: #173c2e;
        }

        .page-breadcrumb {
            font-size: 11px;

            color: #94a3b8;

            margin-top: 2px;
        }

        .mobile-menu-btn {
            width: 40px;
            height: 40px;

            border: 1px solid #e5ebe8;

            background: white;

            border-radius: 10px;

            color: #173c2e;

            display: none;

            align-items: center;
            justify-content: center;
        }


        /* =========================================
           TOPBAR RIGHT
        ========================================= */

        .topbar-right {
            display: flex;
            align-items: center;

            gap: 15px;
        }

        .notification-btn {
            position: relative;

            width: 40px;
            height: 40px;

            border: 1px solid #e8eeeb;

            background: white;

            color: #64748b;

            border-radius: 10px;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .notification-btn:hover {
            background: #f0fdf4;
            color: #166534;
        }

        .notification-dot {
            position: absolute;

            top: 8px;
            right: 8px;

            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #ef4444;

            border: 2px solid white;
        }


        /* =========================================
           ADMIN PROFILE
        ========================================= */

        .admin-profile {
            display: flex;
            align-items: center;

            gap: 10px;

            padding-left: 5px;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;

            border-radius: 12px;

            background: linear-gradient(
                135deg,
                #166534,
                #34d399
            );

            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-weight: 800;
            font-size: 14px;
        }

        .admin-info {
            line-height: 1.2;
        }

        .admin-name {
            font-size: 12px;

            font-weight: 700;

            color: #1e293b;
        }

        .admin-role {
            font-size: 10px;

            color: #94a3b8;

            margin-top: 3px;
        }


        /* =========================================
           CONTENT
        ========================================= */

        .admin-content {
            padding: 30px;

            max-width: 1700px;

            margin: auto;
        }


        /* =========================================
           FLASH MESSAGE
        ========================================= */

        .alert {
            border: 0;

            border-radius: 14px;

            font-size: 13px;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        .sidebar-overlay {
            display: none;
        }

        @media (max-width: 991px) {

            .admin-sidebar {
                transform: translateX(-100%);
            }

            .admin-sidebar.show {
                transform: translateX(0);
            }

            .admin-main {
                margin-left: 0;
            }

            .mobile-menu-btn {
                display: flex;
            }

            .sidebar-overlay {
                position: fixed;

                inset: 0;

                background: rgba(0,0,0,.45);

                z-index: 1050;

                display: none;
            }

            .sidebar-overlay.show {
                display: block;
            }

            .admin-topbar {
                padding: 0 20px;
            }

            .admin-content {
                padding: 22px;
            }
        }


        @media (max-width: 576px) {

            .admin-topbar {
                height: 70px;

                padding: 0 15px;
            }

            .page-heading {
                font-size: 12px;
            }

            .page-breadcrumb {
                display: none;
            }

            .admin-info {
                display: none;
            }

            .notification-btn {
                width: 38px;
                height: 38px;
            }

            .admin-avatar {
                width: 38px;
                height: 38px;
            }

            .admin-content {
                padding: 18px 14px;
            }


            /* LOGO HP */

            .sidebar-brand {
                padding: 0 18px;
            }

            .brand-logo {
                width: 46px;
                height: 46px;
            }

            .brand-title {
                font-size: 15px;
            }

            .brand-subtitle {
                font-size: 9px;
            }
        }

    </style>

    @stack('styles')

</head>


<body>


    <!-- =========================================
         OVERLAY MOBILE
    ========================================== -->

    <div
        class="sidebar-overlay"
        id="sidebarOverlay"
        onclick="closeSidebar()"
    ></div>


    <!-- =========================================
         SIDEBAR
    ========================================== -->

    <aside
        class="admin-sidebar"
        id="adminSidebar"
    >

        <!-- BRAND -->

        <div class="sidebar-brand">

            <div class="brand-logo">

                <img
                    src="{{ asset('images/logo-mapala.png') }}"
                    alt="Logo MAPALA Giril Lokal Paksi"
                >

            </div>


            <div class="brand-text">

                <div class="brand-title">
                    MAPALA
                </div>

                <div class="brand-subtitle">
                    Giril Lokal Paksi
                </div>

            </div>

        </div>


        <!-- MENU -->

        <div class="sidebar-menu">


            <div class="menu-label">
                Menu Utama
            </div>


            <!-- Dashboard -->

            <a
                href="{{ route('admin.dashboard') }}"
                class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
            >

                <i class="bi bi-grid-1x2-fill"></i>

                <span>
                    Dashboard
                </span>

            </a>


            <!-- Anggota -->

            <a
                href="{{ route('admin.anggota.index') }}"
                class="{{ request()->routeIs('admin.anggota.*') ? 'active' : '' }}"
            >

                <i class="bi bi-people-fill"></i>

                <span>
                    Anggota
                </span>

            </a>


            <!-- Berita -->

            <a
                href="{{ route('admin.berita.index') }}"
                class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}"
            >

                <i class="bi bi-newspaper"></i>

                <span>
                    Berita
                </span>

            </a>


            <!-- Kategori Berita -->

            <a
                href="{{ route('admin.kategori-berita.index') }}"
                class="{{ request()->routeIs('admin.kategori-berita.*') ? 'active' : '' }}"
            >

                <i class="bi bi-tags-fill"></i>

                <span>
                    Kategori Berita
                </span>

            </a>


            <!-- Kegiatan -->

            <a
                href="{{ route('admin.kegiatan.index') }}"
                class="{{ request()->routeIs('admin.kegiatan.*') ? 'active' : '' }}"
            >

                <i class="bi bi-calendar-event-fill"></i>

                <span>
                    Kegiatan
                </span>

            </a>


            <!-- Galeri -->

            <a
                href="{{ route('admin.galeri.index') }}"
                class="{{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}"
            >

                <i class="bi bi-images"></i>

                <span>
                    Galeri
                </span>

            </a>


            <!-- Pengurus -->

            <a
                href="{{ route('admin.pengurus.index') }}"
                class="{{ request()->routeIs('admin.pengurus.*') ? 'active' : '' }}"
            >

                <i class="bi bi-diagram-3-fill"></i>

                <span>
                    Struktur Pengurus
                </span>

            </a>


            <div class="sidebar-divider"></div>


            <div class="menu-label">
                Komunikasi
            </div>


            <!-- Pesan -->

            <a
                href="{{ route('admin.pesan.index') }}"
                class="{{ request()->routeIs('admin.pesan.*') ? 'active' : '' }}"
            >

                <i class="bi bi-chat-left-text-fill"></i>

                <span>
                    Pesan
                </span>


                @if(isset($pesanBelumDibaca) && $pesanBelumDibaca > 0)

                    <span
                        class="badge rounded-pill bg-danger ms-auto"
                        style="font-size:9px;"
                    >
                        {{ $pesanBelumDibaca }}
                    </span>

                @endif

            </a>


            <!-- Pendaftaran -->

            <a
                href="{{ route('admin.pendaftaran.index') }}"
                class="{{ request()->routeIs('admin.pendaftaran.*') ? 'active' : '' }}"
            >

                <i class="bi bi-person-plus-fill"></i>

                <span>
                    Pendaftaran
                </span>


                @if(isset($pendaftaranMenunggu) && $pendaftaranMenunggu > 0)

                    <span
                        class="badge rounded-pill bg-warning text-dark ms-auto"
                        style="font-size:9px;"
                    >
                        {{ $pendaftaranMenunggu }}
                    </span>

                @endif

            </a>


            <div class="sidebar-divider"></div>


            <!-- LOGOUT -->

            <div class="sidebar-logout">

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                >

                    @csrf

                    <button type="submit">

                        <i class="bi bi-box-arrow-left"></i>

                        <span>
                            Keluar
                        </span>

                    </button>

                </form>

            </div>


        </div>

    </aside>


    <!-- =========================================
         MAIN
    ========================================== -->

    <main class="admin-main">


        <!-- =========================================
             TOPBAR
        ========================================== -->

        <header class="admin-topbar">


            <div class="topbar-left">


                <!-- MOBILE MENU -->

                <button
                    type="button"
                    class="mobile-menu-btn"
                    onclick="toggleSidebar()"
                >

                    <i class="bi bi-list fs-5"></i>

                </button>


                <div>

                    <div class="page-heading">

                        @yield('title', 'Dashboard')

                    </div>


                    <div class="page-breadcrumb">

                        Portal Admin · MAPALA Giril Lokal Paksi

                    </div>

                </div>


            </div>


            <div class="topbar-right">


                <!-- NOTIFICATION -->

                <button
                    type="button"
                    class="notification-btn"
                    title="Notifikasi"
                >

                    <i class="bi bi-bell"></i>


                    @if(
                        (isset($pesanBelumDibaca) && $pesanBelumDibaca > 0) ||
                        (isset($pendaftaranMenunggu) && $pendaftaranMenunggu > 0)
                    )

                        <span class="notification-dot"></span>

                    @endif

                </button>


                <!-- PROFILE -->

                <div class="admin-profile">


                    <div class="admin-avatar">

                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}

                    </div>


                    <div class="admin-info">


                        <div class="admin-name">

                            {{ Auth::user()->name ?? 'Administrator' }}

                        </div>


                        <div class="admin-role">

                            Administrator

                        </div>


                    </div>


                </div>


            </div>


        </header>


        <!-- =========================================
             CONTENT
        ========================================== -->

        <section class="admin-content">


            <!-- SUCCESS -->

            @if(session('success'))

                <div
                    class="alert alert-success alert-dismissible fade show mb-4"
                >

                    <i class="bi bi-check-circle-fill me-2"></i>

                    {{ session('success') }}


                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                    ></button>

                </div>

            @endif


            <!-- ERROR -->

            @if(session('error'))

                <div
                    class="alert alert-danger alert-dismissible fade show mb-4"
                >

                    <i class="bi bi-exclamation-circle-fill me-2"></i>

                    {{ session('error') }}


                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                    ></button>

                </div>

            @endif


            @yield('content')


        </section>


    </main>


    <!-- =========================================
         BOOTSTRAP JS
    ========================================== -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>


    <!-- =========================================
         SIDEBAR JS
    ========================================== -->

    <script>

        function toggleSidebar() {

            const sidebar =
                document.getElementById('adminSidebar');

            const overlay =
                document.getElementById('sidebarOverlay');

            sidebar.classList.toggle('show');

            overlay.classList.toggle('show');

        }


        function closeSidebar() {

            const sidebar =
                document.getElementById('adminSidebar');

            const overlay =
                document.getElementById('sidebarOverlay');

            sidebar.classList.remove('show');

            overlay.classList.remove('show');

        }


        // Tutup sidebar ketika klik menu di HP

        document
            .querySelectorAll('.admin-sidebar a')
            .forEach(function(link) {

                link.addEventListener('click', function() {

                    if (window.innerWidth <= 991) {

                        closeSidebar();

                    }

                });

            });

    </script>


    @stack('scripts')


</body>

</html>