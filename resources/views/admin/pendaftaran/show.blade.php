@extends('layouts.admin')

@section('title', 'Detail Pendaftar')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold mb-1">
            <i class="bi bi-person-vcard me-2"></i>
            Detail Pendaftar
        </h3>

        <p class="text-muted mb-0">
            Informasi lengkap calon anggota.
        </p>
    </div>

    <div class="d-flex gap-2">

        <a
            href="{{ route('admin.pendaftaran.edit', $pendaftaran->id) }}"
            class="btn btn-warning"
        >
            <i class="bi bi-pencil me-1"></i>
            Edit
        </a>

        <a
            href="{{ route('admin.pendaftaran.index') }}"
            class="btn btn-outline-secondary"
        >
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>

    </div>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body p-4">

        <div class="d-flex justify-content-between align-items-start mb-4">

            <div>

                <h2 class="fw-bold mb-1">
                    {{ $pendaftaran->nama_lengkap }}
                </h2>

                <div class="text-muted">
                    NIM: {{ $pendaftaran->nim }}
                </div>

            </div>

            <div>

                @if($pendaftaran->status === 'Menunggu')

                    <span class="badge bg-warning text-dark fs-6">
                        <i class="bi bi-clock me-1"></i>
                        Menunggu
                    </span>

                @elseif($pendaftaran->status === 'Diterima')

                    <span class="badge bg-success fs-6">
                        <i class="bi bi-check-circle me-1"></i>
                        Diterima
                    </span>

                @else

                    <span class="badge bg-danger fs-6">
                        <i class="bi bi-x-circle me-1"></i>
                        Ditolak
                    </span>

                @endif

            </div>

        </div>

        <div class="row g-4">

            <div class="col-md-6">

                <div class="card bg-light border-0 h-100">

                    <div class="card-body">

                        <h6 class="fw-bold mb-3">
                            Data Pribadi
                        </h6>

                        <p class="mb-2">
                            <strong>Nama:</strong><br>
                            {{ $pendaftaran->nama_lengkap }}
                        </p>

                        <p class="mb-2">
                            <strong>NIM:</strong><br>
                            {{ $pendaftaran->nim }}
                        </p>

                        <p class="mb-2">
                            <strong>Jenis Kelamin:</strong><br>
                            {{ $pendaftaran->jenis_kelamin }}
                        </p>

                        <p class="mb-0">
                            <strong>Angkatan:</strong><br>
                            {{ $pendaftaran->angkatan }}
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-6">

                <div class="card bg-light border-0 h-100">

                    <div class="card-body">

                        <h6 class="fw-bold mb-3">
                            Kontak
                        </h6>

                        <p class="mb-2">
                            <strong>Email:</strong><br>
                            {{ $pendaftaran->email }}
                        </p>

                        <p class="mb-0">
                            <strong>Nomor HP:</strong><br>
                            {{ $pendaftaran->no_hp }}
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-12">

                <h6 class="fw-bold">
                    Alamat
                </h6>

                <div class="p-3 bg-light rounded">
                    {!! nl2br(e($pendaftaran->alamat)) !!}
                </div>

            </div>

            <div class="col-12">

                <h6 class="fw-bold">
                    Alasan Bergabung
                </h6>

                <div class="p-3 bg-light rounded">
                    {!! nl2br(e($pendaftaran->alasan_bergabung)) !!}
                </div>

            </div>

        </div>

        @if($pendaftaran->status === 'Menunggu')

            <hr class="my-4">

            <div class="d-flex gap-2">

                <form
                    action="{{ route('admin.pendaftaran.terima', $pendaftaran->id) }}"
                    method="POST"
                >

                    @csrf

                    <button
                        type="submit"
                        class="btn btn-success"
                        onclick="return confirm('Terima pendaftar ini?')"
                    >
                        <i class="bi bi-check-circle me-1"></i>
                        Terima Pendaftar
                    </button>

                </form>

                <form
                    action="{{ route('admin.pendaftaran.tolak', $pendaftaran->id) }}"
                    method="POST"
                >

                    @csrf

                    <button
                        type="submit"
                        class="btn btn-danger"
                        onclick="return confirm('Tolak pendaftar ini?')"
                    >
                        <i class="bi bi-x-circle me-1"></i>
                        Tolak Pendaftar
                    </button>

                </form>

            </div>

        @endif

    </div>

</div>

@endsection