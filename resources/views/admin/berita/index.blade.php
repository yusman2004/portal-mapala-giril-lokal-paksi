@extends('layouts.admin')

@section('title', 'Berita')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-newspaper me-2"></i>
                Berita MAPALA
            </h3>

            <p class="text-muted mb-0">
                Kelola berita dan informasi MAPALA Giril Lokal Paksi.
            </p>
        </div>

        <a href="{{ route('admin.berita.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle me-1"></i>
            Tambah Berita

        </a>

    </div>


    {{-- SUCCESS --}}
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


    {{-- ERROR --}}
    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show">

            <i class="bi bi-exclamation-circle me-2"></i>
            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- SEARCH --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <form method="GET"
                  action="{{ route('admin.berita.index') }}">

                <div class="row g-3">

                    <div class="col-md-10">

                        <label class="form-label fw-semibold">
                            Cari Berita
                        </label>

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            value="{{ request('search') }}"
                            placeholder="Cari judul berita..."
                        >

                    </div>

                    <div class="col-md-2 d-flex align-items-end">

                        <button type="submit"
                                class="btn btn-dark w-100">

                            <i class="bi bi-search me-1"></i>
                            Cari

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- TABLE --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th width="60">
                                No
                            </th>

                            <th width="100">
                                Gambar
                            </th>

                            <th>
                                Judul Berita
                            </th>

                            <th>
                                Kategori
                            </th>

                            <th>
                                Penulis
                            </th>

                            <th>
                                Tanggal
                            </th>

                            <th width="180">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                    @forelse($berita as $item)

                        <tr>

                            {{-- NO --}}
                            <td>
                                {{ $berita->firstItem() + $loop->index }}
                            </td>


                            {{-- GAMBAR --}}
                            <td>

                                @if($item->gambar)

                                    <img
                                        src="{{ asset('storage/' . $item->gambar) }}"
                                        alt="{{ $item->judul }}"
                                        class="rounded"
                                        style="
                                            width:75px;
                                            height:55px;
                                            object-fit:cover;
                                        "
                                    >

                                @else

                                    <div
                                        class="bg-light rounded d-flex align-items-center justify-content-center"
                                        style="
                                            width:75px;
                                            height:55px;
                                        "
                                    >

                                        <i class="bi bi-image text-muted"></i>

                                    </div>

                                @endif

                            </td>


                            {{-- JUDUL --}}
                            <td>

                                <div class="fw-bold">
                                    {{ $item->judul }}
                                </div>

                                @if(isset($item->slug))

                                    <small class="text-muted">
                                        {{ $item->slug }}
                                    </small>

                                @endif

                            </td>


                            {{-- KATEGORI --}}
                            <td>

                                @if($item->kategori)

                                    <span class="badge bg-primary">
                                        {{ $item->kategori->nama_kategori }}
                                    </span>

                                @elseif(isset($item->kategoriBerita))

                                    <span class="badge bg-primary">
                                        {{ $item->kategoriBerita->nama_kategori }}
                                    </span>

                                @else

                                    <span class="text-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- PENULIS --}}
                            <td>

                                @if(isset($item->user))

                                    {{ $item->user->name }}

                                @elseif(isset($item->penulis))

                                    {{ $item->penulis }}

                                @else

                                    <span class="text-muted">
                                        Admin
                                    </span>

                                @endif

                            </td>


                            {{-- TANGGAL --}}
                            <td>

                                @if($item->created_at)

                                    {{ $item->created_at->format('d/m/Y') }}

                                @else

                                    -

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td>

                                {{-- DETAIL --}}
                                <a
                                    href="{{ route('admin.berita.show', ['berita' => $item->id]) }}"
                                    class="btn btn-sm btn-outline-primary"
                                    title="Lihat"
                                >

                                    <i class="bi bi-eye"></i>

                                </a>


                                {{-- EDIT --}}
                                <a
                                    href="{{ route('admin.berita.edit', ['berita' => $item->id]) }}"
                                    class="btn btn-sm btn-outline-warning"
                                    title="Edit"
                                >

                                    <i class="bi bi-pencil"></i>

                                </a>


                                {{-- HAPUS --}}
                                <form
                                    action="{{ route('admin.berita.destroy', ['berita' => $item->id]) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus berita ini?')"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        title="Hapus"
                                    >

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7"
                                class="text-center py-5">

                                <i class="bi bi-newspaper fs-1 text-muted"></i>

                                <h5 class="mt-3">
                                    Belum ada berita
                                </h5>

                                <p class="text-muted">
                                    Silakan tambahkan berita baru.
                                </p>

                                <a
                                    href="{{ route('admin.berita.create') }}"
                                    class="btn btn-primary"
                                >

                                    <i class="bi bi-plus-circle me-1"></i>
                                    Tambah Berita

                                </a>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>


            {{-- PAGINATION --}}
            @if($berita->hasPages())

                <div class="mt-4">

                    {{ $berita->links() }}

                </div>

            @endif

        </div>

    </div>

</div>

@endsection