@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h3 class="fw-bold">
            Edit Kegiatan
        </h3>

        <p class="text-muted">
            Perbarui informasi kegiatan.
        </p>

    </div>


    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form action="{{ route('admin.kegiatan.update', $kegiatan) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                @method('PUT')


                <div class="row">

                    <div class="col-md-8">

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Nama Kegiatan
                            </label>

                            <input type="text"
                                   name="nama_kegiatan"
                                   class="form-control"
                                   value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}">

                        </div>


                        <div class="row">

                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label class="form-label fw-semibold">
                                        Tanggal
                                    </label>

                                    <input type="date"
                                           name="tanggal"
                                           class="form-control"
                                           value="{{ old('tanggal', $kegiatan->tanggal->format('Y-m-d')) }}">

                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label class="form-label fw-semibold">
                                        Lokasi
                                    </label>

                                    <input type="text"
                                           name="lokasi"
                                           class="form-control"
                                           value="{{ old('lokasi', $kegiatan->lokasi) }}">

                                </div>

                            </div>

                        </div>


                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Deskripsi
                            </label>

                            <textarea name="deskripsi"
                                      rows="10"
                                      class="form-control">{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>

                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="card bg-light border-0">

                            <div class="card-body">

                                <h5 class="fw-bold mb-3">
                                    Pengaturan
                                </h5>


                                <div class="mb-3">

                                    <label class="form-label">
                                        Status
                                    </label>

                                    <select name="status"
                                            class="form-select">

                                        <option value="Akan Datang"
                                            {{ $kegiatan->status == 'Akan Datang' ? 'selected' : '' }}>

                                            Akan Datang

                                        </option>

                                        <option value="Berlangsung"
                                            {{ $kegiatan->status == 'Berlangsung' ? 'selected' : '' }}>

                                            Berlangsung

                                        </option>

                                        <option value="Selesai"
                                            {{ $kegiatan->status == 'Selesai' ? 'selected' : '' }}>

                                            Selesai

                                        </option>

                                    </select>

                                </div>


                                @if($kegiatan->gambar)

                                    <div class="mb-3">

                                        <label class="form-label">
                                            Foto Saat Ini
                                        </label>

                                        <img src="{{ asset('storage/' . $kegiatan->gambar) }}"
                                             class="img-fluid rounded">

                                    </div>

                                @endif


                                <div class="mb-3">

                                    <label class="form-label">
                                        Ganti Foto
                                    </label>

                                    <input type="file"
                                           name="gambar"
                                           class="form-control"
                                           accept="image/*">

                                </div>


                                <div class="d-grid gap-2">

                                    <button class="btn btn-primary">

                                        <i class="bi bi-save"></i>

                                        Update Kegiatan

                                    </button>


                                    <a href="{{ route('admin.kegiatan.index') }}"
                                       class="btn btn-secondary">

                                        Kembali

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection