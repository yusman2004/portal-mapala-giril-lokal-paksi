@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h3 class="fw-bold">Edit Kategori Berita</h3>
    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form action="{{ route('admin.kategori-berita.update', $kategoriBerita) }}"
                  method="POST"><form action="{{ route('admin.kategori-berita.update', ['kategori_berita' => $kategoriBerita->id]) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Nama Kategori
                    </label>

                    <input type="text"
                           name="nama_kategori"
                           class="form-control"
                           value="{{ old('nama_kategori', $kategoriBerita->nama_kategori) }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea name="deskripsi"
                              class="form-control"
                              rows="4">{{ old('deskripsi', $kategoriBerita->deskripsi) }}</textarea>

                </div>

                <a href="{{ route('admin.kategori-berita.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

                <button class="btn btn-primary">
                    Update Kategori
                </button>

            </form>

        </div>

    </div>

</div>

@endsection