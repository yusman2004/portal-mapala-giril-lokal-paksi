@extends('layouts.admin')

@section('title', 'Detail Berita')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-newspaper me-2"></i>
                Detail Berita
            </h3>

            <p class="text-muted mb-0">
                Informasi lengkap berita MAPALA Giril Lokal Paksi.
            </p>
        </div>

        <div class="d-flex gap-2">

            <a href="{{ route('admin.berita.index') }}"
               class="btn btn-secondary">

                <i class="bi bi-arrow-left me-1"></i>
                Kembali

            </a>

            <a href="{{ route('admin.berita.edit', ['berita' => $berita->id]) }}"
               class="btn btn-warning">

                <i class="bi bi-pencil me-1"></i>
                Edit Berita

            </a>

        </div>

    </div>


    {{-- DETAIL BERITA --}}
    <div class="row g-4">

        {{-- KONTEN UTAMA --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                {{-- GAMBAR --}}
                @if($berita->gambar)

                    <img
                        src="{{ asset('storage/' . $berita->gambar) }}"
                        alt="{{ $berita->judul }}"
                        class="card-img-top"
                        style="
                            width: 100%;
                            max-height: 450px;
                            object-fit: cover;
                        "
                    >

                @else

                    <div
                        class="bg-light d-flex align-items-center justify-content-center"
                        style="
                            height: 350px;
                        "
                    >

                        <div class="text-center text-muted">

                            <i class="bi bi-image fs-1"></i>

                            <div class="mt-2">
                                Tidak ada gambar berita
                            </div>

                        </div>

                    </div>

                @endif


                <div class="card-body p-4">

                    {{-- JUDUL --}}
                    <h2 class="fw-bold mb-3">
                        {{ $berita->judul }}
                    </h2>


                    {{-- META --}}
                    <div class="d-flex flex-wrap gap-2 mb-4">

                        {{-- KATEGORI --}}
                        @if($berita->kategori)

                            <span class="badge bg-primary px-3 py-2">

                                <i class="bi bi-folder me-1"></i>

                                {{ $berita->kategori->nama_kategori }}

                            </span>

                        @endif


                        {{-- STATUS --}}
                        @if($berita->status === 'Publish')

                            <span class="badge bg-success px-3 py-2">

                                <i class="bi bi-check-circle me-1"></i>

                                Published

                            </span>

                        @else

                            <span class="badge bg-secondary px-3 py-2">

                                <i class="bi bi-file-earmark me-1"></i>

                                Draft

                            </span>

                        @endif

                    </div>


                    {{-- INFORMASI TANGGAL --}}
                    <div class="border-top border-bottom py-3 mb-4">

                        <div class="row">

                            <div class="col-md-6 mb-2 mb-md-0">

                                <small class="text-muted d-block">
                                    Dibuat
                                </small>

                                <strong>

                                    @if($berita->created_at)

                                        {{ $berita->created_at->format('d F Y, H:i') }}
                                        WIB

                                    @else

                                        -

                                    @endif

                                </strong>

                            </div>


                            <div class="col-md-6">

                                <small class="text-muted d-block">
                                    Dipublikasikan
                                </small>

                                <strong>

                                    @if($berita->published_at)

                                        {{ \Carbon\Carbon::parse($berita->published_at)->format('d F Y, H:i') }}
                                        WIB

                                    @else

                                        Belum dipublikasikan

                                    @endif

                                </strong>

                            </div>

                        </div>

                    </div>


                    {{-- ISI BERITA --}}
                    <div class="berita-content">

                        {!! nl2br(e($berita->isi)) !!}

                    </div>

                </div>

            </div>

        </div>


        {{-- SIDEBAR INFORMASI --}}
        <div class="col-lg-4">

            {{-- INFORMASI BERITA --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-primary text-white">

                    <h5 class="mb-0">

                        <i class="bi bi-info-circle me-2"></i>

                        Informasi Berita

                    </h5>

                </div>


                <div class="card-body">

                    {{-- JUDUL --}}
                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Judul
                        </small>

                        <strong>
                            {{ $berita->judul }}
                        </strong>

                    </div>


                    {{-- KATEGORI --}}
                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Kategori
                        </small>

                        @if($berita->kategori)

                            <span class="badge bg-primary">

                                {{ $berita->kategori->nama_kategori }}

                            </span>

                        @else

                            <span class="text-muted">
                                Tidak ada kategori
                            </span>

                        @endif

                    </div>


                    {{-- SLUG --}}
                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Slug
                        </small>

                        <code>
                            {{ $berita->slug }}
                        </code>

                    </div>


                    {{-- STATUS --}}
                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Status
                        </small>

                        @if($berita->status === 'Publish')

                            <span class="badge bg-success">

                                <i class="bi bi-check-circle me-1"></i>

                                Publish

                            </span>

                        @else

                            <span class="badge bg-secondary">

                                <i class="bi bi-file-earmark me-1"></i>

                                Draft

                            </span>

                        @endif

                    </div>


                    {{-- TANGGAL DIBUAT --}}
                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Dibuat Pada
                        </small>

                        <span>

                            @if($berita->created_at)

                                {{ $berita->created_at->format('d/m/Y H:i') }}

                            @else

                                -

                            @endif

                        </span>

                    </div>


                    {{-- TERAKHIR DIUPDATE --}}
                    <div>

                        <small class="text-muted d-block">
                            Terakhir Diperbarui
                        </small>

                        <span>

                            @if($berita->updated_at)

                                {{ $berita->updated_at->format('d/m/Y H:i') }}

                            @else

                                -

                            @endif

                        </span>

                    </div>

                </div>

            </div>


            {{-- AKSI --}}
            <div class="card border-0 shadow-sm">

                <div class="card-header">

                    <h5 class="mb-0">

                        <i class="bi bi-gear me-2"></i>

                        Aksi

                    </h5>

                </div>


                <div class="card-body">

                    <a
                        href="{{ route('admin.berita.edit', ['berita' => $berita->id]) }}"
                        class="btn btn-warning w-100 mb-2"
                    >

                        <i class="bi bi-pencil me-2"></i>

                        Edit Berita

                    </a>


                    <form
                        action="{{ route('admin.berita.destroy', ['berita' => $berita->id]) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus berita ini?')"
                    >

                        @csrf

                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger w-100"
                        >

                            <i class="bi bi-trash me-2"></i>

                            Hapus Berita

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- STYLE --}}
<style>

    .berita-content {
        font-size: 16px;
        line-height: 1.9;
        color: #333;
    }

    .berita-content p {
        margin-bottom: 1rem;
    }

</style>

@endsection