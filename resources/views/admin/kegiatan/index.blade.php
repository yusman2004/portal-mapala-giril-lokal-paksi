@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Kegiatan MAPALA
            </h3>

            <p class="text-muted mb-0">
                Kelola seluruh kegiatan Giril Lokal Paksi
            </p>

        </div>

        <a href="{{ route('admin.kegiatan.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>

            Tambah Kegiatan

        </a>

    </div>


    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    <div class="card border-0 shadow-sm">

        <div class="card-body">


            <form method="GET"
                  action="{{ route('admin.kegiatan.index') }}"
                  class="row g-2 mb-4">

                <div class="col-md-6">

                    <input type="text"
                           name="search"
                           class="form-control"
                           value="{{ request('search') }}"
                           placeholder="Cari kegiatan atau lokasi...">

                </div>


                <div class="col-md-3">

                    <select name="status"
                            class="form-select">

                        <option value="">
                            Semua Status
                        </option>

                        <option value="Akan Datang"
                            {{ request('status') == 'Akan Datang' ? 'selected' : '' }}>

                            Akan Datang

                        </option>

                        <option value="Berlangsung"
                            {{ request('status') == 'Berlangsung' ? 'selected' : '' }}>

                            Berlangsung

                        </option>

                        <option value="Selesai"
                            {{ request('status') == 'Selesai' ? 'selected' : '' }}>

                            Selesai

                        </option>

                    </select>

                </div>


                <div class="col-md-3">

                    <button class="btn btn-dark">

                        <i class="bi bi-search"></i>

                        Cari

                    </button>

                    <a href="{{ route('admin.kegiatan.index') }}"
                       class="btn btn-secondary">

                        Reset

                    </a>

                </div>

            </form>


            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>No</th>

                            <th>Foto</th>

                            <th>Nama Kegiatan</th>

                            <th>Tanggal</th>

                            <th>Lokasi</th>

                            <th>Status</th>

                            <th>Aksi</th>

                        </tr>

                    </thead>


                    <tbody>

                    @forelse($kegiatan as $item)

                        <tr>

                            <td>
                                {{ $kegiatan->firstItem() + $loop->index }}
                            </td>


                            <td>

                                @if($item->gambar)

                                    <img src="{{ asset('storage/' . $item->gambar) }}"
                                         width="80"
                                         height="55"
                                         class="rounded"
                                         style="object-fit:cover">

                                @else

                                    <div class="bg-light rounded d-flex
                                                align-items-center
                                                justify-content-center"
                                         style="width:80px;height:55px">

                                        <i class="bi bi-image text-muted"></i>

                                    </div>

                                @endif

                            </td>


                            <td>

                                <strong>
                                    {{ $item->nama_kegiatan }}
                                </strong>

                            </td>


                            <td>

                                {{ $item->tanggal->format('d M Y') }}

                            </td>


                            <td>

                                <i class="bi bi-geo-alt text-danger"></i>

                                {{ $item->lokasi }}

                            </td>


                            <td>

                                @if($item->status === 'Akan Datang')

                                    <span class="badge bg-primary">
                                        Akan Datang
                                    </span>

                                @elseif($item->status === 'Berlangsung')

                                    <span class="badge bg-warning text-dark">
                                        Berlangsung
                                    </span>

                                @else

                                    <span class="badge bg-success">
                                        Selesai
                                    </span>

                                @endif

                            </td>


                            <td>

                                <a href="{{ route('admin.kegiatan.show', $item) }}"
                                   class="btn btn-sm btn-info text-white">

                                    <i class="bi bi-eye"></i>

                                </a>


                                <a href="{{ route('admin.kegiatan.edit', $item) }}"
                                   class="btn btn-sm btn-warning">

                                    <i class="bi bi-pencil"></i>

                                </a>


                                <form action="{{ route('admin.kegiatan.destroy', $item) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?')">

                                    @csrf

                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7"
                                class="text-center py-5">

                                <i class="bi bi-calendar-event fs-1 text-muted"></i>

                                <h5 class="mt-3">
                                    Belum ada kegiatan
                                </h5>

                                <p class="text-muted">
                                    Silakan tambahkan kegiatan MAPALA.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>


            {{ $kegiatan->links() }}

        </div>

    </div>

</div>

@endsection