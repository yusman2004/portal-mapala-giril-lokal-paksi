@extends('layouts.admin')

@section('title', 'Pesan Pengunjung')

@section('content')

<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">

    <div>
        <h3 class="fw-bold mb-1">
            <i class="bi bi-envelope me-2"></i>
            Pesan Pengunjung
        </h3>

        <p class="text-muted mb-0">
            Kelola pesan yang dikirim melalui halaman kontak.
        </p>
    </div>

</div>


{{-- SUCCESS MESSAGE --}}
@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show shadow-sm">
        <i class="bi bi-check-circle me-2"></i>

        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>
    </div>

@endif


{{-- ERROR MESSAGE --}}
@if(session('error'))

    <div class="alert alert-danger alert-dismissible fade show shadow-sm">
        <i class="bi bi-exclamation-circle me-2"></i>

        {{ session('error') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>
    </div>

@endif


<div class="card border-0 shadow-sm">

    <div class="card-body">

        {{-- FILTER --}}
        <form method="GET"
              action="{{ route('admin.pesan.index') }}"
              class="row g-2 mb-4">

            {{-- SEARCH --}}
            <div class="col-md-6">

                <div class="input-group">

                    <span class="input-group-text bg-white">
                        <i class="bi bi-search"></i>
                    </span>

                    <input type="text"
                           name="search"
                           class="form-control"
                           placeholder="Cari nama, email, atau subjek..."
                           value="{{ request('search') }}">

                </div>

            </div>


            {{-- FILTER BACA --}}
            <div class="col-md-3">

                <select name="status"
                        class="form-select">

                    <option value="">
                        Semua Pesan
                    </option>

                    <option value="belum"
                        {{ request('status') === 'belum' ? 'selected' : '' }}>
                        Belum Dibaca
                    </option>

                    <option value="sudah"
                        {{ request('status') === 'sudah' ? 'selected' : '' }}>
                        Sudah Dibaca
                    </option>

                </select>

            </div>


            {{-- BUTTON --}}
            <div class="col-md-3">

                <button type="submit"
                        class="btn btn-primary w-100">

                    <i class="bi bi-search me-1"></i>
                    Cari

                </button>

            </div>

        </form>


        {{-- DATA PESAN --}}
        @if($pesan->count())

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th width="50">
                                #
                            </th>

                            <th>
                                Pengirim
                            </th>

                            <th>
                                Subjek
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Tanggal
                            </th>

                            <th width="150">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                    @foreach($pesan as $item)

                        <tr class="{{ !$item->sudah_dibaca ? 'fw-semibold' : '' }}">

                            {{-- NOMOR --}}
                            <td>

                                {{ $pesan->firstItem() + $loop->index }}

                            </td>


                            {{-- PENGIRIM --}}
                            <td>

                                <div class="d-flex align-items-center">

                                    <i class="bi bi-person-circle fs-5 me-2 text-primary"></i>

                                    <div>

                                        <div>
                                            {{ $item->nama }}
                                        </div>

                                        <small class="text-muted">
                                            {{ $item->email }}
                                        </small>

                                        @if($item->telepon)

                                            <div>
                                                <small class="text-muted">
                                                    <i class="bi bi-telephone me-1"></i>
                                                    {{ $item->telepon }}
                                                </small>
                                            </div>

                                        @endif

                                    </div>

                                </div>

                            </td>


                            {{-- SUBJEK --}}
                            <td>

                                <div class="text-truncate"
                                     style="max-width: 300px;">

                                    {{ $item->subjek }}

                                </div>

                            </td>


                            {{-- STATUS --}}
                            <td>

                                @if($item->sudah_dibaca)

                                    <span class="badge bg-success">

                                        <i class="bi bi-envelope-open me-1"></i>

                                        Sudah Dibaca

                                    </span>

                                @else

                                    <span class="badge bg-warning text-dark">

                                        <i class="bi bi-envelope me-1"></i>

                                        Belum Dibaca

                                    </span>

                                @endif

                            </td>


                            {{-- TANGGAL --}}
                            <td>

                                <small class="text-muted">

                                    <i class="bi bi-calendar3 me-1"></i>

                                    {{ $item->created_at->format('d/m/Y H:i') }}

                                </small>

                            </td>


                            {{-- AKSI --}}
                            <td>

                                <div class="d-flex gap-1">

                                    {{-- LIHAT --}}
                                    <a href="{{ route('admin.pesan.show', ['pesan' => $item->id]) }}"
                                       class="btn btn-sm btn-info text-white"
                                       title="Lihat Pesan">

                                        <i class="bi bi-eye"></i>

                                    </a>


                                    {{-- EDIT --}}
                                    <a href="{{ route('admin.pesan.edit', ['pesan' => $item->id]) }}"
                                       class="btn btn-sm btn-warning"
                                       title="Edit Pesan">

                                        <i class="bi bi-pencil"></i>

                                    </a>


                                    {{-- HAPUS --}}
                                    <form action="{{ route('admin.pesan.destroy', ['pesan' => $item->id]) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">

                                        @csrf

                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                title="Hapus Pesan">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>


            {{-- PAGINATION --}}
            <div class="mt-3">

                {{ $pesan->links() }}

            </div>


        @else

            {{-- EMPTY --}}
            <div class="text-center py-5">

                <div class="mb-3">

                    <i class="bi bi-envelope-open display-1 text-muted"></i>

                </div>

                <h5 class="fw-bold">
                    Belum ada pesan
                </h5>

                <p class="text-muted mb-0">
                    Pesan dari pengunjung akan muncul di halaman ini.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection