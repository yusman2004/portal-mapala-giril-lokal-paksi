<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Beranda') - MAPALA Giril Lokal Paksi
    </title>

    <meta
        name="description"
        content="Portal resmi MAPALA Giril Lokal Paksi - Pecinta alam, lingkungan, petualangan dan persaudaraan."
    >

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
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Montserrat:wght@500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        :root {
            --green-dark: #082c1b;
            --green-deep: #0b3b24;
            --green: #166534;
            --green-light: #22c55e;
            --green-soft: #dcfce7;

            --cream: #f6f8f5;
            --white: #ffffff;

            --text: #17201b;
            --muted: #6b7280;

            --border: #e5e7eb;

            --shadow-sm:
                0 8px 25px rgba(0,0,0,.06);

            --shadow:
                0 18px 50px rgba(0,0,0,.09);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;

            scroll-padding-top: 95px;
        }

        body {
            margin: 0;

            font-family:
                "DM Sans",
                sans-serif;

            color: var(--text);

            background:
                #ffffff;

            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family:
                "Montserrat",
                sans-serif;
        }

        a {
            text-decoration: none;
        }

        /* =====================================================
           NAVBAR
        ===================================================== */

        .public-navbar {

            position: fixed;

            top: 0;
            left: 0;
            right: 0;

            z-index: 9999;

            background:
                rgba(8,44,27,.94);

            backdrop-filter:
                blur(16px);

            -webkit-backdrop-filter:
                blur(16px);

            border-bottom:
                1px solid
                rgba(255,255,255,.08);

            transition:
                all .3s ease;
        }

        .navbar-container {

            min-height: 78px;
        }

        .brand-wrapper {

            display: flex;

            align-items: center;

            gap: 12px;

            color: white;

            transition: .25s ease;
        }

        .brand-wrapper:hover {

            color: white;

            transform:
                translateY(-1px);
        }

        .brand-logo {

            width: 48px;
            height: 48px;

            display: flex;

            align-items: center;
            justify-content: center;

            overflow: hidden;

            border-radius: 12px;

            background:
                rgba(255,255,255,.1);

            border:
                1px solid
                rgba(255,255,255,.14);
        }

        .brand-logo img {

            width: 100%;
            height: 100%;

            object-fit: contain;
        }

        .brand-logo i {

            font-size: 1.5rem;

            color:
                var(--green-light);
        }

        .brand-title {

            line-height: 1.1;
        }

        .brand-name {

            display: block;

            font-family:
                "Montserrat",
                sans-serif;

            font-size: .9rem;

            font-weight: 800;

            letter-spacing:
                .2px;
        }

        .brand-subtitle {

            display: block;

            margin-top: 4px;

            color:
                rgba(255,255,255,.58);

            font-size:
                .62rem;

            font-weight: 500;

            letter-spacing:
                1.4px;

            text-transform:
                uppercase;
        }

        .public-navbar .nav-link {

            position: relative;

            color:
                rgba(255,255,255,.78) !important;

            font-size:
                .9rem;

            font-weight:
                600;

            padding:
                10px 13px !important;

            margin:
                0 2px;

            border-radius:
                8px;

            transition:
                all .25s ease;
        }

        .public-navbar .nav-link:hover {

            color:
                white !important;

            background:
                rgba(255,255,255,.08);
        }

        .public-navbar .nav-link.active {

            color:
                white !important;

            background:
                rgba(255,255,255,.1);
        }

        .public-navbar .nav-link.active::after {

            content: "";

            position: absolute;

            left: 13px;
            right: 13px;

            bottom: 4px;

            height: 2px;

            border-radius: 10px;

            background:
                var(--green-light);
        }

        .btn-register {

            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 7px;

            padding:
                10px 17px !important;

            margin-left: 7px;

            color:
                #062612 !important;

            background:
                var(--green-light);

            border-radius:
                10px !important;

            font-weight:
                800 !important;

            box-shadow:
                0 8px 22px
                rgba(34,197,94,.2);

            transition:
                all .25s ease;
        }

        .btn-register:hover {

            color:
                #062612 !important;

            background:
                #4ade80;

            transform:
                translateY(-2px);

            box-shadow:
                0 12px 28px
                rgba(34,197,94,.3);
        }

        .navbar-toggler {

            border:
                1px solid
                rgba(255,255,255,.2);

            padding:
                7px 10px;
        }

        .navbar-toggler:focus {

            box-shadow: none;
        }

        /* =====================================================
           MAIN
        ===================================================== */

        main {

            min-height:
                100vh;
        }

        /* =====================================================
           GENERAL SECTION
        ===================================================== */

        .section {

            padding:
                100px 0;
        }

        .section-light {

            background:
                #ffffff;
        }

        .section-soft {

            background:
                var(--cream);
        }

        .section-heading {

            max-width:
                720px;

            margin:
                0 auto 55px;

            text-align:
                center;
        }

        .section-label {

            display:
                inline-flex;

            align-items:
                center;

            gap:
                7px;

            margin-bottom:
                14px;

            padding:
                7px 13px;

            color:
                var(--green);

            background:
                var(--green-soft);

            border-radius:
                100px;

            font-size:
                .73rem;

            font-weight:
                800;

            letter-spacing:
                1px;

            text-transform:
                uppercase;
        }

        .section-title {

            margin-bottom:
                14px;

            color:
                var(--green-dark);

            font-size:
                clamp(2rem, 4vw, 3rem);

            font-weight:
                800;

            line-height:
                1.15;
        }

        .section-description {

            margin:
                0;

            color:
                var(--muted);

            line-height:
                1.8;
        }

        /* =====================================================
           GENERIC CARD
        ===================================================== */

        .modern-card {

            height:
                100%;

            background:
                white;

            border:
                1px solid
                var(--border);

            border-radius:
                18px;

            overflow:
                hidden;

            box-shadow:
                var(--shadow-sm);

            transition:
                all .3s ease;
        }

        .modern-card:hover {

            transform:
                translateY(-6px);

            box-shadow:
                var(--shadow);
        }

        /* =====================================================
           FOOTER
        ===================================================== */

        .public-footer {

            background:
                #061f14;

            color:
                rgba(255,255,255,.68);
        }

        .footer-top {

            padding:
                75px 0 50px;
        }

        .footer-brand {

            display:
                flex;

            align-items:
                center;

            gap:
                13px;

            margin-bottom:
                18px;

            color:
                white;
        }

        .footer-brand:hover {

            color:
                white;
        }

        .footer-logo {

            width:
                55px;

            height:
                55px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            overflow:
                hidden;

            border-radius:
                13px;

            background:
                rgba(255,255,255,.1);
        }

        .footer-logo img {

            width:
                100%;

            height:
                100%;

            object-fit:
                contain;
        }

        .footer-logo i {

            font-size:
                1.7rem;

            color:
                var(--green-light);
        }

        .footer-brand strong {

            display:
                block;

            font-family:
                "Montserrat",
                sans-serif;

            font-size:
                1rem;
        }

        .footer-brand span {

            display:
                block;

            margin-top:
                3px;

            color:
                rgba(255,255,255,.45);

            font-size:
                .65rem;

            letter-spacing:
                1.1px;
        }

        .footer-description {

            max-width:
                470px;

            color:
                rgba(255,255,255,.58);

            line-height:
                1.8;
        }

        .footer-title {

            margin-bottom:
                18px;

            color:
                white;

            font-size:
                .85rem;

            font-weight:
                800;

            letter-spacing:
                1px;

            text-transform:
                uppercase;
        }

        .footer-links {

            list-style:
                none;

            padding:
                0;

            margin:
                0;
        }

        .footer-links li {

            margin-bottom:
                10px;
        }

        .footer-links a {

            color:
                rgba(255,255,255,.58);

            transition:
                .2s ease;
        }

        .footer-links a:hover {

            color:
                var(--green-light);

            padding-left:
                4px;
        }

        .footer-social {

            display:
                flex;

            gap:
                9px;

            margin-top:
                22px;
        }

        .footer-social a {

            width:
                40px;

            height:
                40px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            color:
                white;

            background:
                rgba(255,255,255,.08);

            border-radius:
                10px;

            transition:
                all .25s ease;
        }

        .footer-social a:hover {

            color:
                #062612;

            background:
                var(--green-light);

            transform:
                translateY(-3px);
        }

        .footer-bottom {

            padding:
                20px 0;

            border-top:
                1px solid
                rgba(255,255,255,.08);

            color:
                rgba(255,255,255,.42);

            font-size:
                .82rem;
        }

        /* =====================================================
           BACK TO TOP
        ===================================================== */

        .back-top {

            position:
                fixed;

            right:
                22px;

            bottom:
                22px;

            z-index:
                999;

            width:
                44px;

            height:
                44px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            color:
                white;

            background:
                var(--green);

            border-radius:
                50%;

            box-shadow:
                0 10px 25px
                rgba(0,0,0,.18);

            transition:
                all .25s ease;
        }

        .back-top:hover {

            color:
                white;

            background:
                var(--green-light);

            transform:
                translateY(-3px);
        }

        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 991.98px) {

            .public-navbar .navbar-collapse {

                margin-top:
                    12px;

                padding:
                    15px;

                background:
                    rgba(5,34,21,.98);

                border:
                    1px solid
                    rgba(255,255,255,.08);

                border-radius:
                    14px;
            }

            .public-navbar .nav-link {

                margin:
                    2px 0;

                padding:
                    11px 12px !important;
            }

            .public-navbar .nav-link.active::after {

                display:
                    none;
            }

            .btn-register {

                width:
                    100%;

                margin:
                    8px 0 0;
            }

            .section {

                padding:
                    75px 0;
            }
        }

        @media (max-width: 575.98px) {

            .navbar-container {

                min-height:
                    70px;
            }

            .brand-logo {

                width:
                    42px;

                height:
                    42px;
            }

            .brand-name {

                font-size:
                    .78rem;
            }

            .brand-subtitle {

                font-size:
                    .55rem;
            }

            .section {

                padding:
                    65px 0;
            }

            .section-heading {

                margin-bottom:
                    38px;
            }

            .back-top {

                right:
                    15px;

                bottom:
                    15px;
            }
        }

        @stack('styles')

    </style>

</head>

<body>

<!-- =========================================================
     NAVBAR
========================================================= -->

<nav class="navbar navbar-expand-lg navbar-dark public-navbar">

    <div class="container navbar-container">

        <a
            class="brand-wrapper"
            href="{{ route('home') }}"
        >

            <div class="brand-logo">

                @if(file_exists(public_path('images/logo-mapala.png')))

                    <img
                        src="{{ asset('images/logo-mapala.png') }}"
                        alt="Logo MAPALA Giril Lokal Paksi"
                    >

                @else

                    <i class="bi bi-mountain"></i>

                @endif

            </div>

            <div class="brand-title">

                <span class="brand-name">
                    MAPALA GIRIL LOKAL PAKSI
                </span>

                <span class="brand-subtitle">
                    Pecinta Alam & Lingkungan
                </span>

            </div>

        </a>


        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarPublic"
            aria-controls="navbarPublic"
            aria-expanded="false"
            aria-label="Buka navigasi"
        >

            <span class="navbar-toggler-icon"></span>

        </button>


        <div
            class="collapse navbar-collapse"
            id="navbarPublic"
        >

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <!-- BERANDA -->

                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}"
                    >

                        <i class="bi bi-house-door me-1"></i>

                        Beranda

                    </a>

                </li>


                <!-- TENTANG -->

                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('public.tentang') ? 'active' : '' }}"
                        href="{{ route('public.tentang') }}"
                    >

                        Tentang

                    </a>

                </li>


                <!-- KEGIATAN -->

                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('public.kegiatan') ? 'active' : '' }}"
                        href="{{ route('public.kegiatan') }}"
                    >

                        Kegiatan

                    </a>

                </li>


                <!-- BERITA -->

                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('public.berita*') ? 'active' : '' }}"
                        href="{{ route('public.berita') }}"
                    >

                        Berita

                    </a>

                </li>


                <!-- GALERI -->

                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('public.galeri') ? 'active' : '' }}"
                        href="{{ route('public.galeri') }}"
                    >

                        Galeri

                    </a>

                </li>


                <!-- KONTAK -->

                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('public.kontak') ? 'active' : '' }}"
                        href="{{ route('public.kontak') }}"
                    >

                        Kontak

                    </a>

                </li>


                <!-- PENDAFTARAN -->

                <li class="nav-item">

                    <a
                        class="nav-link btn-register"
                        href="{{ route('pendaftaran.create') }}"
                    >

                        <i class="bi bi-person-plus"></i>

                        Daftar Anggota

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>


<!-- =========================================================
     MAIN CONTENT
========================================================= -->

<main>

    @yield('content')

</main>


<!-- =========================================================
     FOOTER
========================================================= -->

<footer class="public-footer">

    <div class="footer-top">

        <div class="container">

            <div class="row g-5">


                <!-- BRAND -->

                <div class="col-lg-6">

                    <a
                        href="{{ route('home') }}"
                        class="footer-brand"
                    >

                        <div class="footer-logo">

                            @if(file_exists(public_path('images/logo-mapala.png')))

                                <img
                                    src="{{ asset('images/logo-mapala.png') }}"
                                    alt="Logo MAPALA Giril Lokal Paksi"
                                >

                            @else

                                <i class="bi bi-mountain"></i>

                            @endif

                        </div>

                        <div>

                            <strong>
                                MAPALA Giril Lokal Paksi
                            </strong>

                            <span>
                                PECINTA ALAM & LINGKUNGAN
                            </span>

                        </div>

                    </a>


                    <p class="footer-description">

                        Wadah bagi generasi muda untuk menjelajah alam,
                        menjaga lingkungan, mengembangkan kepemimpinan,
                        serta membangun persaudaraan melalui kegiatan
                        kepecintaalaman.

                    </p>


                    <div class="footer-social">

                        <a
                            href="#"
                            aria-label="Instagram"
                        >
                            <i class="bi bi-instagram"></i>
                        </a>

                        <a
                            href="#"
                            aria-label="Facebook"
                        >
                            <i class="bi bi-facebook"></i>
                        </a>

                        <a
                            href="#"
                            aria-label="YouTube"
                        >
                            <i class="bi bi-youtube"></i>
                        </a>

                        <a
                            href="#"
                            aria-label="WhatsApp"
                        >
                            <i class="bi bi-whatsapp"></i>
                        </a>

                    </div>

                </div>


                <!-- NAVIGASI -->

                <div class="col-6 col-lg-3">

                    <h6 class="footer-title">
                        Navigasi
                    </h6>

                    <ul class="footer-links">

                        <li>
                            <a href="{{ route('home') }}">
                                Beranda
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('public.tentang') }}">
                                Tentang Kami
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('public.kegiatan') }}">
                                Kegiatan
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('public.berita') }}">
                                Berita
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('public.galeri') }}">
                                Galeri
                            </a>
                        </li>

                    </ul>

                </div>


                <!-- BERGABUNG -->

                <div class="col-6 col-lg-3">

                    <h6 class="footer-title">
                        Bergabung
                    </h6>

                    <ul class="footer-links">

                        <li>

                            <a
                                href="{{ route('pendaftaran.create') }}"
                            >

                                Pendaftaran Anggota

                            </a>

                        </li>

                        <li>

                            <a
                                href="{{ route('public.kontak') }}"
                            >

                                Hubungi Kami

                            </a>

                        </li>

                        <li>

                            <a
                                href="{{ route('login') }}"
                            >

                                Login Admin

                            </a>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>


    <!-- FOOTER BOTTOM -->

    <div class="footer-bottom">

        <div class="container">

            <div
                class="d-flex flex-column flex-md-row justify-content-between gap-2"
            >

                <div>

                    &copy; {{ date('Y') }}

                    MAPALA Giril Lokal Paksi.

                    Semua hak dilindungi.

                </div>

                <div>

                    Portal Organisasi MAPALA

                </div>

            </div>

        </div>

    </div>

</footer>


<!-- BACK TO TOP -->

<a
    href="#"
    class="back-top"
    aria-label="Kembali ke atas"
>
    <i class="bi bi-arrow-up"></i>
</a>


<!-- BOOTSTRAP JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


<script>

    /*
     * Tutup menu mobile setelah memilih menu
     */

    document
        .querySelectorAll('.public-navbar .nav-link')
        .forEach(function(link) {

            link.addEventListener('click', function() {

                const navbar =
                    document.getElementById('navbarPublic');

                if (
                    navbar &&
                    navbar.classList.contains('show')
                ) {

                    const bsCollapse =
                        bootstrap.Collapse
                        .getInstance(navbar);

                    if (bsCollapse) {
                        bsCollapse.hide();
                    }

                }

            });

        });


    /*
     * Tombol kembali ke atas
     */

    document
        .querySelector('.back-top')
        .addEventListener('click', function(event) {

            event.preventDefault();

            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });

        });

</script>


@stack('scripts')

</body>

</html>