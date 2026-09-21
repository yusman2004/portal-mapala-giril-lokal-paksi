@extends('layouts.admin')

@section('title', 'Pendaftaran Anggota')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold mb-1">
            <i class="bi bi-person-plus me-2"></i>
            Pendaftaran Anggota
        </h3>

        <p class="text-muted mb-0">
            Kelola pendaftaran calon anggota MAPALA.
        </p>
    </div>

    <a
        href="{{ route('admin.pendaftaran.create') }}"
        class="btn btn-primary"
    >
        <i class="bi bi-plus-lg me-1"></i>
        Tambah Pendaftar
    </a>

</div>

@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show">

        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

@endif

<div class="card border-0 shadow-sm mb-4">

    <div class="card-body">

        <form
            method="GET"
            action="{{ route('admin.pendaftaran.index') }}"
        >

            <div class="row g-3">

                <div class="col-md-7">

                    <label class="form-label">
                        Pencarian
                    </label>

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        value="{{ request('search') }}"
                        placeholder="Nama, NIM, email, atau nomor HP..."
                    >

                </div>

                <div class="col-md-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select"
                    >

                        <option value="">
                            Semua Status
                        </option>

                        <option
                            value="Menunggu"
                            {{ request('status') == 'Menunggu' ? 'selected' : '' }}
                        >
                            Menunggu
                        </option>

                        <option
                            value="Diterima"
                            {{ request('status') == 'Diterima' ? 'selected' : '' }}
                        >
                            Diterima
                        </option>

                        <option
                            value="Ditolak"
                            {{ request('status') == 'Ditolak' ? 'selected' : '' }}
                        >
                            Ditolak
                        </option>

                    </select>

                </div>

                <div class="col-md-2 d-flex align-items-end">

                    <button class="btn btn-dark w-100">

                        <i class="bi bi-search me-1"></i>
                        Cari

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th class="px-3">
                            #
                        </th>

                        <th>
                            Nama
                        </th>

                        <th>
                            NIM
                        </th>

                        <th>
                            Kontak
                        </th>

                        <th>
                            Angkatan
                        </th>

                        <th>
                            Status
                        </th>

                        <th class="text-end px-3">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($pendaftaran as $item)

                        <tr>

                            <td class="px-3">
                                {{ $pendaftaran->firstItem() + $loop->index }}
                            </td>

                            <td>

                                <div class="fw-semibold">
                                    {{ $item->nama_lengkap }}
                                </div>

                                <small class="text-muted">
                                    {{ $item->email }}
                                </small>

                            </td>

                            <td>
                                {{ $item->nim }}
                            </td>

                            <td>
                                {{ $item->no_hp }}
                            </td>

                            <td>
                                {{ $item->angkatan }}
                            </td>

                            <td>

                                @if($item->status === 'Menunggu')

                                    <span class="badge bg-warning text-dark">
                                        <i class="bi bi-clock me-1"></i>
                                        Menunggu
                                    </span>

                                @elseif($item->status === 'Diterima')

                                    <span class="badge bg-success">
                                        <i class="bi bi-check-circle me-1"></i>
                                        Diterima
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        <i class="bi bi-x-circle me-1"></i>
                                        Ditolak
                                    </span>

                                @endif

                            </td>

                            <td class="text-end px-3">

                                <div class="d-flex justify-content-end gap-1">

                                    <a
                                        href="{{ route('admin.pendaftaran.show', $item->id) }}"
                                        class="btn btn-sm btn-outline-primary"
                                        title="Detail"
                                    >
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    @if($item->status === 'Menunggu')

                                        <form
                                            action="{{ route('admin.pendaftaran.terima', $item->id) }}"
                                            method="POST"
                                        >
                                            @csrf

                                            <button
                                                class="btn btn-sm btn-outline-success"
                                                title="Terima"
                                                onclick="return confirm('Terima pendaftar ini?')"
                                            >
                                                <i class="bi bi-check-lg"></i>
                                            </button>

                                        </form>

                                        <form
                                            action="{{ route('admin.pendaftaran.tolak', $item->id) }}"
                                            method="POST"
                                        >
                                            @csrf

                                            <button
                                                class="btn btn-sm btn-outline-danger"
                                                title="Tolak"
                                                onclick="return confirm('Tolak pendaftar ini?')"
                                            >
                                                <i class="bi bi-x-lg"></i>
                                            </button>

                                        </form>

                                    @endif

                                    <a
                                        href="{{ route('admin.pendaftaran.edit', $item->id) }}"
                                        class="btn btn-sm btn-outline-warning"
                                        title="Edit"
                                    >
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form
                                        action="{{ route('admin.pendaftaran.destroy', $item->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus pendaftar ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="btn btn-sm btn-outline-danger"
                                            title="Hapus"
                                        >
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="text-center py-5"
                            >

                                <i class="bi bi-person-x fs-1 text-muted"></i>

                                <h5 class="mt-3">
                                    Belum ada pendaftar
                                </h5>

                                <p class="text-muted mb-0">
                                    Data pendaftaran anggota akan muncul di sini.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@if($pendaftaran->hasPages())

    <div class="mt-4">
        {{ $pendaftaran->links() }}
    </div>

@endif

@endsection