@extends('layouts.public')

@section('title', 'Beranda - MAPALA Giril Lokal Paksi')

@section('content')

{{-- HERO --}}
<section class="hero-section">
    <div class="hero-overlay"></div>

    <div class="container position-relative">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-7">

                <span class="hero-badge">
                    <i class="bi bi-compass"></i>
                    MAPALA GIRIL LOKAL PAKSI
                </span>

                <h1 class="hero-title">
                    Menjelajah Alam,
                    <span>Menjaga Lingkungan</span>,
                    Membangun Persaudaraan.
                </h1>

                <p class="hero-text">
                    Portal resmi Mahasiswa Pecinta Alam
                    Giril Lokal Paksi. Tempat berkumpulnya
                    mahasiswa yang memiliki semangat petualangan,
                    kepedulian terhadap alam, dan jiwa persaudaraan.
                </p>

                <div class="hero-buttons">
                    <a href="{{ route('pendaftaran.create') }}"
                       class="btn btn-success btn-lg px-4">
                        <i class="bi bi-person-plus me-2"></i>
                        Gabung Sekarang
                    </a>

                    <a href="#tentang"
                       class="btn btn-outline-light btn-lg px-4">
                        Kenali Kami
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>


{{-- STATISTIK --}}
<section class="statistics-section">
    <div class="container">

        <div class="row g-4">

            <div class="col-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <div class="stat-number">
                        {{ $jumlahAnggota }}
                    </div>

                    <div class="stat-label">
                        Anggota
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-compass-fill"></i>
                    </div>

                    <div class="stat-number">
                        {{ $jumlahKegiatan }}
                    </div>

                    <div class="stat-label">
                        Kegiatan
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-newspaper"></i>
                    </div>

                    <div class="stat-number">
                        {{ $jumlahBerita }}
                    </div>

                    <div class="stat-label">
                        Berita
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-person-check-fill"></i>
                    </div>

                    <div class="stat-number">
                        {{ $jumlahPendaftar }}
                    </div>

                    <div class="stat-label">
                        Pendaftar
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>


{{-- TENTANG --}}
<section id="tentang" class="section-padding">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <div class="section-label">
                    TENTANG KAMI
                </div>

                <h2 class="section-title">
                    Mengenal
                    <span>Giril Lokal Paksi</span>
                </h2>

                <p class="section-text">
                    MAPALA Giril Lokal Paksi merupakan wadah mahasiswa
                    yang memiliki ketertarikan terhadap kegiatan alam
                    bebas, petualangan, lingkungan hidup, dan
                    pengembangan karakter.
                </p>

                <p class="section-text">
                    Melalui berbagai kegiatan seperti pendakian,
                    ekspedisi, pendidikan dasar, konservasi,
                    bakti sosial, dan kegiatan lingkungan,
                    kami membangun semangat kebersamaan sekaligus
                    meningkatkan kepedulian terhadap alam.
                </p>

                <div class="row mt-4">

                    <div class="col-6">
                        <div class="feature-item">
                            <i class="bi bi-mountain"></i>
                            <span>Petualangan</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="feature-item">
                            <i class="bi bi-tree"></i>
                            <span>Konservasi</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="feature-item">
                            <i class="bi bi-people"></i>
                            <span>Persaudaraan</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="feature-item">
                            <i class="bi bi-heart"></i>
                            <span>Kepedulian</span>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="about-box">

                    <div class="about-icon">
                        <i class="bi bi-compass"></i>
                    </div>

                    <h3>
                        Satu Langkah,
                        Satu Perjalanan
                    </h3>

                    <p>
                        Alam mengajarkan kita tentang keberanian,
                        kesabaran, kerja sama dan tanggung jawab.
                        Di sinilah perjalanan itu dimulai.
                    </p>

                    <div class="about-line"></div>

                    <small>
                        MAPALA GIRIL LOKAL PAKSI
                    </small>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- KEGIATAN --}}
<section class="section-padding section-light">

    <div class="container">

        <div class="section-heading">

            <div>
                <div class="section-label">
                    AKTIVITAS KAMI
                </div>

                <h2 class="section-title">
                    Kegiatan <span>Terbaru</span>
                </h2>
            </div>

        </div>

        <div class="row g-4">

            @forelse($kegiatan as $item)

                <div class="col-md-6 col-lg-4">

                    <div class="activity-card">

                        @if($item->gambar)
                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                alt="{{ $item->nama_kegiatan }}"
                            >
                        @else
                            <div class="activity-placeholder">
                                <i class="bi bi-image"></i>
                            </div>
                        @endif

                        <div class="activity-body">

                            <div class="activity-date">
                                <i class="bi bi-calendar3"></i>

                                {{ $item->tanggal
                                    ? $item->tanggal->format('d M Y')
                                    : '-' }}
                            </div>

                            <h3>
                                {{ $item->nama_kegiatan }}
                            </h3>

                            <p>
                                <i class="bi bi-geo-alt"></i>
                                {{ $item->lokasi }}
                            </p>

                            <span class="status-badge">
                                {{ $item->status }}
                            </span>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="empty-state">
                        <i class="bi bi-calendar-x"></i>
                        <h4>Belum ada kegiatan</h4>
                        <p>
                            Data kegiatan akan ditampilkan
                            di halaman ini.
                        </p>
                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- BERITA --}}
