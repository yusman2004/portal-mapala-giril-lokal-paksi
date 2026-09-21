@extends('layouts.admin')

@section('title', 'Tambah Pendaftar')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold mb-1">
            <i class="bi bi-person-plus me-2"></i>
            Tambah Pendaftar
        </h3>

        <p class="text-muted mb-0">
            Tambahkan data pendaftaran anggota secara manual.
        </p>
    </div>

    <a
        href="{{ route('admin.pendaftaran.index') }}"
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
            action="{{ route('admin.pendaftaran.store') }}"
            method="POST"
        >

            @csrf

            <div class="row g-3">

                <div class="col-md-6">

                    <label class="form-label fw-semibold">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        name="nama_lengkap"
                        class="form-control"
                        value="{{ old('nama_lengkap') }}"
                        required
                    >

                </div>

                <div class="col-md-6">

                    <label class="form-label fw-semibold">
                        NIM
                    </label>

                    <input
                        type="text"
                        name="nim"
                        class="form-control"
                        value="{{ old('nim') }}"
                        required
                    >

                </div>

                <div class="col-md-6">

                    <label class="form-label fw-semibold">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        required
                    >

                </div>

                <div class="col-md-6">

                    <label class="form-label fw-semibold">
                        Nomor HP
                    </label>

                    <input
                        type="text"
                        name="no_hp"
                        class="form-control"
                        value="{{ old('no_hp') }}"
                        required
                    >

                </div>

                <div class="col-md-6">

                    <label class="form-label fw-semibold">
                        Jenis Kelamin
                    </label>

                    <select
                        name="jenis_kelamin"
                        class="form-select"
                        required
                    >

                        <option value="">
                            -- Pilih --
                        </option>

                        <option
                            value="Laki-laki"
                            {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}
                        >
                            Laki-laki
                        </option>

                        <option
                            value="Perempuan"
                            {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}
                        >
                            Perempuan
                        </option>

                    </select>

                </div>

                <div class="col-md-6">

                    <label class="form-label fw-semibold">
                        Angkatan
                    </label>

                    <input
                        type="text"
                        name="angkatan"
                        class="form-control"
                        value="{{ old('angkatan') }}"
                        placeholder="Contoh: 2026"
                        required
                    >

                </div>

                <div class="col-12">

                    <label class="form-label fw-semibold">
                        Alamat
                    </label>

                    <textarea
                        name="alamat"
                        class="form-control"
                        rows="3"
                        required
                    >{{ old('alamat') }}</textarea>

                </div>

                <div class="col-12">

                    <label class="form-label fw-semibold">
                        Alasan Bergabung
                    </label>

                    <textarea
                        name="alasan_bergabung"
                        class="form-control"
                        rows="5"
                        required
                    >{{ old('alasan_bergabung') }}</textarea>

                </div>

                <div class="col-md-6">

                    <label class="form-label fw-semibold">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select"
                        required
                    >

                        <option value="Menunggu">
                            Menunggu
                        </option>

                        <option value="Diterima">
                            Diterima
                        </option>

                        <option value="Ditolak">
                            Ditolak
                        </option>

                    </select>

                </div>

            </div>

            <hr class="my-4">

            <button
                type="submit"
                class="btn btn-primary"
            >
                <i class="bi bi-save me-1"></i>
                Simpan Pendaftar
            </button>

        </form>

    </div>

</div>

@endsection