@extends('layouts.admin')

@section('title', 'Struktur Pengurus')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold mb-1">
            <i class="bi bi-diagram-3 me-2"></i>
            Struktur Pengurus
        </h3>

        <p class="text-muted mb-0">
            Kelola struktur organisasi MAPALA Giril Lokal Paksi.
        </p>
    </div>

    <a href="{{ route('admin.pengurus.create') }}" class="btn btn-primary">
        <i class="bi bi-person-plus me-1"></i>
        Tambah Pengurus
    </a>

</div>

@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show">

        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

@endif

@if(session('error'))

    <div class="alert alert-danger alert-dismissible fade show">

        <i class="bi bi-exclamation-circle me-2"></i>
        {{ session('error') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

@endif

<div class="card border-0 shadow-sm mb-4">

    <div class="card-body">

        <form
            method="GET"
            action="{{ route('admin.pengurus.index') }}"
        >

            <div class="row g-3">

                <div class="col-md-10">

                    <label class="form-label">
                        Cari Pengurus
                    </label>

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        value="{{ request('search') }}"
                        placeholder="Cari nama, jabatan, atau periode..."
                    >

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

    @forelse($pengurus as $item)

        <div class="col-xl-3 col-lg-4 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div
                    class="text-center p-3"
                    style="background:linear-gradient(135deg,#f8f9fa,#e9ecef);"
                >

                    @if($item->foto)

                        <img
                            src="{{ asset('storage/' . $item->foto) }}"
                            alt="{{ $item->nama }}"
                            class="rounded-circle shadow-sm"
                            style="
                                width:150px;
                                height:150px;
                                object-fit:cover;
                            "
                        >

                    @else

                        <div
                            class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center mx-auto"
                            style="
                                width:150px;
                                height:150px;
                                font-size:55px;
                            "
                        >
                            <i class="bi bi-person"></i>
                        </div>

                    @endif

                </div>

                <div class="card-body text-center">

                    <h5 class="fw-bold mb-1">
                        {{ $item->nama }}
                    </h5>

                    <div class="text-primary fw-semibold mb-2">
                        {{ $item->jabatan }}
                    </div>

                    <span class="badge bg-dark mb-3">
                        Periode {{ $item->periode }}
                    </span>

                    @if($item->deskripsi)

                        <p class="text-muted small">
                            {{ Str::limit($item->deskripsi, 90) }}
                        </p>

                    @endif

                </div>

                <div class="card-footer bg-white border-0">

                    <div class="d-flex gap-2">

                        {{-- DETAIL --}}
                        <a
                            href="{{ route('admin.pengurus.show', ['pengurus' => $item->id]) }}"
                            class="btn btn-sm btn-outline-primary flex-fill"
                            title="Lihat Detail"
                        >
                            <i class="bi bi-eye"></i>
                        </a>

                        {{-- EDIT --}}
                        <a
                            href="{{ route('admin.pengurus.edit', ['pengurus' => $item->id]) }}"
                            class="btn btn-sm btn-outline-warning flex-fill"
                            title="Edit Pengurus"
                        >
                            <i class="bi bi-pencil"></i>
                        </a>

                        {{-- HAPUS --}}
                        <form
                            action="{{ route('admin.pengurus.destroy', ['pengurus' => $item->id]) }}"
                            method="POST"
                            class="flex-fill"
                            onsubmit="return confirm('Yakin ingin menghapus pengurus ini?')"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-sm btn-outline-danger w-100"
                                title="Hapus Pengurus"
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

                    <i class="bi bi-people fs-1 text-muted"></i>

                    <h5 class="mt-3">
                        Belum ada data pengurus
                    </h5>

                    <p class="text-muted">
                        Tambahkan struktur organisasi MAPALA.
                    </p>

                    <a
                        href="{{ route('admin.pengurus.create') }}"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-person-plus me-1"></i>
                        Tambah Pengurus
                    </a>

                </div>

            </div>

        </div>

    @endforelse

</div>

@if($pengurus->hasPages())

    <div class="mt-4">
        {{ $pengurus->links() }}
    </div>

@endif

@endsection