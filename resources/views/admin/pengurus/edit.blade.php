@extends('layouts.admin')

@section('title', 'Edit Pengurus')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-pencil-square me-2 text-success"></i>
                Edit Pengurus
            </h3>

            <p class="text-muted mb-0">
                Perbarui data struktur organisasi MAPALA Giril Lokal Paksi.
            </p>
        </div>

        <a href="{{ route('admin.pengurus.index') }}"
           class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>

    </div>


    {{-- ERROR --}}
    @if($errors->any())

        <div class="alert alert-danger border-0 shadow-sm mb-4">

            <div class="fw-bold mb-2">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                Periksa kembali data yang dimasukkan.
            </div>

            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif


    <div class="row g-4">


        {{-- FORM --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm edit-card">

                <div class="card-header bg-white border-0 p-4">

                    <div class="d-flex align-items-center">

                        <div class="header-icon me-3">
                            <i class="bi bi-person-gear"></i>
                        </div>

                        <div>
                            <h5 class="fw-bold mb-1">
                                Informasi Pengurus
                            </h5>

                            <small class="text-muted">
                                Ubah informasi pengurus di bawah ini.
                            </small>
                        </div>

                    </div>

                </div>


                <div class="card-body p-4">

                    <form
                        action="{{ route('admin.pengurus.update', ['pengurus' => $pengurus->id]) }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf
                        @method('PUT')


                        {{-- NAMA & JABATAN --}}
                        <div class="row g-3">

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Nama Lengkap
                                    <span class="text-danger">*</span>
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-person"></i>
                                    </span>

                                    <input
                                        type="text"
                                        name="nama"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        value="{{ old('nama', $pengurus->nama) }}"
                                        placeholder="Masukkan nama lengkap"
                                        required
                                    >

                                </div>

                                @error('nama')
                                    <div class="text-danger small mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Jabatan
                                    <span class="text-danger">*</span>
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-diagram-3"></i>
                                    </span>

                                    <input
                                        type="text"
                                        name="jabatan"
                                        class="form-control @error('jabatan') is-invalid @enderror"
                                        value="{{ old('jabatan', $pengurus->jabatan) }}"
                                        placeholder="Contoh: Ketua Umum"
                                        required
                                    >

                                </div>

                                @error('jabatan')
                                    <div class="text-danger small mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>


                        {{-- PERIODE & URUTAN --}}
                        <div class="row g-3 mt-1">

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Periode
                                    <span class="text-danger">*</span>
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-calendar3"></i>
                                    </span>

                                    <input
                                        type="text"
                                        name="periode"
                                        class="form-control @error('periode') is-invalid @enderror"
                                        value="{{ old('periode', $pengurus->periode) }}"
                                        placeholder="Contoh: 2025 - 2026"
                                        required
                                    >

                                </div>

                                @error('periode')
                                    <div class="text-danger small mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Urutan Tampil
                                    <span class="text-danger">*</span>
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-sort-numeric-down"></i>
                                    </span>

                                    <input
                                        type="number"
                                        name="urutan"
                                        class="form-control @error('urutan') is-invalid @enderror"
                                        value="{{ old('urutan', $pengurus->urutan) }}"
                                        min="1"
                                        required
                                    >

                                </div>

                                <div class="form-text">
                                    Menentukan posisi pengurus pada struktur organisasi.
                                </div>

                                @error('urutan')
                                    <div class="text-danger small mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>


                        {{-- FOTO --}}
                        <div class="mt-4">

                            <label class="form-label fw-semibold">
                                Ganti Foto
                            </label>

                            <div class="upload-area">

                                <div class="upload-icon">
                                    <i class="bi bi-cloud-arrow-up"></i>
                                </div>

                                <div class="flex-grow-1">

                                    <input
                                        type="file"
                                        name="foto"
                                        id="foto"
                                        class="form-control @error('foto') is-invalid @enderror"
                                        accept="image/*"
                                        onchange="previewFoto(event)"
                                    >

                                    <div class="form-text mt-2">
                                        Kosongkan jika tidak ingin mengganti foto.
                                        Format JPG, JPEG, PNG.
                                    </div>

                                </div>

                            </div>

                            @error('foto')
                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- DESKRIPSI --}}
                        <div class="mt-4">

                            <label class="form-label fw-semibold">
                                Deskripsi
                            </label>

                            <textarea
                                name="deskripsi"
                                class="form-control @error('deskripsi') is-invalid @enderror"
                                rows="6"
                                placeholder="Tuliskan deskripsi atau keterangan pengurus..."
                            >{{ old('deskripsi', $pengurus->deskripsi) }}</textarea>

                            @error('deskripsi')
                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- BUTTON --}}
                        <div class="d-flex justify-content-end gap-2 mt-4 pt-4 border-top">

                            <a
                                href="{{ route('admin.pengurus.index') }}"
                                class="btn btn-light border px-4"
                            >
                                <i class="bi bi-x-lg me-1"></i>
                                Batal
                            </a>

                            <button
                                type="submit"
                                class="btn btn-success px-4"
                            >
                                <i class="bi bi-check-lg me-1"></i>
                                Simpan Perubahan
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        {{-- SIDEBAR FOTO --}}
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm preview-card">

                <div class="card-header bg-white border-0 p-4">

                    <div class="d-flex align-items-center">

                        <div class="header-icon me-3">
                            <i class="bi bi-image"></i>
                        </div>

                        <div>
                            <h5 class="fw-bold mb-1">
                                Foto Pengurus
                            </h5>

                            <small class="text-muted">
                                Foto yang sedang digunakan.
                            </small>
                        </div>

                    </div>

                </div>


                <div class="card-body p-4 text-center">

                    <div class="photo-container">

                        @if($pengurus->foto)

                            <img
                                src="{{ asset('storage/' . $pengurus->foto) }}"
                                id="previewImage"
                                class="current-photo"
                                alt="{{ $pengurus->nama }}"
                            >

                        @else

                            <div
                                id="noPhoto"
                                class="no-photo"
                            >
                                <i class="bi bi-person"></i>
                            </div>

                            <img
                                id="previewImage"
                                class="current-photo d-none"
                                alt="Preview"
                            >

                        @endif

                    </div>


                    <h5 class="fw-bold mt-4 mb-1">
                        {{ $pengurus->nama }}
                    </h5>

                    <div class="text-success fw-semibold">
                        {{ $pengurus->jabatan }}
                    </div>


                    <div class="pengurus-info mt-4">

                        <div class="info-row">

                            <span>
                                <i class="bi bi-calendar3 me-2"></i>
                                Periode
                            </span>

                            <strong>
                                {{ $pengurus->periode }}
                            </strong>

                        </div>


                        <div class="info-row">

                            <span>
                                <i class="bi bi-sort-numeric-down me-2"></i>
                                Urutan
                            </span>

                            <strong>
                                {{ $pengurus->urutan }}
                            </strong>

                        </div>

                    </div>

                </div>

            </div>


            {{-- INFORMASI --}}
            <div class="info-box mt-4">

                <div class="d-flex">

                    <div class="info-box-icon">
                        <i class="bi bi-info-circle-fill"></i>
                    </div>

                    <div>

                        <h6 class="fw-bold mb-1">
                            Informasi
                        </h6>

                        <p class="small text-muted mb-0">
                            Foto baru akan menggantikan foto lama
                            setelah perubahan disimpan.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection


@push('styles')

<style>

.edit-card,
.preview-card {
    border-radius: 18px;
    overflow: hidden;
}

.header-icon {
    width: 45px;
    height: 45px;
    border-radius: 12px;
    background: #dcfce7;
    color: #166534;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}

.form-label {
    color: #374151;
}

.input-group-text {
    min-width: 46px;
    justify-content: center;
    background: #f8fafc;
    border-color: #d1d5db;
    color: #166534;
}

.form-control {
    min-height: 48px;
    border-color: #d1d5db;
}

textarea.form-control {
    min-height: 140px;
}

.form-control:focus {
    border-color: #198754;
    box-shadow: 0 0 0 .2rem rgba(25,135,84,.12);
}

.upload-area {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 18px;
    background: #f8fafc;
    border: 1px dashed #cbd5e1;
    border-radius: 14px;
}

.upload-icon {
    width: 50px;
    height: 50px;
    min-width: 50px;
    border-radius: 12px;
    background: #dcfce7;
    color: #166534;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
}

.photo-container {
    width: 100%;
    height: 300px;
    border-radius: 18px;
    overflow: hidden;
    background: #f0fdf4;
    border: 1px solid #dcfce7;
    display: flex;
    align-items: center;
    justify-content: center;
}

.current-photo {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.no-photo {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #86efac;
    font-size: 6rem;
}

.pengurus-info {
    background: #f8fafc;
    border-radius: 14px;
    padding: 15px;
    text-align: left;
}

.info-row {
    display: flex;
    justify-content: space-between;
    gap: 15px;
    padding: 10px 0;
    border-bottom: 1px solid #e5e7eb;
    font-size: .9rem;
}

.info-row:last-child {
    border-bottom: 0;
}

.info-row span {
    color: #6b7280;
}

.info-row i {
    color: #166534;
}

.info-row strong {
    color: #374151;
}

.info-box {
    padding: 18px;
    border-radius: 16px;
    background: #f0fdf4;
    border: 1px solid #dcfce7;
}

.info-box-icon {
    width: 40px;
    height: 40px;
    min-width: 40px;
    border-radius: 10px;
    background: #166534;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 12px;
}

.btn-success {
    background: #166534;
    border-color: #166534;
}

.btn-success:hover {
    background: #14532d;
    border-color: #14532d;
}

@media (max-width: 767px) {

    .upload-area {
        flex-direction: column;
        align-items: stretch;
    }

    .upload-icon {
        margin: auto;
    }

    .photo-container {
        height: 250px;
    }

}

</style>

@endpush


@push('scripts')

<script>

function previewFoto(event) {

    const input = event.target;

    const preview = document.getElementById('previewImage');

    const noPhoto = document.getElementById('noPhoto');

    if (input.files && input.files[0]) {

        const reader = new FileReader();

        reader.onload = function(e) {

            preview.src = e.target.result;

            preview.classList.remove('d-none');

            if (noPhoto) {
                noPhoto.classList.add('d-none');
            }

        };

        reader.readAsDataURL(input.files[0]);

    }

}

</script>

@endpush