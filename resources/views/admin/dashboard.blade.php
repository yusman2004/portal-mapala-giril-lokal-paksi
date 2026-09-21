@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

@php
\Carbon\Carbon::setLocale('id');
@endphp

<style>
    .dashboard-wrapper {
        width: 100%;
    }

    /* ================================
       HERO
    ================================= */

    .dashboard-hero {
        position: relative;
        overflow: hidden;
        border-radius: 22px;
        padding: 34px;
        margin-bottom: 26px;
        background: linear-gradient(135deg, #12372a 0%, #185c42 55%, #247a55 100%);
        color: #fff;
        box-shadow: 0 15px 35px rgba(18, 55, 42, .18);
    }

    .dashboard-hero::before {
        content: "";
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        right: -100px;
        top: -150px;
        background: rgba(255,255,255,.06);
    }

    .dashboard-hero::after {
        content: "";
        position: absolute;
        width: 190px;
        height: 190px;
        border-radius: 50%;
        right: 120px;
        bottom: -130px;
        background: rgba(255,255,255,.04);
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-label {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #a7f3d0;
        font-weight: 800;
        margin-bottom: 9px;
    }

    .hero-title {
        font-size: 29px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .hero-description {
        max-width: 750px;
        color: rgba(255,255,255,.78);
        font-size: 13px;
        line-height: 1.7;
        margin: 0;
    }

    .hero-date {
        display: inline-flex;
        align-items: center;
        margin-top: 18px;
        padding: 10px 16px;
        border-radius: 11px;
        background: rgba(255,255,255,.10);
        border: 1px solid rgba(255,255,255,.12);
        color: #d1fae5;
        font-size: 12px;
        font-weight: 700;
    }

    /* ================================
       STATISTIC
    ================================= */

    .stat-card {
        position: relative;
        height: 100%;
        background: #fff;
        border: 1px solid #e5ebe8;
        border-radius: 18px;
        padding: 22px;
        transition: all .25s ease;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 30px rgba(15,23,42,.08);
        border-color: #d4e4dc;
    }

    .stat-card::after {
        content: "";
        position: absolute;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        right: -40px;
        bottom: -45px;
        background: rgba(22,101,52,.04);
    }

    .stat-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
    }

    .stat-icon.green {
        background: #dcfce7;
        color: #15803d;
    }

    .stat-icon.blue {
        background: #dbeafe;
        color: #2563eb;
    }

    .stat-icon.orange {
        background: #ffedd5;
        color: #ea580c;
    }

    .stat-icon.purple {
        background: #f3e8ff;
        color: #9333ea;
    }

    .stat-label {
        margin-top: 17px;
        color: #64748b;
        font-size: 13px;
        font-weight: 600;
    }

    .stat-number {
        margin-top: 4px;
        font-size: 30px;
        line-height: 1.2;
        font-weight: 800;
        color: #172b22;
    }

    .stat-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 11px;
        font-size: 11px;
        font-weight: 700;
        color: #166534;
    }

    .stat-link:hover {
        color: #0f5132;
    }

    /* ================================
       SECTION
    ================================= */

    .dashboard-section {
        margin-top: 27px;
    }

    .section-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .section-title {
        font-size: 17px;
        font-weight: 800;
        color: #173c2e;
        margin: 0;
    }

    .section-subtitle {
        color: #94a3b8;
        font-size: 11px;
        margin-top: 4px;
    }

    /* ================================
       PANEL
    ================================= */

    .dashboard-panel {
        height: 100%;
        background: #fff;
        border: 1px solid #e5ebe8;
        border-radius: 18px;
        overflow: hidden;
    }

    .panel-header {
        min-height: 72px;
        padding: 18px 21px;
        border-bottom: 1px solid #edf1ef;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .panel-title {
        font-size: 14px;
        font-weight: 800;
        color: #173c2e;
        margin: 0;
    }

    .panel-header a {
        white-space: nowrap;
        font-size: 11px;
        font-weight: 700;
        color: #15803d;
    }

    .panel-header a:hover {
        color: #0f5132;
    }

    .panel-body {
        padding: 20px 21px;
    }

    /* ================================
       SUMMARY
    ================================= */

    .summary-item {
        padding: 14px 0;
        border-bottom: 1px solid #edf1ef;
    }

    .summary-item:first-child {
        padding-top: 0;
    }

    .summary-item:last-child {
        border-bottom: 0;
        padding-bottom: 0;
    }

    .summary-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .summary-label {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 12px;
        font-weight: 600;
        color: #64748b;
    }

    .summary-label i {
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        background: #ecfdf5;
        color: #15803d;
    }

    .summary-number {
        font-size: 16px;
        font-weight: 800;
        color: #173c2e;
    }

    /* ================================
       DATA LIST
    ================================= */

    .data-list {
        display: flex;
        flex-direction: column;
    }

    .data-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 14px 0;
        border-bottom: 1px solid #edf1ef;
    }

    .data-item:first-child {
        padding-top: 0;
    }

    .data-item:last-child {
        border-bottom: 0;
        padding-bottom: 0;
    }

    .data-left {
        min-width: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .data-icon {
        flex-shrink: 0;
        width: 40px;
        height: 40px;
        border-radius: 11px;
        background: #ecfdf5;
        color: #15803d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
    }

    .data-info {
        min-width: 0;
    }

    .data-name {
        font-size: 12px;
        font-weight: 700;
        color: #334155;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 350px;
    }

    .data-date {
        display: flex;
        align-items: center;
        margin-top: 5px;
        color: #64748b;
        font-size: 10px;
        font-weight: 500;
    }

    .data-date i {
        color: #15803d;
        font-size: 10px;
    }

    /* ================================
       QUICK ACCESS
    ================================= */

    .quick-card {
        height: 100%;
        min-height: 76px;
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 16px;
        border: 1px solid #e5ebe8;
        background: #fff;
        border-radius: 15px;
        color: #1e293b;
        transition: all .22s ease;
    }

    .quick-card:hover {
        transform: translateY(-3px);
        border-color: #b7d8c5;
        box-shadow: 0 10px 22px rgba(15,23,42,.06);
        color: #166534;
    }

    .quick-icon {
        flex-shrink: 0;
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #ecfdf5;
        color: #15803d;
        font-size: 19px;
    }

    .quick-title {
        font-size: 12px;
        font-weight: 800;
        margin-bottom: 4px;
    }

    .quick-text {
        color: #94a3b8;
        font-size: 10px;
    }

    /* ================================
       EMPTY
    ================================= */

    .empty-state {
        text-align: center;
        padding: 30px 10px;
        color: #94a3b8;
    }

    .empty-state i {
        display: block;
        margin-bottom: 10px;
        font-size: 30px;
    }

    .empty-state p {
        font-size: 11px;
        margin: 0;
    }

    /* ================================
       RESPONSIVE
    ================================= */

    @media (max-width: 991px) {

        .hero-title {
            font-size: 25px;
        }

        .data-name {
            max-width: 260px;
        }
    }

    @media (max-width: 768px) {

        .dashboard-hero {
            padding: 27px 22px;
        }

        .hero-title {
            font-size: 22px;
        }

        .hero-description {
            font-size: 12px;
        }

        .hero-date {
            font-size: 11px;
        }

        .stat-card {
            padding: 20px;
        }

        .stat-number {
            font-size: 27px;
        }

        .data-name {
            max-width: 200px;
        }
    }

    @media (max-width: 576px) {

        .dashboard-hero {
            border-radius: 17px;
            padding: 23px 18px;
        }

        .hero-label {
            font-size: 10px;
        }

        .hero-title {
            font-size: 20px;
        }

        .hero-description {
            font-size: 11px;
            line-height: 1.6;
        }

        .hero-date {
            width: 100%;
            justify-content: center;
            font-size: 10px;
        }

        .section-title {
            font-size: 15px;
        }

        .panel-header {
            padding: 16px;
        }

        .panel-body {
            padding: 17px;
        }

        .data-name {
            max-width: 155px;
        }

        .data-item {
            gap: 8px;
        }

        .quick-card {
            min-height: 70px;
        }
    }
</style>

<div class="dashboard-wrapper">

```
{{-- =========================================
     HERO
========================================== --}}

<div class="dashboard-hero">

    <div class="hero-content">

        <div class="hero-label">
            <i class="bi bi-speedometer2 me-1"></i>
            Admin Dashboard
        </div>

        <div class="hero-title">
            Selamat Datang, {{ Auth::user()->name ?? 'Administrator' }} 👋
        </div>

        <p class="hero-description">
            Kelola seluruh informasi Portal MAPALA Giril Lokal Paksi
            melalui satu dashboard. Pantau anggota, berita, kegiatan,
            galeri, pengurus, pendaftaran, dan pesan pengunjung.
        </p>

        {{-- TANGGAL HARI INI --}}
        <div class="hero-date">
            <i class="bi bi-calendar3 me-2"></i>

            {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
        </div>

    </div>

</div>


{{-- =========================================
     STATISTIK UTAMA
========================================== --}}

<div class="row g-3">

    {{-- Anggota --}}
    <div class="col-12 col-sm-6 col-xl-3">

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon green">
                    <i class="bi bi-people-fill"></i>
                </div>

            </div>

            <div class="stat-label">
                Total Anggota
            </div>

            <div class="stat-number">
                {{ $jumlahAnggota ?? 0 }}
            </div>

            <a
                href="{{ route('admin.anggota.index') }}"
                class="stat-link"
            >
                Kelola anggota
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>

    </div>


    {{-- Berita --}}
    <div class="col-12 col-sm-6 col-xl-3">

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon blue">
                    <i class="bi bi-newspaper"></i>
                </div>

            </div>

            <div class="stat-label">
                Total Berita
            </div>

            <div class="stat-number">
                {{ $jumlahBerita ?? 0 }}
            </div>

            <a
                href="{{ route('admin.berita.index') }}"
                class="stat-link"
            >
                Kelola berita
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>

    </div>


    {{-- Kategori --}}
    <div class="col-12 col-sm-6 col-xl-3">

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon orange">
                    <i class="bi bi-tags-fill"></i>
                </div>

            </div>

            <div class="stat-label">
                Kategori Berita
            </div>

            <div class="stat-number">
                {{ $totalKategoriBerita ?? 0 }}
            </div>

            <a
                href="{{ route('admin.kategori-berita.index') }}"
                class="stat-link"
            >
                Kelola kategori
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>

    </div>


    {{-- Kegiatan --}}
    <div class="col-12 col-sm-6 col-xl-3">

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon purple">
                    <i class="bi bi-calendar-event-fill"></i>
                </div>

            </div>

            <div class="stat-label">
                Total Kegiatan
            </div>

            <div class="stat-number">
                {{ $jumlahKegiatan ?? 0 }}
            </div>

            <a
                href="{{ route('admin.kegiatan.index') }}"
                class="stat-link"
            >
                Kelola kegiatan
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>

    </div>

</div>


{{-- =========================================
     RINGKASAN + PENDAFTARAN
========================================== --}}

<div class="dashboard-section">

    <div class="row g-3">

        {{-- Ringkasan --}}
        <div class="col-12 col-lg-5">

            <div class="dashboard-panel">

                <div class="panel-header">

                    <div>

                        <h5 class="panel-title">
                            Ringkasan Sistem
                        </h5>

                        <div class="section-subtitle">
                            Statistik data portal saat ini
                        </div>

                    </div>

                </div>


                <div class="panel-body">

                    <div class="summary-item">

                        <div class="summary-row">

                            <div class="summary-label">
                                <i class="bi bi-people-fill"></i>
                                Anggota
                            </div>

                            <div class="summary-number">
                                {{ $jumlahAnggota ?? 0 }}
                            </div>

                        </div>

                    </div>


                    <div class="summary-item">

                        <div class="summary-row">

                            <div class="summary-label">
                                <i class="bi bi-newspaper"></i>
                                Berita
                            </div>

                            <div class="summary-number">
                                {{ $jumlahBerita ?? 0 }}
                            </div>

                        </div>

                    </div>


                    <div class="summary-item">

                        <div class="summary-row">

                            <div class="summary-label">
                                <i class="bi bi-tags-fill"></i>
                                Kategori Berita
                            </div>

                            <div class="summary-number">
                                {{ $totalKategoriBerita ?? 0 }}
                            </div>

                        </div>

                    </div>


                    <div class="summary-item">

                        <div class="summary-row">

                            <div class="summary-label">
                                <i class="bi bi-calendar-event-fill"></i>
                                Kegiatan
                            </div>

                            <div class="summary-number">
                                {{ $jumlahKegiatan ?? 0 }}
                            </div>

                        </div>

                    </div>


                    <div class="summary-item">

                        <div class="summary-row">

                            <div class="summary-label">
                                <i class="bi bi-diagram-3-fill"></i>
                                Pengurus
                            </div>

                            <div class="summary-number">
                                {{ $jumlahPengurus ?? 0 }}
                            </div>

                        </div>

                    </div>


                    <div class="summary-item">

                        <div class="summary-row">

                            <div class="summary-label">
                                <i class="bi bi-person-plus-fill"></i>
                                Pendaftaran
                            </div>

                            <div class="summary-number">
                                {{ $jumlahPendaftaran ?? 0 }}
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Pendaftaran --}}
        <div class="col-12 col-lg-7">

            <div class="dashboard-panel">

                <div class="panel-header">

                    <div>

                        <h5 class="panel-title">
                            Pendaftaran Terbaru
                        </h5>

                        <div class="section-subtitle">
                            Data calon anggota terbaru
                        </div>

                    </div>

                    <a href="{{ route('admin.pendaftaran.index') }}">
                        Lihat semua
                    </a>

                </div>


                <div class="panel-body">

                    @if(isset($pendaftaranTerbaru) && $pendaftaranTerbaru->count())

                        <div class="data-list">

                            @foreach($pendaftaranTerbaru as $pendaftaran)

                                <div class="data-item">

                                    <div class="data-left">

                                        <div class="data-icon">
                                            <i class="bi bi-person-plus-fill"></i>
                                        </div>

                                        <div class="data-info">

                                            <div class="data-name">
                                                {{ $pendaftaran->nama ?? 'Pendaftar' }}
                                            </div>

                                            <div class="data-date">

                                                <i class="bi bi-calendar3 me-1"></i>

                                                @if($pendaftaran->created_at)
                                                    {{ $pendaftaran->created_at->translatedFormat('d F Y') }}
                                                @else
                                                    -
                                                @endif

                                            </div>

                                        </div>

                                    </div>


                                    @php
                                        $status = strtolower($pendaftaran->status ?? 'menunggu');
                                    @endphp


                                    @if($status === 'diterima')

                                        <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">
                                            Diterima
                                        </span>

                                    @elseif($status === 'ditolak')

                                        <span class="badge bg-danger-subtle text-danger rounded-pill px-3 py-2">
                                            Ditolak
                                        </span>

                                    @else

                                        <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill px-3 py-2">
                                            Menunggu
                                        </span>

                                    @endif

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div class="empty-state">

                            <i class="bi bi-person-lines-fill"></i>

                            <p>
                                Belum ada data pendaftaran.
                            </p>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =========================================
     BERITA + KEGIATAN
========================================== --}}

<div class="dashboard-section">

    <div class="row g-3">

        {{-- Berita --}}
        <div class="col-12 col-lg-6">

            <div class="dashboard-panel">

                <div class="panel-header">

                    <div>

                        <h5 class="panel-title">
                            Berita Terbaru
                        </h5>

                        <div class="section-subtitle">
                            Publikasi terakhir
                        </div>

                    </div>

                    <a href="{{ route('admin.berita.index') }}">
                        Lihat semua
                    </a>

                </div>


                <div class="panel-body">

                    @if(isset($beritaTerbaru) && $beritaTerbaru->count())

                        <div class="data-list">

                            @foreach($beritaTerbaru as $berita)

                                <div class="data-item">

                                    <div class="data-left">

                                        <div class="data-icon">
                                            <i class="bi bi-newspaper"></i>
                                        </div>

                                        <div class="data-info">

                                            <div class="data-name">
                                                {{ $berita->judul_berita ?? $berita->judul ?? 'Berita' }}
                                            </div>

                                            <div class="data-date">

                                                <i class="bi bi-calendar3 me-1"></i>

                                                @if($berita->created_at)
                                                    {{ $berita->created_at->translatedFormat('d F Y') }}
                                                @else
                                                    -
                                                @endif

                                            </div>

                                        </div>

                                    </div>


                                    @if(isset($berita->status))

                                        <span
                                            class="badge rounded-pill px-3 py-2
                                            {{ strtolower($berita->status) === 'publish'
                                                ? 'bg-success-subtle text-success'
                                                : 'bg-secondary-subtle text-secondary' }}"
                                        >
                                            {{ $berita->status }}
                                        </span>

                                    @endif

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div class="empty-state">

                            <i class="bi bi-newspaper"></i>

                            <p>
                                Belum ada berita.
                            </p>

                        </div>

                    @endif

                </div>

            </div>

        </div>


        {{-- Kegiatan --}}
        <div class="col-12 col-lg-6">

            <div class="dashboard-panel">

                <div class="panel-header">

                    <div>

                        <h5 class="panel-title">
                            Kegiatan Terbaru
                        </h5>

                        <div class="section-subtitle">
                            Agenda kegiatan MAPALA
                        </div>

                    </div>

                    <a href="{{ route('admin.kegiatan.index') }}">
                        Lihat semua
                    </a>

                </div>


                <div class="panel-body">

                    @if(isset($kegiatanTerbaru) && $kegiatanTerbaru->count())

                        <div class="data-list">

                            @foreach($kegiatanTerbaru as $kegiatan)

                                <div class="data-item">

                                    <div class="data-left">

                                        <div class="data-icon">
                                            <i class="bi bi-calendar-event-fill"></i>
                                        </div>

                                        <div class="data-info">

                                            <div class="data-name">
                                                {{ $kegiatan->nama_kegiatan ?? $kegiatan->judul ?? 'Kegiatan' }}
                                            </div>

                                            <div class="data-date">

                                                <i class="bi bi-calendar3 me-1"></i>

                                                @if($kegiatan->created_at)
                                                    {{ $kegiatan->created_at->translatedFormat('d F Y') }}
                                                @else
                                                    -
                                                @endif

                                            </div>

                                        </div>

                                    </div>


                                    @if(isset($kegiatan->status))

                                        <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">
                                            {{ $kegiatan->status }}
                                        </span>

                                    @endif

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div class="empty-state">

                            <i class="bi bi-calendar-event"></i>

                            <p>
                                Belum ada kegiatan.
                            </p>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =========================================
     QUICK ACCESS
========================================== --}}

<div class="dashboard-section">

    <div class="section-heading">

        <div>

            <h5 class="section-title">
                Akses Cepat
            </h5>

            <div class="section-subtitle">
                Kelola data portal dengan cepat
            </div>

        </div>

    </div>


    <div class="row g-3">

        {{-- Anggota --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <a
                href="{{ route('admin.anggota.index') }}"
                class="quick-card"
            >

                <div class="quick-icon">
                    <i class="bi bi-people-fill"></i>
                </div>

                <div>
                    <div class="quick-title">
                        Data Anggota
                    </div>

                    <div class="quick-text">
                        Kelola anggota MAPALA
                    </div>
                </div>

            </a>

        </div>


        {{-- Berita --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <a
                href="{{ route('admin.berita.index') }}"
                class="quick-card"
            >

                <div class="quick-icon">
                    <i class="bi bi-newspaper"></i>
                </div>

                <div>
                    <div class="quick-title">
                        Berita
                    </div>

                    <div class="quick-text">
                        Kelola berita organisasi
                    </div>
                </div>

            </a>

        </div>


        {{-- Kategori --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <a
                href="{{ route('admin.kategori-berita.index') }}"
                class="quick-card"
            >

                <div class="quick-icon">
                    <i class="bi bi-tags-fill"></i>
                </div>

                <div>
                    <div class="quick-title">
                        Kategori Berita
                    </div>

                    <div class="quick-text">
                        Kelola kategori berita
                    </div>
                </div>

            </a>

        </div>


        {{-- Kegiatan --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <a
                href="{{ route('admin.kegiatan.index') }}"
                class="quick-card"
            >

                <div class="quick-icon">
                    <i class="bi bi-calendar-event-fill"></i>
                </div>

                <div>
                    <div class="quick-title">
                        Kegiatan
                    </div>

                    <div class="quick-text">
                        Kelola agenda kegiatan
                    </div>
                </div>

            </a>

        </div>


        {{-- Galeri --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <a
                href="{{ route('admin.galeri.index') }}"
                class="quick-card"
            >

                <div class="quick-icon">
                    <i class="bi bi-images"></i>
                </div>

                <div>
                    <div class="quick-title">
                        Galeri
                    </div>

                    <div class="quick-text">
                        Kelola foto kegiatan
                    </div>
                </div>

            </a>

        </div>


        {{-- Pengurus --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <a
                href="{{ route('admin.pengurus.index') }}"
                class="quick-card"
            >

                <div class="quick-icon">
                    <i class="bi bi-diagram-3-fill"></i>
                </div>

                <div>
                    <div class="quick-title">
                        Struktur Pengurus
                    </div>

                    <div class="quick-text">
                        Kelola kepengurusan
                    </div>
                </div>

            </a>

        </div>


        {{-- Pesan --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <a
                href="{{ route('admin.pesan.index') }}"
                class="quick-card"
            >

                <div class="quick-icon">
                    <i class="bi bi-chat-left-text-fill"></i>
                </div>

                <div>
                    <div class="quick-title">
                        Pesan
                    </div>

                    <div class="quick-text">
                        Pesan dari pengunjung
                    </div>
                </div>

            </a>

        </div>


        {{-- Pendaftaran --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <a
                href="{{ route('admin.pendaftaran.index') }}"
                class="quick-card"
            >

                <div class="quick-icon">
                    <i class="bi bi-person-plus-fill"></i>
                </div>

                <div>
                    <div class="quick-title">
                        Pendaftaran
                    </div>

                    <div class="quick-text">
                        Kelola calon anggota
                    </div>
                </div>

            </a>

        </div>

    </div>

</div>
```

</div>

@endsection
