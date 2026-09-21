@csrf

@if(isset($anggota))
    @method('PUT')
@endif

<div class="row g-3">

    <div class="col-md-6">

        <label class="form-label">
            Nama Lengkap
        </label>

        <input type="text"
               name="nama_lengkap"
               class="form-control"
               value="{{ old('nama_lengkap', $anggota->nama_lengkap ?? '') }}"
               required>

    </div>

    <div class="col-md-6">

        <label class="form-label">
            NIM
        </label>

        <input type="text"
               name="nim"
               class="form-control"
               value="{{ old('nim', $anggota->nim ?? '') }}">

    </div>

    <div class="col-md-6">

        <label class="form-label">
            Jenis Kelamin
        </label>

        <select name="jenis_kelamin"
                class="form-select"
                required>

            <option value="Laki-laki"
                @selected(old('jenis_kelamin', $anggota->jenis_kelamin ?? '') === 'Laki-laki')>
                Laki-laki
            </option>

            <option value="Perempuan"
                @selected(old('jenis_kelamin', $anggota->jenis_kelamin ?? '') === 'Perempuan')>
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
               value="{{ old('no_hp', $anggota->no_hp ?? '') }}">

    </div>

    <div class="col-md-6">

        <label class="form-label">
            Angkatan
        </label>

        <input type="text"
               name="angkatan"
               class="form-control"
               value="{{ old('angkatan', $anggota->angkatan ?? '') }}">

    </div>

    <div class="col-md-6">

        <label class="form-label">
            Status
        </label>

        <select name="status"
                class="form-select"
                required>

            <option value="Aktif"
                @selected(old('status', $anggota->status ?? '') === 'Aktif')>
                Aktif
            </option>

            <option value="Tidak Aktif"
                @selected(old('status', $anggota->status ?? '') === 'Tidak Aktif')>
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
                  rows="3">{{ old('alamat', $anggota->alamat ?? '') }}</textarea>

    </div>

    <div class="col-12">

        <label class="form-label">
            Foto Anggota
        </label>

        <input type="file"
               name="foto"
               class="form-control"
               accept=".jpg,.jpeg,.png,.webp">

        @if(isset($anggota) && $anggota->foto)

            <img src="{{ asset('storage/' . $anggota->foto) }}"
                 width="100"
                 class="mt-2 rounded">

        @endif

    </div>

</div>