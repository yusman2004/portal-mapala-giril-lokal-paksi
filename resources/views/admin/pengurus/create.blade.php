@extends('layouts.admin')

@section('title', 'Tambah Pengurus')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold mb-1">
            <i class="bi bi-person-plus me-2"></i>
            Tambah Pengurus
        </h3>

        <p class="text-muted mb-0">
            Tambahkan anggota ke dalam struktur organisasi.
        </p>
    </div>

    <a
        href="{{ route('admin.pengurus.index') }}"
        class="btn btn-outline-secondary"
    >
        <i class="bi bi-arrow-left me-1"></i>
        Kembali
    </a>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body p-4">

        @if($errors->any())

            <div class="alert alert-danger">

                <strong>Periksa kembali:</strong>

                <ul class="mb-0 mt-2">

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif

        <form
            action="{{ route('admin.pengurus.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="row g-4">

                <div class="col-lg-8">

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Nama Lengkap
                            </label>

                            <input
                                type="text"
                                name="nama"
                                class="form-control"
                                value="{{ old('nama') }}"
                                placeholder="Nama lengkap pengurus"
                                required
                            >

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Jabatan
                            </label>

                            <input
                                type="text"
                                name="jabatan"
                                class="form-control"
                                value="{{ old('jabatan') }}"
                                placeholder="Contoh: Ketua Umum"
                                required
                            >

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Periode
                            </label>

                            <input
                                type="text"
                                name="periode"
                                class="form-control"
                                value="{{ old('periode', '2026-2027') }}"
                                placeholder="2026-2027"
                                required
                            >

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Urutan Tampil
                            </label>

                            <input
                                type="number"
                                name="urutan"
                                class="form-control"
                                value="{{ old('urutan', 1) }}"
                                min="1"
                                required
                            >

                            <div class="form-text">
                                Angka kecil akan ditampilkan lebih dahulu.
                            </div>

                        </div>

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Foto
                        </label>

                        <input
                            type="file"
                            name="foto"
                            class="form-control"
                            accept="image/*"
                        >

                        <div class="form-text">
                            JPG, JPEG, PNG, WEBP. Maksimal 4 MB.
                        </div>

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Deskripsi
                        </label>

                        <textarea
                            name="deskripsi"
                            class="form-control"
                            rows="5"
                            placeholder="Deskripsi singkat pengurus..."
                        >{{ old('deskripsi') }}</textarea>

                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-save me-1"></i>
                        Simpan Pengurus
                    </button>

                </div>

                <div class="col-lg-4">

                    <div class="card bg-light border-0">

                        <div class="card-body">

                            <h6 class="fw-bold">
                                <i class="bi bi-info-circle me-2"></i>
                                Panduan
                            </h6>

                            <ul class="small text-muted mb-0">

                                <li class="mb-2">
                                    Isi nama lengkap pengurus.
                                </li>

                                <li class="mb-2">
                                    Masukkan jabatan sesuai struktur organisasi.
                                </li>

                                <li class="mb-2">
                                    Gunakan periode kepengurusan.
                                </li>

                                <li>
                                    Urutan menentukan posisi tampil.
                                </li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection