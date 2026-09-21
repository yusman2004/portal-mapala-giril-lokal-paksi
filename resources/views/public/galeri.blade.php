@extends('layouts.public')

@section('title', 'Galeri - MAPALA Giril Lokal Paksi')

@section('content')

<section class="page-hero">
    <div class="container">
        <span>DOKUMENTASI</span>
        <h1>Galeri Kami</h1>
        <p>
            Merekam perjalanan dan cerita
            Giril Lokal Paksi.
        </p>
    </div>
</section>

<section class="py-5">

    <div class="container">

        <div class="row g-4">

            @forelse($galeri as $item)

                <div class="col-6 col-md-4 col-lg-3">

                    <div class="public-gallery-card">

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

                        <div class="gallery-info">

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

                    <div class="text-center py-5">

                        <i class="bi bi-images fs-1 text-secondary"></i>

                        <h4 class="mt-3">
                            Belum ada foto
                        </h4>

                    </div>

                </div>

            @endforelse

        </div>

        <div class="mt-5">
            {{ $galeri->links() }}
        </div>

    </div>

</section>

@push('styles')
<style>

.public-gallery-card {
    height: 280px;
    border-radius: 18px;
    overflow: hidden;
    position: relative;
    background: #173c29;
}

.public-gallery-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: .5s;
}

.public-gallery-card:hover img {
    transform: scale(1.08);
}

.gallery-placeholder {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #9ca3af;
    font-size: 3rem;
}

.gallery-info {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 40px 18px 18px;
    color: white;
    background: linear-gradient(
        transparent,
        rgba(0,0,0,.85)
    );
}

.gallery-info h5 {
    font-size: 1rem;
    font-weight: 800;
    margin: 0;
}

.gallery-info small {
    color: rgba(255,255,255,.7);
}

</style>
@endpush

@endsection