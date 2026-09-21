<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Tambah Anggota | MAPALA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-success text-white">

            <h5 class="mb-0">
                Tambah Data Anggota
            </h5>

        </div>

        <div class="card-body">

            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{ route('admin.anggota.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row g-3">

                    <div class="col-md-6">

                        <label class="form-label">
                            Nama Lengkap
                        </label>

                        <input type="text"
                               name="nama_lengkap"
                               class="form-control"
                               value="{{ old('nama_lengkap') }}"
                               required>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">
                            NIM
                        </label>

                        <input type="text"
                               name="nim"
                               class="form-control"
                               value="{{ old('nim') }}">

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">
                            Jenis Kelamin
                        </label>

                        <select name="jenis_kelamin"
                                class="form-select"
                                required>

                            <option value="">
                                Pilih Jenis Kelamin
                            </option>

                            <option value="Laki-laki">
                                Laki-laki
                            </option>

                            <option value="Perempuan">
                                Perempuan
                            </option>

                        </select>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">
                            Nomor HP
                        </label>

                        <input type="text"
                               name="no_hp"
                               class="form-control"
                               value="{{ old('no_hp') }}">

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">
                            Angkatan
                        </label>

                        <input type="text"
                               name="angkatan"
                               class="form-control"
                               value="{{ old('angkatan') }}">

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status"
                                class="form-select"
                                required>

                            <option value="Aktif">
                                Aktif
                            </option>

                            <option value="Tidak Aktif">
                                Tidak Aktif
                            </option>

                        </select>

                    </div>

                    <div class="col-12">

                        <label class="form-label">
                            Alamat
                        </label>

                        <textarea name="alamat"
                                  class="form-control"
                                  rows="3">{{ old('alamat') }}</textarea>

                    </div>

                    <div class="col-12">

                        <label class="form-label">
                            Foto Anggota
                        </label>

                        <input type="file"
                               name="foto"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.webp">

                        <small class="text-muted">
                            Maksimal 2 MB.
                        </small>

                    </div>

                </div>

                <div class="mt-4">

                    <button class="btn btn-success">
                        <i class="bi bi-save"></i>
                        Simpan
                    </button>

                    <a href="{{ route('admin.anggota.index') }}"
                       class="btn btn-secondary">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>