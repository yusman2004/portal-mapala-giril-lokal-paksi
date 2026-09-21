@extends('layouts.public')

@section('title', 'Berita - MAPALA Giril Lokal Paksi')

@section('content')

<section class="page-hero">
    <div class="container">
        <span>BERITA & INFORMASI</span>
        <h1>Kabar Terbaru</h1>
        <p>
            Informasi dan cerita terbaru dari
            Giril Lokal Paksi.
        </p>
    </div>
</section>

<section class="py-5">

    <div class="container">

        <div class="row g-4">

            @forelse($berita as $item)

                <div class="col-md-6 col-lg-4">

                    <a
                        href="{{ route(
                            'public.berita.detail',
                            $item->slug
                        ) }}"
                        class="text-decoration-none text-dark"
                    >

                        <article class="news-public-card">

                            @if($item->gambar)

                                <img
                                    src="{{ asset('storage/' . $item->gambar) }}"
                                    alt="{{ $item->judul }}"
                                >

                            @else

                                <div class="news-public-placeholder">
                                    <i class="bi bi-newspaper"></i>
                                </div>

                            @endif

                            <div class="p-4">

                                @if($item->kategori)

                                    <span class="category-label">
                                        {{ $item->kategori->nama_kategori }}
                                    </span>

                                @endif

                                <h3>
                                    {{ $item->judul }}
                                </h3>

                                <div class="small text-secondary mb-3">
                                    <i class="bi bi-calendar3"></i>

                                    {{ $item->published_at
                                        ? $item->published_at->format('d F Y')
                                        : '-' }}
                                </div>

                                <p class="text-secondary">
                                    {{ \Illuminate\Support\Str::limit(
                                        strip_tags($item->isi),
                                        140
                                    ) }}
                                </p>

                                <span class="read-more">
                                    Baca Selengkapnya
                                    <i class="bi bi-arrow-right"></i>
                                </span>

                            </div>

                        </article>

                    </a>

                </div>

            @empty

                <div class="col-12">
                    <div class="alert alert-light text-center p-5">
                        Belum ada berita yang dipublikasikan.
                    </div>
                </div>

            @endforelse

        </div>

        <div class="mt-5">
            {{ $berita->links() }}
        </div>

    </div>

</section>

@push('styles')
<style>

.news-public-card {
    height: 100%;
    overflow: hidden;
    border-radius: 18px;
    background: white;
    box-shadow: 0 10px 35px rgba(0,0,0,.07);
    transition: .3s;
}

.news-public-card:hover {
    transform: translateY(-7px);
    box-shadow: 0 20px 45px rgba(0,0,0,.12);
}

.news-public-card img,
.news-public-placeholder {
    width: 100%;
    height: 220px;
    object-fit: cover;
}

.news-public-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #e5e7eb;
    color: #9ca3af;
    font-size: 3rem;
}

.category-label {
    color: #166534;
    text-transform: uppercase;
    font-size: .75rem;
    font-weight: 800;
}

.news-public-card h3 {
    font-size: 1.25rem;
    font-weight: 800;
    line-height: 1.4;
    margin: 10px 0;
}

.read-more {
    color: #166534;
    font-size: .85rem;
    font-weight: 800;
}

</style>
@endpush

@endsection