<section class="section-padding">

    <div class="container">

        <div class="section-heading">

            <div>
                <div class="section-label">
                    INFORMASI
                </div>

                <h2 class="section-title">
                    Berita <span>Terbaru</span>
                </h2>
            </div>

        </div>

        <div class="row g-4">

            @forelse($berita as $item)

                <div class="col-md-6 col-lg-4">

                    <article class="news-card">

                        @if($item->gambar)

                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                alt="{{ $item->judul }}"
                            >

                        @else

                            <div class="news-placeholder">
                                <i class="bi bi-newspaper"></i>
                            </div>

                        @endif

                        <div class="news-body">

                            @if($item->kategori)

                                <span class="news-category">
                                    {{ $item->kategori->nama_kategori }}
                                </span>

                            @endif

                            <h3>
                                {{ $item->judul }}
                            </h3>

                            <div class="news-meta">

                                <span>
                                    <i class="bi bi-calendar3"></i>

                                    {{ $item->published_at
                                        ? $item->published_at->format('d M Y')
                                        : '-' }}
                                </span>

                            </div>

                            <p>
                                {{ \Illuminate\Support\Str::limit(
                                    strip_tags($item->isi),
                                    120
                                ) }}
                            </p>

                        </div>

                    </article>

                </div>

            @empty

                <div class="col-12">

                    <div class="empty-state">
                        <i class="bi bi-newspaper"></i>

                        <h4>
                            Belum ada berita
                        </h4>

                        <p>
                            Berita terbaru akan ditampilkan
                            di halaman ini.
                        </p>
                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- GALERI --}}
<section class="section-padding section-dark">

    <div class="container">

        <div class="section-heading text-white">

            <div>

                <div class="section-label light">
                    DOKUMENTASI
                </div>

                <h2 class="section-title text-white">
                    Galeri <span>Giril Lokal Paksi</span>
                </h2>

            </div>

        </div>

        <div class="row g-3">

            @forelse($galeri as $item)

                <div class="col-6 col-md-4 col-lg-3">

                    <div class="gallery-card">

                        @if($item->foto)

                            <img
                                src="{{ asset('storage/' . $item->foto) }}"
                                alt="{{ $item->judul }}"
                            >

                        @else

                            <div class="gallery-placeholder">
                                <i class="bi bi-image"></i>
                            </div>

                        @endif

                        <div class="gallery-overlay">

                            <h5>
                                {{ $item->judul }}
                            </h5>

                            @if($item->kegiatan)
                                <small>
                                    {{ $item->kegiatan->nama_kegiatan }}
                                </small>
                            @endif

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="empty-state dark">
                        <i class="bi bi-images"></i>

                        <h4>
                            Belum ada dokumentasi
                        </h4>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- PENGURUS --}}
<section class="section-padding">

    <div class="container">

        <div class="text-center mb-5">

            <div class="section-label">
                ORGANISASI
            </div>

            <h2 class="section-title">
                Struktur <span>Pengurus</span>
            </h2>

            <p class="section-description">
                Orang-orang yang menjalankan roda organisasi
                MAPALA Giril Lokal Paksi.
            </p>

        </div>

        <div class="row g-4 justify-content-center">

            @forelse($pengurus as $item)

                <div class="col-6 col-md-4 col-lg-2">

                    <div class="member-card">

                        @if($item->foto)

                            <img
                                src="{{ asset('storage/' . $item->foto) }}"
                                alt="{{ $item->nama }}"
                            >

                        @else

                            <div class="member-placeholder">
                                <i class="bi bi-person-fill"></i>
                            </div>

                        @endif

                        <h5>
                            {{ $item->nama }}
                        </h5>

                        <div class="member-position">
                            {{ $item->jabatan }}
                        </div>

                        <small>
                            {{ $item->periode }}
                        </small>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="empty-state">
                        <i class="bi bi-people"></i>

                        <h4>
                            Belum ada data pengurus
                        </h4>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- CTA --}}
