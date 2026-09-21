@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

<style>
    .dashboard-page {
        color: #1d2b25;
    }

    /* HERO */
    .welcome-card {
        background: linear-gradient(135deg, #123b2a 0%, #1f6749 100%);
        border-radius: 22px;
        padding: 35px 38px;
        color: white;
        margin-bottom: 28px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(18, 59, 42, .16);
    }

    .welcome-card::after {
        content: "";
        position: absolute;
        width: 260px;
        height: 260px;
        border-radius: 50%;
        background: rgba(255,255,255,.06);
        right: -80px;
        top: -100px;
    }

    .welcome-card::before {
        content: "";
        position: absolute;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: rgba(255,255,255,.04);
        right: 150px;
        bottom: -100px;
    }

    .welcome-content {
        position: relative;
        z-index: 2;
    }

    .welcome-small {
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        opacity: .8;
        margin-bottom: 10px;
    }

    .welcome-title {
        font-size: 32px;
        line-height: 1.25;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .welcome-text {
        font-size: 15px;
        line-height: 1.7;
        max-width: 700px;
        color: rgba(255,255,255,.82);
        margin-bottom: 18px;
    }

    .date-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 15px;
        border-radius: 30px;
        background: rgba(255,255,255,.12);
        border: 1px solid rgba(255,255,255,.12);
        font-size: 13px;
    }


    /* STATISTIK */
    .stat-card {
        background: white;
        border: 1px solid #e8eeeb;
        border-radius: 18px;
        padding: 25px;
        height: 100%;
        box-shadow: 0 5px 20px rgba(0,0,0,.04);
        transition: .25s ease;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(0,0,0,.08);
    }

    .stat-icon {
        width: 58px;
        height: 58px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        margin-bottom: 20px;
    }

    .stat-icon.green {
        background: #e5f5ec;
        color: #198754;
    }

    .stat-icon.blue {
        background: #e8f1ff;
        color: #0d6efd;
    }

    .stat-icon.orange {
        background: #fff1df;
        color: #fd7e14;
    }

    .stat-icon.purple {
        background: #f0e9ff;
        color: #6f42c1;
    }

    .stat-label {
        color: #74817b;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 6px;
    }

    .stat-number {
        color: #17251f;
        font-size: 34px;
        line-height: 1;
        font-weight: 800;
    }

    .stat-description {
        margin-top: 12px;
        color: #8b9691;
        font-size: 12px;
    }


    /* PANEL */
    .content-card {
        background: white;
        border: 1px solid #e8eeeb;
        border-radius: 18px;
        box-shadow: 0 5px 20px rgba(0,0,0,.04);
        overflow: hidden;
        height: 100%;
    }

    .content-header {
        padding: 22px 25px;
        border-bottom: 1px solid #edf1ef;
    }

    .content-title {
        font-size: 18px;
        font-weight: 800;
        color: #1b2923;
        margin: 0;
    }

    .content-subtitle {
        color: #89958f;
        font-size: 13px;
        margin-top: 5px;
        margin-bottom: 0;
    }

    .content-body {
        padding: 25px;
    }


    /* QUICK STAT */
    .summary-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 0;
        border-bottom: 1px solid #edf1ef;
    }

    .summary-item:last-child {
        border-bottom: 0;
    }

    .summary-left {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .summary-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: #e8f5ee;
        color: #198754;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .summary-name {
        font-size: 14px;
        font-weight: 700;
        color: #36443e;
    }

    .summary-info {
        font-size: 11px;
        color: #909b96;
        margin-top: 2px;
    }

    .summary-number {
        font-size: 18px;
        font-weight: 800;
        color: #1d2b25;
    }


    /* PENDAFTARAN */
    .registration-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 16px 0;
        border-bottom: 1px solid #edf1ef;
    }

    .registration-item:last-child {
        border-bottom: 0;
    }

    .avatar {
        width: 46px;
        height: 46px;
        min-width: 46px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e5f5ec;
        color: #198754;
        font-size: 15px;
        font-weight: 800;
    }

    .registration-name {
        font-size: 14px;
        font-weight: 700;
        color: #293630;
    }

    .registration-email {
        font-size: 12px;
        color: #8d9893;
        margin-top: 3px;
    }

    .registration-date {
        margin-left: auto;
        color: #89958f;
        font-size: 12px;
        white-space: nowrap;
    }

    .empty-box {
        text-align: center;
        padding: 40px 15px;
        color: #89958f;
    }

    .empty-box i {
        font-size: 42px;
        opacity: .5;
        margin-bottom: 12px;
    }


    /* STATUS */
    .status-box {
        background: #f8faf9;
        border-radius: 14px;
        padding: 17px;
        margin-bottom: 15px;
    }

    .status-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 9px;
    }

    .status-title {
        font-size: 13px;
        font-weight: 700;
        color: #34423c;
    }

    .status-number {
        font-size: 13px;
        font-weight: 800;
        color: #198754;
    }

    .custom-progress {
        height: 8px;
        border-radius: 20px;
        background: #e5ebe8;
        overflow: hidden;
    }

    .custom-progress-bar {
        height: 100%;
        border-radius: 20px;
        background: linear-gradient(90deg, #198754, #52ad7e);
    }


    /* AKSES CEPAT */
    .quick-card {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 18px;
        border-radius: 15px;
        border: 1px solid #e8eeeb;
        text-decoration: none;
        color: #26342e;
        height: 100%;
        transition: .2s;
    }

    .quick-card:hover {
        background: #f7fbf8;
        border-color: #a9d4bd;
        color: #198754;
        transform: translateY(-2px);
    }

    .quick-icon {
        width: 46px;
        height: 46px;
        min-width: 46px;
        border-radius: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e7f5ed;
        color: #198754;
        font-size: 20px;
    }

    .quick-title {
        font-size: 14px;
        font-weight: 700;
    }

    .quick-text {
        font-size: 12px;
        color: #8a9690;
        margin-top: 4px;
    }


    /* RESPONSIVE */
    @media(max-width: 768px) {

        .welcome-card {
            padding: 25px;
            border-radius: 18px;
        }

        .welcome-title {
            font-size: 24px;
        }

        .welcome-text {
            font-size: 13px;
        }

        .stat-card {
            padding: 20px;
        }

        .stat-number {
            font-size: 29px;
        }

        .content-header,
        .content-body {
            padding: 18px;
        }

        .registration-date {
            display: none;
        }

    }
</style>


<div class="dashboard-page">

    {{-- ============================
         HEADER
    ============================= --}}
    <div class="welcome-card">

        <div class="welcome-content">

            <div class="welcome-small">
                <i class="bi bi-speedometer2 me-1"></i>
                Dashboard Administrator
            </div>

            <div class="welcome-title">
                Selamat Datang,
                {{ Auth::user()->name ?? 'Administrator' }} 👋
            </div>

            <p class="welcome-text">
                Kelola data, berita, kegiatan, anggota, dan informasi
                organisasi MAPALA Giril Lokal Paksi melalui halaman
                administrasi ini.
            </p>

            <div class="date-badge">
                <i class="bi bi-calendar3"></i>

                {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('l, d F Y') }}
            </div>

        </div>

    </div>


    {{-- ============================
         STATISTIK UTAMA
    ============================= --}}
    <div class="row g-4 mb-4">

        {{-- ANGGOTA --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-icon green">
                    <i class="bi bi-people-fill"></i>
                </div>

                <div class="stat-label">
                    TOTAL ANGGOTA
                </div>

                <div class="stat-number">
                    {{ $totalAnggota ?? 0 }}
                </div>

                <div class="stat-description">
                    <i class="bi bi-person-check me-1"></i>
                    Data anggota organisasi
                </div>

            </div>

        </div>


        {{-- BERITA --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-icon blue">
                    <i class="bi bi-newspaper"></i>
                </div>

                <div class="stat-label">
                    TOTAL BERITA
                </div>

                <div class="stat-number">
                    {{ $totalBerita ?? 0 }}
                </div>

                <div class="stat-description">
                    <i class="bi bi-file-text me-1"></i>
                    Informasi dan publikasi
                </div>

            </div>

        </div>


        {{-- KEGIATAN --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-icon orange">
                    <i class="bi bi-calendar-event-fill"></i>
                </div>

                <div class="stat-label">
                    TOTAL KEGIATAN
                </div>

                <div class="stat-number">
                    {{ $totalKegiatan ?? 0 }}
                </div>

                <div class="stat-description">
                    <i class="bi bi-calendar-check me-1"></i>
                    Agenda organisasi
                </div>

            </div>

        </div>


        {{-- PENGURUS --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-icon purple">
                    <i class="bi bi-diagram-3-fill"></i>
                </div>

                <div class="stat-label">
                    TOTAL PENGURUS
                </div>

                <div class="stat-number">
                    {{ $totalPengurus ?? 0 }}
                </div>

                <div class="stat-description">
                    <i class="bi bi-person-badge me-1"></i>
                    Struktur organisasi
                </div>

            </div>

        </div>

    </div>


    {{-- ============================
         RINGKASAN + STATUS
    ============================= --}}
    <div class="row g-4 mb-4">

        {{-- RINGKASAN --}}
        <div class="col-lg-7">

            <div class="content-card">

                <div class="content-header">

                    <h5 class="content-title">
                        <i class="bi bi-bar-chart-line-fill text-success me-2"></i>
                        Ringkasan Portal
                    </h5>

                    <p class="content-subtitle">
                        Informasi jumlah data yang tersedia di sistem.
                    </p>

                </div>

                <div class="content-body">

                    <div class="summary-item">

                        <div class="summary-left">

                            <div class="summary-icon">
                                <i class="bi bi-people-fill"></i>
                            </div>

                            <div>

                                <div class="summary-name">
                                    Anggota
                                </div>

                                <div class="summary-info">
                                    Seluruh anggota terdaftar
                                </div>

                            </div>

                        </div>

                        <div class="summary-number">
                            {{ $totalAnggota ?? 0 }}
                        </div>

                    </div>


                    <div class="summary-item">

                        <div class="summary-left">

                            <div class="summary-icon">
                                <i class="bi bi-newspaper"></i>
                            </div>

                            <div>

                                <div class="summary-name">
                                    Berita
                                </div>

                                <div class="summary-info">
                                    Informasi organisasi
                                </div>

                            </div>

                        </div>

                        <div class="summary-number">
                            {{ $totalBerita ?? 0 }}
                        </div>

                    </div>


                    <div class="summary-item">

                        <div class="summary-left">

                            <div class="summary-icon">
                                <i class="bi bi-calendar-event"></i>
                            </div>

                            <div>

                                <div class="summary-name">
                                    Kegiatan
                                </div>

                                <div class="summary-info">
                                    Agenda dan kegiatan MAPALA
                                </div>

                            </div>

                        </div>

                        <div class="summary-number">
                            {{ $totalKegiatan ?? 0 }}
                        </div>

                    </div>


                    <div class="summary-item">

                        <div class="summary-left">

                            <div class="summary-icon">
                                <i class="bi bi-diagram-3"></i>
                            </div>

                            <div>

                                <div class="summary-name">
                                    Pengurus
                                </div>

                                <div class="summary-info">
                                    Struktur kepengurusan
                                </div>

                            </div>

                        </div>

                        <div class="summary-number">
                            {{ $totalPengurus ?? 0 }}
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- STATUS PENDAFTARAN --}}
        <div class="col-lg-5">

            <div class="content-card">

                <div class="content-header">

                    <h5 class="content-title">
                        <i class="bi bi-person-plus-fill text-success me-2"></i>
                        Status Pendaftaran
                    </h5>

                    <p class="content-subtitle">
                        Informasi pendaftaran anggota baru.
                    </p>

                </div>

                <div class="content-body">

                    @php
                        $totalDaftar = $totalPendaftaran ?? 0;
                        $menunggu = $pendaftaranMenunggu ?? 0;

                        $persenMenunggu = $totalDaftar > 0
                            ? ($menunggu / $totalDaftar) * 100
                            : 0;
                    @endphp


                    <div class="status-box">

                        <div class="status-top">

                            <div class="status-title">
                                Pendaftaran Menunggu
                            </div>

                            <div class="status-number">
                                {{ $menunggu }}
                            </div>

                        </div>

                        <div class="custom-progress">

                            <div
                                class="custom-progress-bar"
                                style="width: {{ min($persenMenunggu, 100) }}%;"
                            ></div>

                        </div>

                    </div>


                    <div class="status-box">

                        <div class="status-top">

                            <div class="status-title">
                                Total Pendaftaran
                            </div>

                            <div class="status-number">
                                {{ $totalDaftar }}
                            </div>

                        </div>

                        <div class="custom-progress">

                            <div
                                class="custom-progress-bar"
                                style="width: {{ $totalDaftar > 0 ? 100 : 0 }}%;"
                            ></div>

                        </div>

                    </div>


                    <div
                        class="p-3 rounded-3"
                        style="background:#eaf7ef;"
                    >

                        <div class="d-flex gap-3 align-items-center">

                            <i
                                class="bi bi-info-circle-fill text-success fs-4"
                            ></i>

                            <div>

                                <div class="fw-bold text-success">
                                    Perlu diperiksa
                                </div>

                                <div
                                    class="small"
                                    style="color:#527064;"
                                >
                                    {{ $menunggu }}
                                    pendaftaran menunggu proses.
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ============================
         PENDAFTARAN TERBARU
    ============================= --}}
    <div class="row g-4 mb-4">

        <div class="col-12">

            <div class="content-card">

                <div class="content-header">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h5 class="content-title">
                                <i class="bi bi-person-lines-fill text-success me-2"></i>
                                Pendaftaran Terbaru
                            </h5>

                            <p class="content-subtitle">
                                Daftar anggota yang baru melakukan pendaftaran.
                            </p>

                        </div>

                        @if(Route::has('admin.pendaftaran.index'))

                            <a
                                href="{{ route('admin.pendaftaran.index') }}"
                                class="btn btn-success rounded-pill px-4"
                            >
                                <i class="bi bi-eye me-1"></i>
                                Lihat Semua
                            </a>

                        @endif

                    </div>

                </div>


                <div class="content-body">

                    @if(isset($pendaftaranTerbaru) && $pendaftaranTerbaru->count())

                        @foreach($pendaftaranTerbaru as $pendaftaran)

                            @php
                                $nama = $pendaftaran->nama ?? 'Pendaftar';
                            @endphp

                            <div class="registration-item">

                                <div class="avatar">
                                    {{ strtoupper(substr($nama, 0, 1)) }}
                                </div>

                                <div>

                                    <div class="registration-name">
                                        {{ $nama }}
                                    </div>

                                    <div class="registration-email">

                                        {{ $pendaftaran->email ?? 'Email tidak tersedia' }}

                                    </div>

                                </div>

                                <div class="registration-date">

                                    @if($pendaftaran->created_at)

                                        {{ $pendaftaran->created_at->format('d M Y') }}

                                    @else

                                        -

                                    @endif

                                </div>

                            </div>

                        @endforeach

                    @else

                        <div class="empty-box">

                            <i class="bi bi-inbox d-block"></i>

                            <div class="fw-bold mb-1">
                                Belum ada pendaftaran
                            </div>

                            <div class="small">
                                Data pendaftaran anggota akan muncul di sini.
                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>


    {{-- ============================
         AKSES CEPAT
    ============================= --}}
    <div class="row g-4">

        <div class="col-12">

            <div class="content-card">

                <div class="content-header">

                    <h5 class="content-title">
                        <i class="bi bi-lightning-charge-fill text-warning me-2"></i>
                        Akses Cepat
                    </h5>

                    <p class="content-subtitle">
                        Pilih menu yang ingin Anda kelola.
                    </p>

                </div>


                <div class="content-body">

                    <div class="row g-3">

                        <div class="col-12 col-md-6 col-xl-3">

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
                                        Kelola data anggota MAPALA
                                    </div>

                                </div>

                            </a>

                        </div>


                        <div class="col-12 col-md-6 col-xl-3">

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


                        <div class="col-12 col-md-6 col-xl-3">

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


                        <div class="col-12 col-md-6 col-xl-3">

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
                                        Kelola struktur organisasi
                                    </div>

                                </div>

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection