@extends('layouts.public')

@section('title', 'Kegiatan - MAPALA Giril Lokal Paksi')

@section('content')

<section class="page-hero">
    <div class="container">
        <span>KEGIATAN</span>
        <h1>Aktivitas Kami</h1>
        <p>
            Berbagai kegiatan dan perjalanan
            MAPALA Giril Lokal Paksi.
        </p>
    </div>
</section>

<section class="py-5">

    <div class="container">

        <div class="row g-4">

            @forelse($kegiatan as $item)

                <div class="col-md-6 col-lg-4">

                    <div class="activity-public-card">

                        @if($item->gambar)

                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                alt="{{ $item->nama_kegiatan }}"
                            >

                        @else

                            <div class="activity-public-placeholder">
                                <i class="bi bi-image"></i>
                            </div>

                        @endif

                        <div class="p-4">

                            <div class="small text-success fw-bold mb-2">
                                <i class="bi bi-calendar3"></i>
                                {{ $item->tanggal
                                    ? $item->tanggal->format('d F Y')
                                    : '-' }}
                            </div>

                            <h3>
                                {{ $item->nama_kegiatan }}
                            </h3>

                            <p class="text-secondary">
                                <i class="bi bi-geo-alt"></i>
                                {{ $item->lokasi }}
                            </p>

                            @if($item->deskripsi)

                                <p class="text-secondary">
                                    {{ \Illuminate\Support\Str::limit(
                                        strip_tags($item->deskripsi),
                                        120
                                    ) }}
                                </p>

                            @endif

                            <span class="badge bg-success">
                                {{ $item->status }}
                            </span>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">
                    <div class="alert alert-light text-center p-5">
                        Belum ada kegiatan.
                    </div>
                </div>

            @endforelse

        </div>

        <div class="mt-5">
            {{ $kegiatan->links() }}
        </div>

    </div>

</section>

@push('styles')
<style>

.activity-public-card {
    height: 100%;
    border-radius: 18px;
    overflow: hidden;
    background: white;
    box-shadow: 0 10px 35px rgba(0,0,0,.07);
    transition: .3s;
}

.activity-public-card:hover {
    transform: translateY(-6px);
}

.activity-public-card img,
.activity-public-placeholder {
    width: 100%;
    height: 230px;
    object-fit: cover;
}

.activity-public-placeholder {
    background: #e5e7eb;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #9ca3af;
    font-size: 3rem;
}

.activity-public-card h3 {
    font-size: 1.25rem;
    font-weight: 800;
}

</style>
@endpush

@endsection