<section class="cta-section">

    <div class="container">

        <div class="cta-box">

            <div>

                <div class="section-label light">
                    JADILAH BAGIAN DARI KAMI
                </div>

                <h2>
                    Siap memulai perjalananmu
                    bersama Giril Lokal Paksi?
                </h2>

                <p>
                    Bergabunglah bersama keluarga besar
                    MAPALA Giril Lokal Paksi dan temukan
                    pengalaman baru di alam bebas.
                </p>

            </div>

            <div>

                <a href="{{ route('pendaftaran.create') }}"
                   class="btn btn-light btn-lg px-4">

                    <i class="bi bi-person-plus me-2"></i>
                    Daftar Anggota

                </a>

            </div>

        </div>

    </div>

</section>

@endsection


@push('styles')

<style>

    :root {
        --green-dark: #0b2e1d;
        --green: #166534;
        --green-light: #22c55e;
        --cream: #f6f7f2;
        --text: #1f2937;
    }

    body {
        background: #fff;
        color: var(--text);
    }

    .min-vh-75 {
        min-height: 75vh;
    }

    /* HERO */

    .hero-section {
        position: relative;
        min-height: 76vh;
        display: flex;
        align-items: center;
        background:
            linear-gradient(
                90deg,
                rgba(3, 20, 12, .92),
                rgba(3, 20, 12, .65),
                rgba(3, 20, 12, .25)
            ),
            url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=2000&q=85')
            center/cover no-repeat;
        overflow: hidden;
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background:
            radial-gradient(
                circle at 80% 30%,
                rgba(34, 197, 94, .15),
                transparent 40%
            );
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 16px;
        border-radius: 50px;
        background: rgba(255,255,255,.12);
        border: 1px solid rgba(255,255,255,.25);
        color: #fff;
        font-size: .8rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        margin-bottom: 22px;
    }

    .hero-title {
        color: #fff;
        font-size: clamp(2.5rem, 5vw, 5rem);
        line-height: 1.05;
        font-weight: 800;
        max-width: 850px;
        margin-bottom: 25px;
    }

    .hero-title span {
        color: #86efac;
    }

    .hero-text {
        color: rgba(255,255,255,.82);
        font-size: 1.08rem;
        line-height: 1.8;
        max-width: 680px;
        margin-bottom: 32px;
    }

    .hero-buttons {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    /* STATISTICS */

    .statistics-section {
        margin-top: -55px;
        position: relative;
        z-index: 5;
    }

    .stat-card {
        background: #fff;
        border-radius: 18px;
        padding: 25px 15px;
        text-align: center;
        box-shadow: 0 15px 45px rgba(0,0,0,.10);
        height: 100%;
        border: 1px solid #eef1ed;
    }

    .stat-icon {
        width: 52px;
        height: 52px;
        margin: auto auto 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #dcfce7;
        color: var(--green);
        border-radius: 14px;
        font-size: 1.35rem;
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 800;
        color: var(--green-dark);
    }

    .stat-label {
        color: #6b7280;
        font-size: .9rem;
    }

    /* GENERAL */

    .section-padding {
        padding: 100px 0;
    }

    .section-light {
        background: #f6f8f4;
    }

    .section-dark {
        background: var(--green-dark);
    }

    .section-label {
        color: var(--green);
        font-weight: 800;
        font-size: .78rem;
        letter-spacing: 2px;
        margin-bottom: 10px;
    }

    .section-label.light {
        color: #86efac;
    }

    .section-title {
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 800;
        color: var(--green-dark);
        margin-bottom: 20px;
    }

    .section-title span {
        color: var(--green);
    }

    .section-description {
        max-width: 650px;
        margin: auto;
        color: #6b7280;
    }

    .section-heading {
        display: flex;
        justify-content: space-between;
        align-items: end;
        margin-bottom: 45px;
    }

    .section-text {
        color: #6b7280;
        line-height: 1.8;
    }

    /* ABOUT */

    .feature-item {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
        font-weight: 700;
    }

    .feature-item i {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #dcfce7;
        color: var(--green);
        border-radius: 10px;
    }

    .about-box {
        background:
            linear-gradient(
                145deg,
                #0b2e1d,
                #166534
            );
        color: #fff;
        border-radius: 30px;
        padding: 55px;
        min-height: 420px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        box-shadow: 0 25px 60px rgba(11,46,29,.20);
    }

    .about-icon {
        width: 70px;
        height: 70px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,.12);
        font-size: 2rem;
        margin-bottom: 25px;
    }

    .about-box h3 {
        font-size: 2rem;
        font-weight: 800;
    }

    .about-box p {
        color: rgba(255,255,255,.75);
        line-height: 1.8;
    }

    .about-line {
        width: 70px;
        height: 3px;
        background: #86efac;
        margin: 25px 0;
    }

    .about-box small {
        letter-spacing: 2px;
        font-weight: 700;
    }

    /* ACTIVITY */

    .activity-card {
        height: 100%;
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 10px 35px rgba(0,0,0,.07);
        transition: .3s;
    }

    .activity-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 20px 45px rgba(0,0,0,.12);
    }

    .activity-card img,
    .activity-placeholder {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }

    .activity-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e5e7eb;
        color: #9ca3af;
        font-size: 3rem;
    }

    .activity-body {
        padding: 24px;
    }

    .activity-date {
        color: var(--green);
        font-size: .8rem;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .activity-body h3 {
        font-size: 1.2rem;
        font-weight: 800;
        color: #111827;
    }

    .activity-body p {
        color: #6b7280;
        font-size: .9rem;
    }

    .status-badge {
        display: inline-block;
        background: #dcfce7;
        color: #166534;
        padding: 5px 10px;
        border-radius: 50px;
        font-size: .75rem;
        font-weight: 700;
    }

    /* NEWS */

    .news-card {
        height: 100%;
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid #edf0ec;
        transition: .3s;
    }

    .news-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 45px rgba(0,0,0,.08);
    }

    .news-card img,
    .news-placeholder {
        width: 100%;
        height: 210px;
        object-fit: cover;
    }

    .news-placeholder {
        background: #e5e7eb;
        color: #9ca3af;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
    }

    .news-body {
        padding: 25px;
    }

    .news-category {
        display: inline-block;
        color: var(--green);
        font-size: .75rem;
        font-weight: 800;
        margin-bottom: 12px;
        text-transform: uppercase;
    }

    .news-body h3 {
        font-size: 1.25rem;
        font-weight: 800;
        line-height: 1.4;
        margin-bottom: 10px;
    }

    .news-body p {
        color: #6b7280;
        line-height: 1.7;
        font-size: .9rem;
    }

    .news-meta {
        color: #9ca3af;
        font-size: .8rem;
        margin-bottom: 10px;
    }

    /* GALLERY */

    .gallery-card {
        height: 260px;
        border-radius: 14px;
        overflow: hidden;
        position: relative;
        background: #173c29;
    }

    .gallery-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: .5s;
    }

    .gallery-card:hover img {
        transform: scale(1.08);
    }

    .gallery-overlay {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        padding: 25px 18px 18px;
        background: linear-gradient(
            transparent,
            rgba(0,0,0,.8)
        );
        color: #fff;
    }

    .gallery-overlay h5 {
        margin: 0;
        font-weight: 700;
        font-size: .95rem;
    }

    .gallery-overlay small {
        color: rgba(255,255,255,.7);
    }

    .gallery-placeholder {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgba(255,255,255,.3);
        font-size: 3rem;
    }

    /* MEMBER */

    .member-card {
        text-align: center;
    }

    .member-card img,
    .member-placeholder {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        object-fit: cover;
        margin: auto auto 18px;
        border: 5px solid #e5f4e8;
    }

    .member-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e5f4e8;
        color: var(--green);
        font-size: 2.5rem;
    }

    .member-card h5 {
        font-weight: 800;
        font-size: 1rem;
        margin-bottom: 4px;
    }

    .member-position {
        color: var(--green);
        font-weight: 700;
        font-size: .8rem;
    }

    .member-card small {
        color: #9ca3af;
        font-size: .75rem;
    }

    /* CTA */

    .cta-section {
        padding: 80px 0;
        background: #f6f8f4;
    }

    .cta-box {
        background:
            linear-gradient(
                120deg,
                #0b2e1d,
                #166534
            );
        border-radius: 28px;
        padding: 55px;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 30px;
    }

    .cta-box h2 {
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 800;
        max-width: 700px;
    }

    .cta-box p {
        color: rgba(255,255,255,.72);
        max-width: 650px;
        line-height: 1.7;
    }

    /* EMPTY */

    .empty-state {
        background: #fff;
        border-radius: 18px;
        padding: 60px 20px;
        text-align: center;
        color: #6b7280;
    }

    .empty-state i {
        font-size: 3rem;
        color: #9ca3af;
    }

    .empty-state h4 {
        color: #374151;
        margin-top: 15px;
        font-weight: 800;
    }

    .empty-state.dark {
        background: rgba(255,255,255,.05);
        color: rgba(255,255,255,.6);
    }

    .empty-state.dark h4 {
        color: #fff;
    }

    /* RESPONSIVE */

    @media (max-width: 768px) {

        .hero-section {
            min-height: 90vh;
        }

        .hero-title {
            font-size: 2.7rem;
        }

        .statistics-section {
            margin-top: -30px;
        }

        .section-padding {
            padding: 70px 0;
        }

        .about-box {
            padding: 35px;
        }

        .section-heading {
            display: block;
        }

        .cta-box {
            padding: 35px;
            flex-direction: column;
            align-items: flex-start;
        }

        .gallery-card {
            height: 200px;
        }

    }

</style>

@endpush