@extends('layouts.public')

@section('title', 'Pendaftaran Anggota | MAPALA Giril Lokal Paksi')

@section('content')

<section class="hero-page">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <span class="badge bg-light text-success mb-3 px-3 py-2">
                    PENDAFTARAN ANGGOTA BARU
                </span>

                <h1 class="display-5 fw-bold mb-3">
                    Bergabung Bersama
                    MAPALA Giril Lokal Paksi
                </h1>

                <p class="lead mb-0">
                    Jadilah bagian dari keluarga pecinta alam
                    yang aktif, solid, bertanggung jawab,
                    dan peduli terhadap lingkungan.
                </p>

            </div>

        </div>

    </div>

</section>

<section class="py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-9">

                @if($errors->any())

                    <div class="alert alert-danger">

                        <div class="fw-bold mb-2">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            Periksa kembali formulir Anda.
                        </div>

                        <ul class="mb-0">

                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                @endif

                <div class="card form-card">

                    <div class="card-body p-4 p-lg-5">

                        <div class="mb-4">

                            <h3 class="fw-bold">
                                Formulir Pendaftaran
                            </h3>

                            <p class="text-muted mb-0">
                                Silakan isi data dengan benar.
                                Setelah dikirim, data akan diverifikasi
                                oleh pengurus MAPALA.
                            </p>

                        </div>

                        <form
                            action="{{ route('pendaftaran.store') }}"
                            method="POST"
                        >

                            @csrf

                            <div class="row g-4">

                                <div class="col-md-6">

                                    <label class="form-label">
                                        Nama Lengkap
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="nama_lengkap"
                                        class="form-control"
                                        value="{{ old('nama_lengkap') }}"
                                        placeholder="Masukkan nama lengkap"
                                        required
                                    >

                                </div>

                                <div class="col-md-6">

                                    <label class="form-label">
                                        NIM
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="nim"
                                        class="form-control"
                                        value="{{ old('nim') }}"
                                        placeholder="Masukkan NIM"
                                        required
                                    >

                                </div>

                                <div class="col-md-6">

                                    <label class="form-label">
                                        Email
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        value="{{ old('email') }}"
                                        placeholder="nama@email.com"
                                        required
                                    >

                                </div>

                                <div class="col-md-6">

                                    <label class="form-label">
                                        Nomor HP / WhatsApp
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="no_hp"
                                        class="form-control"
                                        value="{{ old('no_hp') }}"
                                        placeholder="08xxxxxxxxxx"
                                        required
                                    >

                                </div>

                                <div class="col-md-6">

                                    <label class="form-label">
                                        Jenis Kelamin
                                        <span class="text-danger">*</span>
                                    </label>

                                    <select
                                        name="jenis_kelamin"
                                        class="form-select"
                                        required
                                    >

                                        <option value="">
                                            -- Pilih Jenis Kelamin --
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

                                    <label class="form-label">
                                        Angkatan
                                        <span class="text-danger">*</span>
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

                                    <label class="form-label">
                                        Alamat Lengkap
                                        <span class="text-danger">*</span>
                                    </label>

                                    <textarea
                                        name="alamat"
                                        class="form-control"
                                        rows="4"
                                        placeholder="Masukkan alamat lengkap"
                                        required
                                    >{{ old('alamat') }}</textarea>

                                </div>

                                <div class="col-12">

                                    <label class="form-label">
                                        Alasan Bergabung
                                        <span class="text-danger">*</span>
                                    </label>

                                    <textarea
                                        name="alasan_bergabung"
                                        class="form-control"
                                        rows="5"
                                        placeholder="Ceritakan alasan Anda ingin bergabung dengan MAPALA..."
                                        required
                                    >{{ old('alasan_bergabung') }}</textarea>

                                </div>

                                <div class="col-12">

                                    <div class="alert alert-success border-0">

                                        <i class="bi bi-info-circle me-2"></i>

                                        Data pendaftaran Anda akan masuk
                                        ke sistem dan diperiksa oleh
                                        pengurus MAPALA.

                                    </div>

                                </div>

                                <div class="col-12">

                                    <div class="d-flex flex-column flex-sm-row gap-2">

                                        <button
                                            type="submit"
                                            class="btn btn-success btn-lg px-4"
                                        >
                                            <i class="bi bi-send me-2"></i>
                                            Kirim Pendaftaran
                                        </button>

                                        <a
                                            href="{{ url('/') }}"
                                            class="btn btn-outline-secondary btn-lg px-4"
                                        >
                                            <i class="bi bi-arrow-left me-2"></i>
                                            Kembali
                                        </a>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection