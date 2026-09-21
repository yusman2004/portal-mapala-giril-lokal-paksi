@extends('layouts.admin')

@section('title', 'Edit Foto Galeri')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold mb-1">
            <i class="bi bi-pencil-square me-2"></i>
            Edit Foto Galeri
        </h3>

        <p class="text-muted mb-0">
            Perbarui informasi dan foto galeri.
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
            action="{{ route('admin.galeri.update', $galeri->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

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
                                    {{ old('kegiatan_id', $galeri->kegiatan_id) == $item->id ? 'selected' : '' }}
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
                            value="{{ old('judul', $galeri->judul) }}"
                            required
                        >

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Ganti Foto
                        </label>

                        <input
                            type="file"
                            name="foto"
                            class="form-control"
                            accept="image/*"
                        >

                        <div class="form-text">
                            Kosongkan jika tidak ingin mengganti foto.
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
                        >{{ old('keterangan', $galeri->keterangan) }}</textarea>

                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-save me-1"></i>
                        Simpan Perubahan
                    </button>

                </div>

                <div class="col-md-4">

                    <label class="form-label fw-semibold">
                        Foto Saat Ini
                    </label>

                    @if($galeri->foto)

                        <img
                            src="{{ asset('storage/' . $galeri->foto) }}"
                            class="img-fluid rounded shadow-sm"
                            style="
                                width:100%;
                                max-height:350px;
                                object-fit:cover;
                            "
                            alt="{{ $galeri->judul }}"
                        >

                    @else

                        <div class="alert alert-secondary">
                            Belum ada foto.
                        </div>

                    @endif

                </div>

            </div>

        </form>

    </div>

</div>

@endsection