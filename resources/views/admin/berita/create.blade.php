@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-newspaper me-2"></i>
                Tambah Berita
            </h3>

            <p class="text-muted mb-0">
                Tambahkan berita baru MAPALA Giril Lokal Paksi.
            </p>
        </div>

        <a href="{{ route('admin.berita.index') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left me-1"></i>
            Kembali

        </a>

    </div>


    {{-- ERROR VALIDASI --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <strong>
                <i class="bi bi-exclamation-triangle me-2"></i>
                Terjadi kesalahan:
            </strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- FORM --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-primary text-white py-3">

            <h5 class="mb-0">
                <i class="bi bi-pencil-square me-2"></i>
                Form Berita
            </h5>

        </div>


        <div class="card-body p-4">

            <form
                action="{{ route('admin.berita.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


                {{-- JUDUL --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Judul Berita
                        <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        name="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul') }}"
                        placeholder="Masukkan judul berita"
                        required
                    >

                    @error('judul')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- KATEGORI --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Kategori Berita
                        <span class="text-danger">*</span>

                    </label>

                    <select
                        name="kategori_id"
                        class="form-select @error('kategori_id') is-invalid @enderror"
                        required
                    >

                        <option value="">
                            -- Pilih Kategori Berita --
                        </option>

                        @foreach($kategori as $item)

                            <option
                                value="{{ $item->id }}"
                                {{ old('kategori_id') == $item->id ? 'selected' : '' }}
                            >
                                {{ $item->nama_kategori }}
                            </option>

                        @endforeach

                    </select>

                    @error('kategori_id')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                    @if($kategori->count() == 0)

                        <div class="form-text text-danger">
                            Belum ada kategori berita.
                            Silakan buat kategori terlebih dahulu.
                        </div>

                    @endif

                </div>


                {{-- ISI --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Isi Berita
                        <span class="text-danger">*</span>

                    </label>

                    <textarea
                        name="isi"
                        rows="10"
                        class="form-control @error('isi') is-invalid @enderror"
                        placeholder="Tulis isi berita di sini..."
                        required
                    >{{ old('isi') }}</textarea>

                    @error('isi')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- GAMBAR --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Gambar Berita
                    </label>

                    <input
                        type="file"
                        name="gambar"
                        class="form-control @error('gambar') is-invalid @enderror"
                        accept="image/jpeg,image/png,image/webp"
                    >

                    <div class="form-text">
                        Format JPG, JPEG, PNG atau WEBP. Maksimal 2 MB.
                    </div>

                    @error('gambar')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- STATUS --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Status
                        <span class="text-danger">*</span>

                    </label>

                    <select
                        name="status"
                        class="form-select @error('status') is-invalid @enderror"
                        required
                    >

                        <option value="">
                            -- Pilih Status --
                        </option>

                        <option
                            value="Draft"
                            {{ old('status') == 'Draft' ? 'selected' : '' }}
                        >
                            Draft
                        </option>

                        <option
                            value="Publish"
                            {{ old('status') == 'Publish' ? 'selected' : '' }}
                        >
                            Publish
                        </option>

                    </select>

                    @error('status')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- TANGGAL PUBLISH --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Tanggal Publikasi
                    </label>

                    <input
                        type="datetime-local"
                        name="published_at"
                        class="form-control @error('published_at') is-invalid @enderror"
                        value="{{ old('published_at') }}"
                    >

                    <div class="form-text">
                        Bisa dikosongkan jika belum ingin menentukan tanggal publikasi.
                    </div>

                    @error('published_at')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- BUTTON --}}
                <div class="d-flex justify-content-end gap-2">

                    <a
                        href="{{ route('admin.berita.index') }}"
                        class="btn btn-secondary"
                    >

                        <i class="bi bi-x-circle me-1"></i>
                        Batal

                    </a>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <i class="bi bi-save me-1"></i>
                        Simpan Berita

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection