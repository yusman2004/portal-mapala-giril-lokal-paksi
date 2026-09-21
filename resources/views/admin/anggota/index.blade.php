
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Data Anggota | MAPALA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .05);
        }

        .btn-success {
            background: #1b4332;
            border: none;
        }

        .btn-success:hover {
            background: #2d6a4f;
        }

        .table img {
            width: 45px;
            height: 45px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
</head>

<body>

<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                Data Anggota
            </h3>

            <p class="text-muted mb-0">
                Kelola anggota MAPALA Giril Lokal Paksi
            </p>
        </div>

        <a href="{{ route('admin.anggota.create') }}"
           class="btn btn-success">

            <i class="bi bi-plus-lg"></i>
            Tambah Anggota

        </a>

    </div>


    {{-- PESAN SUCCESS --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- PESAN ERROR --}}
    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show">

            <i class="bi bi-exclamation-triangle me-2"></i>

            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- CARD --}}
    <div class="card p-4">

        {{-- SEARCH --}}
        <form method="GET"
              action="{{ route('admin.anggota.index') }}"
              class="row g-2 mb-4">

            <div class="col-md-8">

                <input type="text"
                       name="search"
                       class="form-control"
                       placeholder="Cari nama, NIM, atau angkatan..."
                       value="{{ request('search') }}">

            </div>

            <div class="col-md-4">

                <button type="submit"
                        class="btn btn-success">

                    <i class="bi bi-search"></i>
                    Cari

                </button>

                <a href="{{ route('admin.anggota.index') }}"
                   class="btn btn-secondary">

                    <i class="bi bi-arrow-clockwise"></i>
                    Reset

                </a>

            </div>

        </form>


        {{-- TABLE --}}
        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Angkatan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                </thead>


                <tbody>

                    @forelse($anggota as $item)

                        <tr>

                            {{-- NOMOR --}}
                            <td>
                                {{ $anggota->firstItem() + $loop->index }}
                            </td>


                            {{-- FOTO --}}
                            <td>

                                @if($item->foto)

                                    <img src="{{ asset('storage/' . $item->foto) }}"
                                         alt="Foto Anggota">

                                @else

                                    <i class="bi bi-person-circle fs-2 text-secondary"></i>

                                @endif

                            </td>


                            {{-- NAMA --}}
                            <td>
                                <strong>
                                    {{ $item->nama_lengkap }}
                                </strong>
                            </td>


                            {{-- NIM --}}
                            <td>
                                {{ $item->nim ?? '-' }}
                            </td>


                            {{-- ANGKATAN --}}
                            <td>
                                {{ $item->angkatan ?? '-' }}
                            </td>


                            {{-- STATUS --}}
                            <td>

                                @if($item->status === 'Aktif')

                                    <span class="badge bg-success">
                                        <i class="bi bi-check-circle me-1"></i>
                                        Aktif
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        <i class="bi bi-dash-circle me-1"></i>
                                        Tidak Aktif
                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td>

                                {{-- DETAIL --}}
                                <a href="{{ route('admin.anggota.show', ['anggota' => $item->id]) }}"
                                   class="btn btn-sm btn-info text-white"
                                   title="Lihat Detail">

                                    <i class="bi bi-eye"></i>

                                </a>


                                {{-- EDIT --}}
                                <a href="{{ route('admin.anggota.edit', ['anggota' => $item->id]) }}"
                                   class="btn btn-sm btn-warning"
                                   title="Edit Anggota">

                                    <i class="bi bi-pencil"></i>

                                </a>


                                {{-- HAPUS --}}
                                <form action="{{ route('admin.anggota.destroy', ['anggota' => $item->id]) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Apakah kamu yakin ingin menghapus data anggota ini?')">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            title="Hapus Anggota">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7"
                                class="text-center text-muted py-5">

                                <i class="bi bi-people fs-1 d-block mb-3"></i>

                                <h6>Belum ada data anggota</h6>

                                <p class="mb-0">
                                    Silakan tambahkan anggota baru.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        <div class="mt-3">

            {{ $anggota->links() }}

        </div>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>

