@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold mb-1">
            <i class="bi bi-envelope-open me-2"></i>
            Detail Pesan
        </h3>

        <p class="text-muted mb-0">
            Informasi lengkap pesan dari pengunjung.
        </p>
    </div>

    <a href="{{ route('admin.pesan.index') }}"
       class="btn btn-secondary">

        <i class="bi bi-arrow-left me-1"></i>
        Kembali

    </a>

</div>

<div class="row g-4">

    <div class="col-lg-8">

        <div class="card border-0 shadow-sm">

            <div class="card-body p-4">

                <div class="mb-4">

                    <small class="text-muted">
                        SUBJEK
                    </small>

                    <h4 class="fw-bold mt-1">
                        {{ $pesan->subjek }}
                    </h4>

                </div>

                <hr>

                <div class="mb-4">

                    <small class="text-muted">
                        PESAN
                    </small>

                    <div class="mt-2"
                         style="white-space: pre-line; line-height: 1.8;">

                        {{ $pesan->pesan }}

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card border-0 shadow-sm">

            <div class="card-header bg-white fw-bold">

                <i class="bi bi-person me-2"></i>
                Informasi Pengirim

            </div>

            <div class="card-body">

                <div class="mb-3">

                    <small class="text-muted">
                        Nama
                    </small>

                    <div class="fw-semibold">
                        {{ $pesan->nama }}
                    </div>

                </div>

                <div class="mb-3">

                    <small class="text-muted">
                        Email
                    </small>

                    <div>
                        <a href="mailto:{{ $pesan->email }}">
                            {{ $pesan->email }}
                        </a>
                    </div>

                </div>

                @if($pesan->telepon)

                    <div class="mb-3">

                        <small class="text-muted">
                            Telepon
                        </small>

                        <div>
                            {{ $pesan->telepon }}
                        </div>

                    </div>

                @endif

                <div class="mb-3">

                    <small class="text-muted">
                        Dikirim
                    </small>

                    <div>
                        {{ $pesan->created_at->format('d F Y, H:i') }}
                    </div>

                </div>

                <div>

                    <small class="text-muted">
                        Status
                    </small>

                    <div class="mt-1">

                        @if($pesan->sudah_dibaca)

                            <span class="badge bg-success">
                                Sudah Dibaca
                            </span>

                        @else

                            <span class="badge bg-warning text-dark">
                                Belum Dibaca
                            </span>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection