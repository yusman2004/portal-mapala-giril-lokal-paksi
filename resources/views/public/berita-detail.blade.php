@extends('layouts.public')

@section('title', $berita->judul . ' - MAPALA Giril Lokal Paksi')

@section('content')

<section class="py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                @if($berita->kategori)

                    <span class="category-label">
                        {{ $berita->kategori->nama_kategori }}
                    </span>

                @endif

                <h1 class="display-4 fw-bold mt-2 mb-3">
                    {{ $berita->judul }}
                </h1>

                <div class="text-secondary mb-4">

                    <i class="bi bi-calendar3"></i>

                    {{ $berita->published_at
                        ? $berita->published_at->format('d F Y H:i')
                        : '-' }}

                </div>

                @if($berita->gambar)

                    <img
                        src="{{ asset('storage/' . $berita->gambar) }}"
                        alt="{{ $berita->judul }}"
                        class="detail-image mb-5"
                    >

                @endif

                <div class="article-content">
                    {!! nl2br(e($berita->isi)) !!}
                </div>

                <hr class="my-5">

                <a
                    href="{{ route('public.berita') }}"
                    class="btn btn-success"
                >
                    <i class="bi bi-arrow-left me-2"></i>
                    Kembali ke Berita
                </a>

            </div>

        </div>

    </div>

</section>

@push('styles')
<style>

.category-label {
    color: #166534;
    font-weight: 800;
    font-size: .8rem;
    letter-spacing: 1px;
}

.detail-image {
    width: 100%;
    max-height: 550px;
    object-fit: cover;
    border-radius: 20px;
}

.article-content {
    color: #374151;
    font-size: 1.08rem;
    line-height: 2;
}

</style>
@endpush

@endsection