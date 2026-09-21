@extends('layouts.admin')

@section('title', 'Edit Pendaftar')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold mb-1">
            <i class="bi bi-pencil-square me-2"></i>
            Edit Pendaftar
        </h3>

        <p class="text-muted mb-0">
            Perbarui data calon anggota.
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
            action="{{ route('admin.pendaftaran.update', $pendaftaran->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="row g-3">

                <div class="col-md-6">

                    <label class="form-label fw-semibold">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        name="nama_lengkap"
                        class="form-control"
                        value="{{ old('nama_lengkap', $pendaftaran->nama_lengkap) }}"
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
                        value="{{ old('nim', $pendaftaran->nim) }}"
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
                        value="{{ old('email', $pendaftaran->email) }}"
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
                        value="{{ old('no_hp', $pendaftaran->no_hp) }}"
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

                        <option value="Laki-laki"
                            {{ old('jenis_kelamin', $pendaftaran->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                            Laki-laki
                        </option>

                        <option value="Perempuan"
                            {{ old('jenis_kelamin', $pendaftaran->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
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
                        value="{{ old('angkatan', $pendaftaran->angkatan) }}"
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
                    >{{ old('alamat', $pendaftaran->alamat) }}</textarea>

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
                    >{{ old('alasan_bergabung', $pendaftaran->alasan_bergabung) }}</textarea>

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

                        <option value="Menunggu"
                            {{ old('status', $pendaftaran->status) == 'Menunggu' ? 'selected' : '' }}>
                            Menunggu
                        </option>

                        <option value="Diterima"
                            {{ old('status', $pendaftaran->status) == 'Diterima' ? 'selected' : '' }}>
                            Diterima
                        </option>

                        <option value="Ditolak"
                            {{ old('status', $pendaftaran->status) == 'Ditolak' ? 'selected' : '' }}>
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
                Simpan Perubahan
            </button>

        </form>

    </div>

</div>

@endsection