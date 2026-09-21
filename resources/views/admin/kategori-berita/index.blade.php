@extends('layouts.admin')

@section('title', 'Kategori Berita')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-tags me-2"></i>
                Kategori Berita
            </h3>

            <p class="text-muted mb-0">
                Kelola kategori berita MAPALA Giril Lokal Paksi.
            </p>
        </div>

        <a href="{{ route('admin.kategori-berita.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle me-1"></i>
            Tambah Kategori

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


    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th width="70">
                                No
                            </th>

                            <th>
                                Nama Kategori
                            </th>

                            <th>
                                Deskripsi
                            </th>

                            <th width="150">
                                Jumlah Berita
                            </th>

                            <th width="200">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                    @forelse($kategori as $item)

                        <tr>

                            {{-- NO --}}
                            <td>
                                {{ $kategori->firstItem() + $loop->index }}
                            </td>


                            {{-- NAMA --}}
                            <td>

                                <strong>
                                    {{ $item->nama_kategori }}
                                </strong>

                            </td>


                            {{-- DESKRIPSI --}}
                            <td>

                                @if($item->deskripsi)

                                    {{ $item->deskripsi }}

                                @else

                                    <span class="text-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- JUMLAH BERITA --}}
                            <td>

                                <span class="badge bg-primary">

                                    {{ $item->berita_count ?? 0 }}
                                    berita

                                </span>

                            </td>


                            {{-- AKSI --}}
                            <td>

                                {{-- EDIT --}}
                                <a
                                    href="{{ route('admin.kategori-berita.edit', ['kategori_berita' => $item->id]) }}"
                                    class="btn btn-sm btn-warning"
                                    title="Edit Kategori"
                                >

                                    <i class="bi bi-pencil"></i>
                                    Edit

                                </a>


                                {{-- HAPUS --}}
                                <form
                                    action="{{ route('admin.kategori-berita.destroy', ['kategori_berita' => $item->id]) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus kategori ini?')"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                        title="Hapus Kategori"
                                    >

                                        <i class="bi bi-trash"></i>
                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5"
                                class="text-center py-5">

                                <i class="bi bi-tags fs-1 text-muted"></i>

                                <h5 class="mt-3">
                                    Belum ada kategori
                                </h5>

                                <p class="text-muted mb-3">
                                    Silakan tambahkan kategori berita terlebih dahulu.
                                </p>

                                <a
                                    href="{{ route('admin.kategori-berita.create') }}"
                                    class="btn btn-primary"
                                >

                                    <i class="bi bi-plus-circle me-1"></i>
                                    Tambah Kategori

                                </a>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>


            {{-- PAGINATION --}}
            @if($kategori->hasPages())

                <div class="mt-4">

                    {{ $kategori->links() }}

                </div>

            @endif

        </div>

    </div>

</div>

@endsection