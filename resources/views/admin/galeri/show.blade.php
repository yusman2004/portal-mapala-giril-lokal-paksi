@extends('layouts.admin')

@section('title', 'Detail Galeri')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold mb-1">
            <i class="bi bi-image me-2"></i>
            Detail Foto Galeri
        </h3>

        <p class="text-muted mb-0">
            Informasi lengkap dokumentasi.
        </p>
    </div>

    <div class="d-flex gap-2">

        <a
            href="{{ route('admin.galeri.edit', $galeri->id) }}"
            class="btn btn-warning"
        >
            <i class="bi bi-pencil me-1"></i>
            Edit
        </a>

        <a
            href="{{ route('admin.galeri.index') }}"
            class="btn btn-outline-secondary"
        >
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>

    </div>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body p-4">

        <div class="row g-4">

            <div class="col-lg-7">

                @if($galeri->foto)

                    <img
                        src="{{ asset('storage/' . $galeri->foto) }}"
                        class="img-fluid rounded shadow-sm"
                        style="
                            width:100%;
                            max-height:550px;
                            object-fit:contain;
                            background:#f8f9fa;
                        "
                        alt="{{ $galeri->judul }}"
                    >

                @else

                    <div
                        class="bg-light rounded d-flex align-items-center justify-content-center"
                        style="height:400px;"
                    >
                        <div class="text-center text-muted">
                            <i class="bi bi-image fs-1"></i>
                            <p class="mt-2">
                                Tidak ada foto
                            </p>
                        </div>
                    </div>

                @endif

            </div>

            <div class="col-lg-5">

                <h2 class="fw-bold">
                    {{ $galeri->judul }}
                </h2>

                <hr>

                <div class="mb-3">

                    <div class="text-muted small">
                        KEGIATAN
                    </div>

                    @if($galeri->kegiatan)

                        <div class="fw-semibold">
                            <i class="bi bi-calendar-event me-1"></i>
                            {{ $galeri->kegiatan->nama_kegiatan }}
                        </div>

                        @if($galeri->kegiatan->tanggal)
                            <div class="small text-muted">
                                {{ $galeri->kegiatan->tanggal->format('d F Y') }}
                            </div>
                        @endif

                    @else

                        <span class="text-muted">
                            Tidak terkait kegiatan
                        </span>

                    @endif

                </div>

                <div class="mb-3">

                    <div class="text-muted small">
                        KETERANGAN
                    </div>

                    <div class="mt-1">
                        {!! nl2br(e($galeri->keterangan ?: 'Tidak ada keterangan.')) !!}
                    </div>

                </div>

                <div class="mb-3">

                    <div class="text-muted small">
                        DITAMBAHKAN
                    </div>

                    <div>
                        {{ $galeri->created_at->format('d F Y H:i') }}
                    </div>

                </div>

                <div>

                    <form
                        action="{{ route('admin.galeri.destroy', $galeri->id) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus foto ini?')"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger"
                        >
                            <i class="bi bi-trash me-1"></i>
                            Hapus Foto
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection