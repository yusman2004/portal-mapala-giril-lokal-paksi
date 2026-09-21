<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'MAPALA Giril Lokal Paksi')
    </title>

    <meta
        name="description"
        content="Portal resmi MAPALA Giril Lokal Paksi"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <style>

        :root {
            --primary: #198754;
            --dark: #10251b;
        }

        body {
            font-family:
                "Segoe UI",
                Arial,
                sans-serif;
            background: #f7f9f8;
            color: #1f2937;
        }

        .navbar {
            background:
                rgba(16, 37, 27, .97);
        }

        .navbar-brand {
            font-weight: 800;
            letter-spacing: .3px;
        }

        .navbar-brand small {
            display: block;
            font-size: 10px;
            letter-spacing: 1.5px;
            color: #a7d7b9;
        }

        .nav-link {
            color: rgba(255,255,255,.8) !important;
            font-weight: 500;
            margin-left: 8px;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #fff !important;
        }

        .hero-page {
            background:
                linear-gradient(
                    135deg,
                    #10251b,
                    #198754
                );
            color: #fff;
            padding: 80px 0;
        }

        .form-card {
            border: 0;
            border-radius: 20px;
            box-shadow:
                0 15px 45px rgba(0,0,0,.08);
        }

        .form-label {
            font-weight: 600;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 12px 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #198754;
            box-shadow:
                0 0 0 .2rem rgba(25,135,84,.12);
        }

        .btn {
            border-radius: 10px;
        }

        footer {
            background: #10251b;
            color: rgba(255,255,255,.75);
        }

    </style>

    @stack('styles')

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top">

    <div class="container">

        <a
            class="navbar-brand"
            href="{{ url('/') }}"
        >

            <i class="bi bi-mountain me-2"></i>

            MAPALA GIRIL LOKAL PAKSI

            <small>
                PORTAL ORGANISASI PECINTA ALAM
            </small>

        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarPublic"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div
            class="collapse navbar-collapse"
            id="navbarPublic"
        >

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a
                        class="nav-link"
                       href="{{ route('public.tentang') }}"
                    class="{{ request()->routeIs('public.tentang') ? 'active' : '' }}"
                    >
                        Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link"
                       href="{{ route('public.kegiatan') }}"
                         class="{{ request()->routeIs('public.kegiatan') ? 'active' : '' }}"
                    >
                        Kegiatan
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{ route('public.berita') }}"
                        class="{{ request()->routeIs('public.berita*') ? 'active' : '' }}"
                    >
                       Berita
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{ route('public.galeri') }}"
                        class="{{ request()->routeIs('public.galeri') ? 'active' : '' }}"
                    >
                        Galeri
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link"
                         href="{{ route('public.kontak') }}"
                        class="{{ request()->routeIs('public.kontak') ? 'active' : '' }}"
                    >
                        Kontak
                    </a>
                </li>

                <li class="nav-item ms-lg-3">

                    <a
                        class="btn btn-success px-4"
                        href="{{ route('pendaftaran.create') }}"
                    >
                        <i class="bi bi-person-plus me-1"></i>
                        Daftar Anggota
                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>

<main>

    @yield('content')

</main>

<footer class="py-5 mt-5">

    <div class="container">

        <div class="row g-4">

            <div class="col-md-6">

                <h5 class="fw-bold text-white">
                    <i class="bi bi-mountain me-2"></i>
                    MAPALA Giril Lokal Paksi
                </h5>

                <p class="mb-0">
                    Portal informasi dan kegiatan
                    MAPALA Giril Lokal Paksi.
                </p>

            </div>

            <div class="col-md-6 text-md-end">

                <p class="mb-1">
                    Jelajahi alam. Bangun persaudaraan.
                </p>

                <small>
                    &copy; {{ date('Y') }}
                    MAPALA Giril Lokal Paksi.
                    Semua hak dilindungi.
                </small>

            </div>

        </div>

    </div>

</footer>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

@stack('scripts')

</body>

</html>