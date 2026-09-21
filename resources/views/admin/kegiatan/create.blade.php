@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h3 class="fw-bold">
            Tambah Kegiatan
        </h3>

        <p class="text-muted">
            Tambahkan kegiatan baru MAPALA Giril Lokal Paksi.
        </p>

    </div>


    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form action="{{ route('admin.kegiatan.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf


                <div class="row">

                    <div class="col-md-8">

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Nama Kegiatan
                            </label>

                            <input type="text"
                                   name="nama_kegiatan"
                                   class="form-control"
                                   value="{{ old('nama_kegiatan') }}"
                                   placeholder="Contoh: Pendakian Gunung Merapi">

                            @error('nama_kegiatan')

                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>

                            @enderror

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
                                           value="{{ old('tanggal') }}">

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
                                           value="{{ old('lokasi') }}"
                                           placeholder="Contoh: Gunung Merapi">

                                </div>

                            </div>

                        </div>


                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Deskripsi Kegiatan
                            </label>

                            <textarea name="deskripsi"
                                      rows="10"
                                      class="form-control"
                                      placeholder="Jelaskan kegiatan...">{{ old('deskripsi') }}</textarea>

                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="card bg-light border-0">

                            <div class="card-body">

                                <h5 class="fw-bold mb-3">
                                    Pengaturan
                                </h5>


                                <div class="mb-3">

                                    <label class="form-label fw-semibold">
                                        Status
                                    </label>

                                    <select name="status"
                                            class="form-select">

                                        <option value="Akan Datang">
                                            Akan Datang
                                        </option>

                                        <option value="Berlangsung">
                                            Berlangsung
                                        </option>

                                        <option value="Selesai">
                                            Selesai
                                        </option>

                                    </select>

                                </div>


                                <div class="mb-3">

                                    <label class="form-label fw-semibold">
                                        Foto Kegiatan
                                    </label>

                                    <input type="file"
                                           name="gambar"
                                           class="form-control"
                                           accept="image/*">

                                    <small class="text-muted">
                                        JPG, JPEG, PNG atau WEBP.
                                        Maksimal 2 MB.
                                    </small>

                                </div>


                                <div class="d-grid gap-2">

                                    <button class="btn btn-primary">

                                        <i class="bi bi-save"></i>

                                        Simpan Kegiatan

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