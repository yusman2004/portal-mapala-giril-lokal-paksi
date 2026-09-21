@extends('layouts.admin')

@section('title', 'Tambah Kategori Berita')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-plus-circle me-2"></i>
                Tambah Kategori Berita
            </h3>

            <p class="text-muted mb-0">
                Tambahkan kategori berita baru untuk MAPALA Giril Lokal Paksi.
            </p>
        </div>

        <a href="{{ route('admin.kategori-berita.index') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left me-1"></i>
            Kembali

        </a>

    </div>


    @if($errors->any())

        <div class="alert alert-danger">

            <div class="fw-bold mb-2">
                <i class="bi bi-exclamation-triangle me-2"></i>
                Terjadi kesalahan:
            </div>

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">

                    <h5 class="fw-bold mb-0">

                        <i class="bi bi-tags me-2"></i>
                        Form Kategori

                    </h5>

                </div>


                <div class="card-body p-4">

                    <form
                        action="{{ route('admin.kategori-berita.store') }}"
                        method="POST"
                    >

                        @csrf


                        {{-- NAMA KATEGORI --}}
                        <div class="mb-4">

                            <label for="nama_kategori"
                                   class="form-label fw-semibold">

                                Nama Kategori
                                <span class="text-danger">*</span>

                            </label>

                            <input
                                type="text"
                                name="nama_kategori"
                                id="nama_kategori"
                                class="form-control @error('nama_kategori') is-invalid @enderror"
                                value="{{ old('nama_kategori') }}"
                                placeholder="Contoh: Kegiatan, Prestasi, Informasi"
                                required
                            >

                            @error('nama_kategori')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- DESKRIPSI --}}
                        <div class="mb-4">

                            <label for="deskripsi"
                                   class="form-label fw-semibold">

                                Deskripsi

                            </label>

                            <textarea
                                name="deskripsi"
                                id="deskripsi"
                                rows="5"
                                class="form-control @error('deskripsi') is-invalid @enderror"
                                placeholder="Masukkan deskripsi kategori..."
                            >{{ old('deskripsi') }}</textarea>

                            @error('deskripsi')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- BUTTON --}}
                        <div class="d-flex justify-content-end gap-2">

                            <a
                                href="{{ route('admin.kategori-berita.index') }}"
                                class="btn btn-light border"
                            >

                                <i class="bi bi-x-circle me-1"></i>
                                Batal

                            </a>


                            <button
                                type="submit"
                                class="btn btn-primary"
                            >

                                <i class="bi bi-save me-1"></i>
                                Simpan Kategori

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection