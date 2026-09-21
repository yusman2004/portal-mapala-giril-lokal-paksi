@extends('layouts.admin')

@section('title', 'Galeri')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold mb-1">
            <i class="bi bi-images me-2"></i>
            Galeri Foto
        </h3>

        <p class="text-muted mb-0">
            Kelola dokumentasi kegiatan MAPALA Giril Lokal Paksi.
        </p>
    </div>

    <a href="{{ route('admin.galeri.create') }}"
       class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i>
        Tambah Foto
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        <i class="bi bi-exclamation-circle me-2"></i>
        {{ session('error') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <strong>Terjadi kesalahan:</strong>

        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">

        <form method="GET"
              action="{{ route('admin.galeri.index') }}">

            <div class="row g-3">

                <div class="col-md-5">
                    <label class="form-label">
                        Cari Foto
                    </label>

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        value="{{ request('search') }}"
                        placeholder="Cari judul atau keterangan..."
                    >
                </div>

                <div class="col-md-5">
                    <label class="form-label">
                        Kegiatan
                    </label>

                    <select
                        name="kegiatan_id"
                        class="form-select"
                    >
                        <option value="">
                            Semua Kegiatan
                        </option>

                        @foreach($kegiatan as $item)
                            <option
                                value="{{ $item->id }}"
                                {{ request('kegiatan_id') == $item->id ? 'selected' : '' }}
                            >
                                {{ $item->nama_kegiatan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2 d-flex align-items-end">
                    <button class="btn btn-dark w-100">
                        <i class="bi bi-search me-1"></i>
                        Cari
                    </button>
                </div>

            </div>

        </form>

    </div>
</div>

<div class="row g-4">

    @forelse($galeri as $item)

        <div class="col-xl-3 col-lg-4 col-md-6">

            <div class="card border-0 shadow-sm h-100 overflow-hidden">

                <div style="height:220px;background:#f1f3f5;">

                    @if($item->foto)
                        <img
                            src="{{ asset('storage/' . $item->foto) }}"
                            alt="{{ $item->judul }}"
                            style="
                                width:100%;
                                height:100%;
                                object-fit:cover;
                            "
                        >
                    @else
                        <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                            <div class="text-center">
                                <i class="bi bi-image fs-1"></i>
                                <div>Tidak ada foto</div>
                            </div>
                        </div>
                    @endif

                </div>

                <div class="card-body">

                    <h5 class="fw-bold mb-2">
                        {{ $item->judul }}
                    </h5>

                    @if($item->kegiatan)
                        <div class="small text-primary mb-2">
                            <i class="bi bi-calendar-event me-1"></i>
                            {{ $item->kegiatan->nama_kegiatan }}
                        </div>
                    @else
                        <div class="small text-muted mb-2">
                            <i class="bi bi-calendar-x me-1"></i>
                            Tidak terkait kegiatan
                        </div>
                    @endif

                    @if($item->keterangan)
                        <p class="text-muted small mb-0">
                            {{ Str::limit($item->keterangan, 90) }}
                        </p>
                    @endif

                </div>

                <div class="card-footer bg-white border-0">

                    <div class="d-flex gap-2">

                        <a
                            href="{{ route('admin.galeri.show', $item->id) }}"
                            class="btn btn-sm btn-outline-primary flex-fill"
                        >
                            <i class="bi bi-eye"></i>
                        </a>

                        <a
                            href="{{ route('admin.galeri.edit', $item->id) }}"
                            class="btn btn-sm btn-outline-warning flex-fill"
                        >
                            <i class="bi bi-pencil"></i>
                        </a>

                        <form
                            action="{{ route('admin.galeri.destroy', $item->id) }}"
                            method="POST"
                            class="flex-fill"
                            onsubmit="return confirm('Yakin ingin menghapus foto ini?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-sm btn-outline-danger w-100"
                            >
                                <i class="bi bi-trash"></i>
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    @empty

        <div class="col-12">

            <div class="card border-0 shadow-sm">

                <div class="card-body text-center py-5">

                    <i class="bi bi-images fs-1 text-muted"></i>

                    <h5 class="mt-3">
                        Belum ada foto galeri
                    </h5>

                    <p class="text-muted">
                        Tambahkan dokumentasi kegiatan MAPALA.
                    </p>

                    <a
                        href="{{ route('admin.galeri.create') }}"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-plus-lg me-1"></i>
                        Tambah Foto
                    </a>

                </div>

            </div>

        </div>

    @endforelse

</div>

@if($galeri->hasPages())
    <div class="mt-4">
        {{ $galeri->links() }}
    </div>
@endif

@endsection