@extends('layouts.admin')

@section('title', 'Tambah Foto Galeri')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold mb-1">
            <i class="bi bi-image me-2"></i>
            Tambah Foto Galeri
        </h3>

        <p class="text-muted mb-0">
            Tambahkan dokumentasi kegiatan.
        </p>
    </div>

    <a
        href="{{ route('admin.galeri.index') }}"
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
            action="{{ route('admin.galeri.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="row g-4">

                <div class="col-md-8">

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Kegiatan
                        </label>

                        <select
                            name="kegiatan_id"
                            class="form-select"
                        >

                            <option value="">
                                -- Tidak terkait kegiatan --
                            </option>

                            @foreach($kegiatan as $item)

                                <option
                                    value="{{ $item->id }}"
                                    {{ old('kegiatan_id') == $item->id ? 'selected' : '' }}
                                >
                                    {{ $item->nama_kegiatan }}
                                    -
                                    {{ $item->tanggal?->format('d/m/Y') }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Judul Foto
                        </label>

                        <input
                            type="text"
                            name="judul"
                            class="form-control"
                            value="{{ old('judul') }}"
                            placeholder="Contoh: Pendakian Gunung Merapi"
                            required
                        >

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
                            required
                        >

                        <div class="form-text">
                            JPG, JPEG, PNG, WEBP. Maksimal 4 MB.
                        </div>

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Keterangan
                        </label>

                        <textarea
                            name="keterangan"
                            class="form-control"
                            rows="5"
                            placeholder="Tambahkan keterangan foto..."
                        >{{ old('keterangan') }}</textarea>

                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-save me-1"></i>
                        Simpan Foto
                    </button>

                </div>

                <div class="col-md-4">

                    <div class="card bg-light border-0">

                        <div class="card-body">

                            <h6 class="fw-bold">
                                <i class="bi bi-info-circle me-2"></i>
                                Informasi
                            </h6>

                            <p class="small text-muted mb-0">
                                Upload foto dokumentasi kegiatan
                                MAPALA Giril Lokal Paksi.
                                Foto akan tersimpan di storage aplikasi.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection