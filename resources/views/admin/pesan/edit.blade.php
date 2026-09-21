@extends('layouts.admin')

@section('title', 'Edit Pesan')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold mb-1">
            <i class="bi bi-pencil-square me-2"></i>
            Edit Pesan
        </h3>
    </div>

    <a href="{{ route('admin.pesan.index') }}"
       class="btn btn-secondary">

        <i class="bi bi-arrow-left me-1"></i>
        Kembali

    </a>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body p-4">

        <form action="{{ route('admin.pesan.update', ['pesan' => $pesan->id]) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Nama
                    </label>

                    <input type="text"
                           name="nama"
                           class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama', $pesan->nama) }}">

                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email', $pesan->email) }}">

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Nomor Telepon
                </label>

                <input type="text"
                       name="telepon"
                       class="form-control"
                       value="{{ old('telepon', $pesan->telepon) }}">

            </div>

            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Subjek
                </label>

                <input type="text"
                       name="subjek"
                       class="form-control @error('subjek') is-invalid @enderror"
                       value="{{ old('subjek', $pesan->subjek) }}">

                @error('subjek')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Pesan
                </label>

                <textarea name="pesan"
                          rows="7"
                          class="form-control @error('pesan') is-invalid @enderror">{{ old('pesan', $pesan->pesan) }}</textarea>

                @error('pesan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <button type="submit"
                    class="btn btn-primary">

                <i class="bi bi-save me-1"></i>
                Simpan Perubahan

            </button>

        </form>

    </div>

</div>

@endsection