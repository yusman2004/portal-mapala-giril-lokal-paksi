@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-pencil-square me-2"></i>
                Edit Berita
            </h3>

            <p class="text-muted mb-0">
                Perbarui informasi berita MAPALA Giril Lokal Paksi.
            </p>
        </div>

        <div class="d-flex gap-2">

            <a
                href="{{ route('admin.berita.show', ['berita' => $berita->id]) }}"
                class="btn btn-info text-white"
            >
                <i class="bi bi-eye me-1"></i>
                Lihat
            </a>

            <a
                href="{{ route('admin.berita.index') }}"
                class="btn btn-secondary"
            >
                <i class="bi bi-arrow-left me-1"></i>
                Kembali
            </a>

        </div>

    </div>


    {{-- ERROR VALIDASI --}}
    @if($errors->any())

        <div class="alert alert-danger alert-dismissible fade show">

            <i class="bi bi-exclamation-triangle me-2"></i>

            <strong>
                Terjadi kesalahan:
            </strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif


    <div class="row g-4">

        {{-- FORM UTAMA --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-warning py-3">

                    <h5 class="mb-0 fw-bold">

                        <i class="bi bi-pencil-square me-2"></i>

                        Form Edit Berita

                    </h5>

                </div>


                <div class="card-body p-4">

                    <form
                        action="{{ route('admin.berita.update', ['berita' => $berita->id]) }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf

                        @method('PUT')


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
                                value="{{ old('judul', $berita->judul) }}"
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
                                        {{ old('kategori_id', $berita->kategori_id) == $item->id ? 'selected' : '' }}
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

                        </div>


                        {{-- ISI BERITA --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Isi Berita

                                <span class="text-danger">*</span>

                            </label>

                            <textarea
                                name="isi"
                                rows="12"
                                class="form-control @error('isi') is-invalid @enderror"
                                placeholder="Tulis isi berita..."
                                required
                            >{{ old('isi', $berita->isi) }}</textarea>

                            @error('isi')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- GAMBAR BARU --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Ganti Gambar Berita
                            </label>

                            <input
                                type="file"
                                name="gambar"
                                class="form-control @error('gambar') is-invalid @enderror"
                                accept="image/jpeg,image/png,image/webp"
                            >

                            <div class="form-text">
                                Kosongkan jika tidak ingin mengganti gambar.
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

                                <option value="Draft"
                                    {{ old('status', $berita->status) == 'Draft' ? 'selected' : '' }}>
                                    Draft
                                </option>

                                <option value="Publish"
                                    {{ old('status', $berita->status) == 'Publish' ? 'selected' : '' }}>
                                    Publish
                                </option>

                            </select>

                            @error('status')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- TANGGAL PUBLIKASI --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Tanggal Publikasi
                            </label>

                            <input
                                type="datetime-local"
                                name="published_at"
                                class="form-control @error('published_at') is-invalid @enderror"
                                value="{{ old(
                                    'published_at',
                                    $berita->published_at
                                        ? \Carbon\Carbon::parse($berita->published_at)->format('Y-m-d\TH:i')
                                        : ''
                                ) }}"
                            >

                            <div class="form-text">
                                Tanggal ini digunakan ketika berita dipublikasikan.
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
                                class="btn btn-warning"
                            >

                                <i class="bi bi-save me-1"></i>

                                Simpan Perubahan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        {{-- SIDEBAR --}}
        <div class="col-lg-4">

            {{-- GAMBAR SAAT INI --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header">

                    <h5 class="mb-0">

                        <i class="bi bi-image me-2"></i>

                        Gambar Saat Ini

                    </h5>

                </div>


                <div class="card-body">

                    @if($berita->gambar)

                        <img
                            src="{{ asset('storage/' . $berita->gambar) }}"
                            alt="{{ $berita->judul }}"
                            class="img-fluid rounded"
                            style="
                                width: 100%;
                                max-height: 300px;
                                object-fit: cover;
                            "
                        >

                    @else

                        <div
                            class="bg-light rounded d-flex align-items-center justify-content-center"
                            style="height: 250px;"
                        >

                            <div class="text-center text-muted">

                                <i class="bi bi-image fs-1"></i>

                                <p class="mb-0 mt-2">
                                    Belum ada gambar
                                </p>

                            </div>

                        </div>

                    @endif

                </div>

            </div>


            {{-- INFORMASI --}}
            <div class="card border-0 shadow-sm">

                <div class="card-header">

                    <h5 class="mb-0">

                        <i class="bi bi-info-circle me-2"></i>

                        Informasi

                    </h5>

                </div>


                <div class="card-body">

                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Slug
                        </small>

                        <code>
                            {{ $berita->slug }}
                        </code>

                    </div>


                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Dibuat
                        </small>

                        <strong>

                            @if($berita->created_at)

                                {{ $berita->created_at->format('d/m/Y H:i') }}

                            @else

                                -

                            @endif

                        </strong>

                    </div>


                    <div>

                        <small class="text-muted d-block">
                            Terakhir Diperbarui
                        </small>

                        <strong>

                            @if($berita->updated_at)

                                {{ $berita->updated_at->format('d/m/Y H:i') }}

                            @else

                                -

                            @endif

                        </strong>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection