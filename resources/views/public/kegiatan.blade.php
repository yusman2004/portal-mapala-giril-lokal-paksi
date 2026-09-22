@extends('layouts.public')

@section('title', 'Kegiatan - MAPALA Giril Lokal Paksi')

@section('content')

{{-- HERO HALAMAN --}}
<section class="activity-hero">
    <div class="container">
        <div class="hero-content">
            <span class="hero-label">
                <i class="bi bi-compass me-2"></i>
                KEGIATAN MAPALA
            </span>

            <h1>Aktivitas & Petualangan Kami</h1>

            <p>
                Jelajahi berbagai kegiatan, ekspedisi,
                dan aksi nyata MAPALA Giril Lokal Paksi
                dalam menjaga alam dan membangun persaudaraan.
            </p>

            <div class="hero-line"></div>
        </div>
    </div>
</section>


{{-- DAFTAR KEGIATAN --}}
<section class="activity-section">

    <div class="container">

        {{-- JUDUL SECTION --}}
        <div class="section-heading text-center mb-5">

            <span class="section-label">
                <i class="bi bi-mountains me-2"></i>
                JEJAK PERJALANAN
            </span>

            <h2>Kegiatan Kami</h2>

            <p>
                Dokumentasi berbagai aktivitas dan perjalanan
                yang telah dilakukan bersama.
            </p>

        </div>


        <div class="row g-4">

            @forelse($kegiatan as $item)

                <div class="col-md-6 col-lg-4">

                    <article class="activity-card">

                        {{-- GAMBAR --}}
                        <div class="activity-image-wrapper">

                            @if($item->gambar)

                                <img
                                    src="{{ asset('storage/' . $item->gambar) }}"
                                    alt="{{ $item->nama_kegiatan }}"
                                    class="activity-image"
                                    loading="lazy"
                                >

                            @else

                                <div class="activity-placeholder">
                                    <i class="bi bi-image"></i>
                                    <span>Belum ada gambar</span>
                                </div>

                            @endif


                            {{-- STATUS --}}
                            @if($item->status)

                                <div class="activity-status">
                                    <i class="bi bi-check-circle-fill me-1"></i>
                                    {{ $item->status }}
                                </div>

                            @endif

                        </div>


                        {{-- KONTEN CARD --}}
                        <div class="activity-content">

                            {{-- TANGGAL --}}
                            <div class="activity-date">

                                <i class="bi bi-calendar-event me-2"></i>

                                {{ $item->tanggal
                                    ? \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y')
                                    : 'Tanggal belum ditentukan'
                                }}

                            </div>


                            {{-- JUDUL --}}
                            <h3 class="activity-title">
                                {{ $item->nama_kegiatan }}
                            </h3>


                            {{-- LOKASI --}}
                            <div class="activity-location">

                                <i class="bi bi-geo-alt-fill me-2"></i>

                                <span>
                                    {{ $item->lokasi ?: 'Lokasi belum ditentukan' }}
                                </span>

                            </div>


                            {{-- DESKRIPSI --}}
                            @if($item->deskripsi)

                                <p class="activity-description">

                                    {{ \Illuminate\Support\Str::limit(
                                        strip_tags($item->deskripsi),
                                        125
                                    ) }}

                                </p>

                            @else

                                <p class="activity-description text-muted">
                                    Informasi kegiatan akan segera diperbarui.
                                </p>

                            @endif


                            {{-- FOOTER CARD --}}
                            <div class="activity-footer">

                                <span class="activity-category">
                                    <i class="bi bi-tree-fill me-1"></i>
                                    MAPALA
                                </span>

                                <span class="activity-arrow">
                                    <i class="bi bi-arrow-up-right"></i>
                                </span>

                            </div>

                        </div>

                    </article>

                </div>

            @empty

                {{-- DATA KOSONG --}}
                <div class="col-12">

                    <div class="empty-activity">

                        <div class="empty-icon">
                            <i class="bi bi-calendar2-x"></i>
                        </div>

                        <h3>Belum Ada Kegiatan</h3>

                        <p>
                            Dokumentasi kegiatan MAPALA akan
                            ditampilkan di halaman ini.
                        </p>

                        <a href="{{ route('home') }}" class="btn btn-success">
                            <i class="bi bi-house me-2"></i>
                            Kembali ke Beranda
                        </a>

                    </div>

                </div>

            @endforelse

        </div>


        {{-- PAGINATION --}}
        @if(method_exists($kegiatan, 'links'))

            <div class="activity-pagination mt-5">

                {{ $kegiatan->onEachSide(1)->links() }}

            </div>

        @endif

    </div>

</section>


{{-- CALL TO ACTION --}}
<section class="activity-cta">

    <div class="container">

        <div class="cta-content text-center">

            <span class="section-label light">
                BERGABUNG BERSAMA KAMI
            </span>

            <h2>
                Siap Memulai Petualangan?
            </h2>

            <p>
                Jadilah bagian dari keluarga besar
                MAPALA Giril Lokal Paksi.
            </p>

            <a href="{{ route('pendaftaran.create') }}" class="btn-cta">

                <i class="bi bi-person-plus-fill me-2"></i>
                Daftar Menjadi Anggota

            </a>

        </div>

    </div>

</section>


@push('styles')

<style>

/* =========================================
   HERO
========================================= */

.activity-hero {
    position: relative;
    min-height: 390px;
    display: flex;
    align-items: center;
    padding: 130px 0 90px;
    background:
        linear-gradient(
            115deg,
            rgba(7, 40, 27, .96),
            rgba(18, 83, 54, .78)
        ),
        url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1800&q=85')
        center/cover;
    color: #ffffff;
    overflow: hidden;
}

.activity-hero::after {
    content: "";
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 100%;
    height: 65px;
    background: #f7f9f7;
    clip-path: polygon(0 100%, 100% 0, 100% 100%);
}

.hero-content {
    position: relative;
    z-index: 2;
    max-width: 700px;
}

.hero-label {
    display: inline-flex;
    align-items: center;
    padding: 9px 17px;
    border: 1px solid rgba(255,255,255,.35);
    border-radius: 50px;
    background: rgba(255,255,255,.10);
    color: #d9f99d;
    font-size: .75rem;
    font-weight: 800;
    letter-spacing: 2px;
}

.activity-hero h1 {
    margin: 22px 0 15px;
    font-size: clamp(2.2rem, 5vw, 4rem);
    font-weight: 900;
    line-height: 1.1;
    letter-spacing: -1px;
}

.activity-hero p {
    max-width: 570px;
    margin: 0;
    color: rgba(255,255,255,.82);
    font-size: 1.05rem;
    line-height: 1.8;
}

.hero-line {
    width: 75px;
    height: 4px;
    margin-top: 25px;
    border-radius: 10px;
    background: #a3e635;
}


/* =========================================
   SECTION
========================================= */

.activity-section {
    padding: 85px 0;
    background: #f7f9f7;
}

.section-heading {
    max-width: 650px;
    margin-left: auto;
    margin-right: auto;
}

.section-label {
    display: inline-block;
    color: #15803d;
    font-size: .75rem;
    font-weight: 900;
    letter-spacing: 2px;
}

.section-heading h2 {
    margin: 14px 0 12px;
    color: #173b2a;
    font-size: clamp(2rem, 4vw, 2.8rem);
    font-weight: 900;
}

.section-heading p {
    margin: 0;
    color: #6b7280;
    line-height: 1.8;
}


/* =========================================
   ACTIVITY CARD
========================================= */

.activity-card {
    height: 100%;
    overflow: hidden;
    border: 1px solid #e5ebe5;
    border-radius: 22px;
    background: #ffffff;
    box-shadow: 0 8px 30px rgba(16, 60, 35, .06);
    transition: all .35s ease;
}

.activity-card:hover {
    transform: translateY(-9px);
    border-color: #bbf7d0;
    box-shadow: 0 18px 45px rgba(16, 60, 35, .13);
}


/* =========================================
   IMAGE
========================================= */

.activity-image-wrapper {
    position: relative;
    height: 245px;
    overflow: hidden;
    background: #e5e7eb;
}

.activity-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .5s ease;
}

.activity-card:hover .activity-image {
    transform: scale(1.08);
}

.activity-placeholder {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    color: #9ca3af;
    background: linear-gradient(135deg, #e5e7eb, #f3f4f6);
}

.activity-placeholder i {
    margin-bottom: 8px;
    font-size: 3rem;
}

.activity-placeholder span {
    font-size: .8rem;
}


/* =========================================
   STATUS
========================================= */

.activity-status {
    position: absolute;
    top: 16px;
    right: 16px;
    padding: 7px 12px;
    border-radius: 50px;
    background: #dcfce7;
    color: #166534;
    font-size: .72rem;
    font-weight: 800;
    box-shadow: 0 4px 12px rgba(0,0,0,.12);
}


/* =========================================
   CONTENT
========================================= */

.activity-content {
    display: flex;
    flex-direction: column;
    min-height: 285px;
    padding: 25px;
}

.activity-date {
    margin-bottom: 12px;
    color: #16a34a;
    font-size: .78rem;
    font-weight: 800;
}

.activity-title {
    display: -webkit-box;
    min-height: 58px;
    margin-bottom: 12px;
    overflow: hidden;
    color: #173b2a;
    font-size: 1.25rem;
    font-weight: 900;
    line-height: 1.4;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.activity-location {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
    color: #6b7280;
    font-size: .85rem;
}

.activity-location i {
    color: #16a34a;
}

.activity-description {
    display: -webkit-box;
    margin-bottom: 20px;
    overflow: hidden;
    color: #6b7280;
    font-size: .88rem;
    line-height: 1.7;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}

.activity-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: auto;
    padding-top: 18px;
    border-top: 1px solid #edf2ed;
}

.activity-category {
    color: #64748b;
    font-size: .75rem;
    font-weight: 800;
    letter-spacing: .5px;
}

.activity-arrow {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: #f0fdf4;
    color: #15803d;
    transition: all .3s ease;
}

.activity-card:hover .activity-arrow {
    background: #15803d;
    color: #ffffff;
    transform: rotate(45deg);
}


/* =========================================
   EMPTY STATE
========================================= */

.empty-activity {
    padding: 70px 25px;
    border: 2px dashed #d1d5db;
    border-radius: 22px;
    background: #ffffff;
    text-align: center;
}

.empty-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 80px;
    height: 80px;
    margin: 0 auto 20px;
    border-radius: 50%;
    background: #f0fdf4;
    color: #16a34a;
    font-size: 2.2rem;
}

.empty-activity h3 {
    color: #173b2a;
    font-weight: 800;
}

.empty-activity p {
    margin-bottom: 25px;
    color: #6b7280;
}


/* =========================================
   PAGINATION
========================================= */

.activity-pagination nav {
    display: flex;
    justify-content: center;
}

.activity-pagination .pagination {
    gap: 6px;
}

.activity-pagination .page-link {
    border: 1px solid #dce8df;
    border-radius: 10px !important;
    color: #166534;
    font-weight: 700;
}

.activity-pagination .page-item.active .page-link {
    border-color: #15803d;
    background: #15803d;
    color: #ffffff;
}

.activity-pagination .page-link:hover {
    background: #dcfce7;
    color: #166534;
}


/* =========================================
   CTA
========================================= */

.activity-cta {
    position: relative;
    padding: 90px 0;
    background:
        linear-gradient(
            120deg,
            rgba(7, 40, 27, .96),
            rgba(21, 128, 61, .88)
        ),
        url('https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&w=1800&q=85')
        center/cover;
}

.cta-content {
    position: relative;
    z-index: 2;
}

.section-label.light {
    color: #d9f99d;
}

.cta-content h2 {
    margin: 18px 0 15px;
    color: #ffffff;
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 900;
}

.cta-content p {
    margin-bottom: 28px;
    color: rgba(255,255,255,.8);
}

.btn-cta {
    display: inline-flex;
    align-items: center;
    padding: 14px 25px;
    border-radius: 50px;
    background: #ffffff;
    color: #166534;
    font-size: .9rem;
    font-weight: 800;
    text-decoration: none;
    box-shadow: 0 8px 25px rgba(0,0,0,.12);
    transition: all .3s ease;
}

.btn-cta:hover {
    transform: translateY(-3px);
    background: #d9f99d;
    color: #14532d;
}


/* =========================================
   RESPONSIVE
========================================= */

@media (max-width: 768px) {

    .activity-hero {
        min-height: 360px;
        padding: 125px 0 85px;
    }

    .activity-hero h1 {
        font-size: 2.3rem;
    }

    .activity-hero p {
        font-size: .95rem;
    }

    .activity-section {
        padding: 60px 0;
    }

    .activity-image-wrapper {
        height: 220px;
    }

    .activity-content {
        min-height: auto;
    }

    .activity-cta {
        padding: 65px 0;
    }

}
/* =========================================
   PERBAIKAN TEKS HERO DAN CTA
========================================= */

/* Hero tidak menutupi tulisan */
.activity-hero {
    position: relative;
    isolation: isolate;
    padding-top: 160px !important;
    padding-bottom: 120px !important;
    overflow: hidden;
}

.activity-hero::before {
    content: "";
    position: absolute;
    inset: 0;
    z-index: -1;
    background: rgba(5, 35, 22, .25);
}

.activity-hero::after {
    z-index: -1;
}

.activity-hero .container,
.activity-hero .hero-content {
    position: relative;
    z-index: 5;
}

/* Tulisan CTA harus terlihat */
.activity-cta {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    background-color: #14532d;
}

.activity-cta::before {
    content: "";
    position: absolute;
    inset: 0;
    z-index: -1;
    background: rgba(4, 35, 22, .35);
}

.activity-cta .container,
.activity-cta .cta-content {
    position: relative;
    z-index: 5;
}

.activity-cta .section-label.light {
    display: inline-block !important;
    color: #d9f99d !important;
    visibility: visible !important;
    opacity: 1 !important;
}

.activity-cta h2 {
    position: relative;
    z-index: 5;
    color: #ffffff !important;
    visibility: visible !important;
    opacity: 1 !important;
}

.activity-cta p {
    position: relative;
    z-index: 5;
    color: #f1f5f9 !important;
    visibility: visible !important;
    opacity: 1 !important;
}

/* Perbaikan tampilan HP */
@media (max-width: 768px) {

    .activity-hero {
        padding-top: 150px !important;
        padding-bottom: 110px !important;
    }

    .activity-hero h1 {
        font-size: 2rem !important;
        line-height: 1.3 !important;
    }

    .activity-hero p {
        font-size: .95rem !important;
        line-height: 1.7 !important;
    }

    .activity-cta h2 {
        font-size: 2rem !important;
        line-height: 1.3 !important;
    }

}

</style>

@endpush

@endsection