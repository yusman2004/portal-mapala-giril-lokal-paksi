@extends('layouts.admin')

@section('title', 'Detail Pengurus')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold mb-1">
            <i class="bi bi-person-vcard me-2"></i>
            Detail Pengurus
        </h3>

        <p class="text-muted mb-0">
            Informasi lengkap pengurus MAPALA.
        </p>
    </div>

    <div class="d-flex gap-2">

        <a
            href="{{ route('admin.pengurus.edit', $pengurus->id) }}"
            class="btn btn-warning"
        >
            <i class="bi bi-pencil me-1"></i>
            Edit
        </a>

        <a
            href="{{ route('admin.pengurus.index') }}"
            class="btn btn-outline-secondary"
        >
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>

    </div>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body p-4">

        <div class="row g-5 align-items-center">

            <div class="col-lg-5 text-center">

                @if($pengurus->foto)

                    <img
                        src="{{ asset('storage/' . $pengurus->foto) }}"
                        alt="{{ $pengurus->nama }}"
                        class="rounded-circle shadow"
                        style="
                            width:300px;
                            height:300px;
                            object-fit:cover;
                            max-width:100%;
                        "
                    >

                @else

                    <div
                        class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center mx-auto"
                        style="
                            width:300px;
                            height:300px;
                            font-size:100px;
                            max-width:100%;
                        "
                    >
                        <i class="bi bi-person"></i>
                    </div>

                @endif

            </div>

            <div class="col-lg-7">

                <div class="mb-2 text-primary fw-semibold">
                    {{ $pengurus->jabatan }}
                </div>

                <h1 class="fw-bold mb-3">
                    {{ $pengurus->nama }}
                </h1>

                <div class="mb-4">

                    <span class="badge bg-dark fs-6">
                        Periode {{ $pengurus->periode }}
                    </span>

                </div>

                <div class="mb-4">

                    <h6 class="fw-bold">
                        Deskripsi
                    </h6>

                    <p class="text-muted">
                        {!! nl2br(e(
                            $pengurus->deskripsi
                            ?: 'Tidak ada deskripsi.'
                        )) !!}
                    </p>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="text-muted small">
                            URUTAN
                        </div>

                        <div class="fw-semibold">
                            {{ $pengurus->urutan }}
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="text-muted small">
                            DITAMBAHKAN
                        </div>

                        <div class="fw-semibold">
                            {{ $pengurus->created_at->format('d F Y') }}
                        </div>

                    </div>

                </div>

                <hr>

                <form
                    action="{{ route('admin.pengurus.destroy', $pengurus->id) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus pengurus ini?')"
                >

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-danger"
                    >
                        <i class="bi bi-trash me-1"></i>
                        Hapus Pengurus
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection