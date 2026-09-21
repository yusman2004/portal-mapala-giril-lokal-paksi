<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Dashboard Admin') | MAPALA
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: #163b2c;
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 1050;
            overflow-y: auto;
            transition: transform 0.25s ease;
        }

        .brand {
            padding: 25px 20px;
            font-weight: bold;
            font-size: 18px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #d8e8df;
            text-decoration: none;
            padding: 13px 20px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #286347;
            color: white;
        }

        .sidebar a i {
            width: 22px;
        }

        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            width: calc(100% - 260px);
        }

        .navbar-custom {
            background: white;
            padding: 18px 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .sidebar-toggle {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
        }

        .sidebar-overlay {
            display: none;
        }

        .content {
            padding: 25px;
        }

        .stat-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .05);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e1f0e7;
            color: #1b4332;
            font-size: 22px;
        }

        .table-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .05);
        }

        .badge-status {
            background: #fff3cd;
            color: #856404;
        }

        @media (max-width: 991.98px) {

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.mobile-open {
                transform: translateX(0);
            }

            .sidebar-overlay {
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, .45);
                z-index: 1040;
            }

            .sidebar-overlay.show {
                display: block;
            }

            .main-content {
                margin-left: 0 !important;
                width: 100% !important;
            }

            .navbar-custom {
                padding: 15px;
            }

            .content {
                padding: 15px;
            }

            .sidebar-toggle {
                display: flex !important;
            }
        }
    </style>

    @stack('styles')

</head>

<body>

    {{-- =====================================================
         SIDEBAR
    ====================================================== --}}

    <aside class="sidebar" id="adminSidebar">

        <div class="brand">
            <i class="bi bi-mountains"></i>
            MAPALA ADMIN
        </div>

        {{-- DASHBOARD --}}
        <a href="{{ route('admin.dashboard') }}"
           class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

            <i class="bi bi-speedometer2"></i>
            Dashboard

        </a>

        {{-- ANGGOTA --}}
        <a href="{{ route('admin.anggota.index') }}"
           class="{{ request()->routeIs('admin.anggota.*') ? 'active' : '' }}">

            <i class="bi bi-people"></i>
            Anggota

        </a>

        {{-- BERITA --}}
        <a href="{{ route('admin.berita.index') }}"
           class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">

            <i class="bi bi-newspaper"></i>
            Berita

        </a>

        {{-- KEGIATAN --}}
        <a href="{{ route('admin.kegiatan.index') }}"
           class="{{ request()->routeIs('admin.kegiatan.*') ? 'active' : '' }}">

            <i class="bi bi-calendar-event"></i>
            Kegiatan

        </a>

        {{-- GALERI --}}
        <a href="{{ route('admin.galeri.index') }}"
           class="{{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">

            <i class="bi bi-images"></i>
            Galeri

        </a>

        {{-- PENGURUS --}}
        <a href="{{ route('admin.pengurus.index') }}"
           class="{{ request()->routeIs('admin.pengurus.*') ? 'active' : '' }}">

            <i class="bi bi-person-badge"></i>
            Pengurus

        </a>

        {{-- PESAN --}}
        <a href="{{ route('admin.pesan.index') }}"
           class="{{ request()->routeIs('admin.pesan.*') ? 'active' : '' }}">

            <i class="bi bi-envelope"></i>
            Pesan

        </a>

        {{-- PENDAFTARAN --}}
        <a href="{{ route('admin.pendaftaran.index') }}"
           class="{{ request()->routeIs('admin.pendaftaran.*') ? 'active' : '' }}">

            <i class="bi bi-person-plus"></i>
            Pendaftaran

        </a>

        {{-- LOGOUT --}}
        <div class="p-3 mt-3">

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button
                    class="btn btn-danger w-100"
                    type="submit">

                    <i class="bi bi-box-arrow-right"></i>
                    Logout

                </button>

            </form>

        </div>

    </aside>


    {{-- OVERLAY --}}
    <div class="sidebar-overlay" id="sidebarOverlay"></div>


    {{-- =====================================================
         MAIN CONTENT
    ====================================================== --}}

    <main class="main-content">

        {{-- NAVBAR --}}
        <div class="navbar-custom d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center gap-2">

                <button
                    type="button"
                    class="btn btn-light sidebar-toggle d-lg-none"
                    id="sidebarToggle">

                    <i class="bi bi-list fs-4"></i>

                </button>

                <strong>
                    @yield('title', 'Dashboard')
                </strong>

            </div>


            {{-- USER --}}
            <div>

                <i class="bi bi-person-circle"></i>

                {{ Auth::user()->name ?? 'Admin' }}

            </div>

        </div>


        {{-- =====================================================
             INI YANG PALING PENTING
             SETIAP HALAMAN MASUK KE SINI
        ====================================================== --}}

        <div class="content">

            @yield('content')

        </div>

    </main>


    {{-- BOOTSTRAP --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    {{-- SIDEBAR MOBILE --}}
    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const sidebar =
                document.getElementById('adminSidebar');

            const toggle =
                document.getElementById('sidebarToggle');

            const overlay =
                document.getElementById('sidebarOverlay');


            if (!sidebar || !toggle) {
                return;
            }


            toggle.addEventListener('click', function (event) {

                event.preventDefault();
                event.stopPropagation();

                sidebar.classList.toggle('mobile-open');

                if (overlay) {
                    overlay.classList.toggle('show');
                }

            });


            if (overlay) {

                overlay.addEventListener('click', function () {

                    sidebar.classList.remove('mobile-open');

                    overlay.classList.remove('show');

                });

            }


            window.addEventListener('resize', function () {

                if (window.innerWidth > 991.98) {

                    sidebar.classList.remove('mobile-open');

                    if (overlay) {
                        overlay.classList.remove('show');
                    }

                }

            });

        });

    </script>

    @stack('scripts')

</body>

</html>