@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold">
                Detail Kegiatan
            </h3>

            <p class="text-muted mb-0">
                Informasi lengkap kegiatan MAPALA.
            </p>

        </div>


        <div>

            <a href="{{ route('admin.kegiatan.edit', $kegiatan) }}"
               class="btn btn-warning">

                <i class="bi bi-pencil"></i>

                Edit

            </a>


            <a href="{{ route('admin.kegiatan.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>


    <div class="card border-0 shadow-sm">

        <div class="card-body">


            @if($kegiatan->gambar)

                <img src="{{ asset('storage/' . $kegiatan->gambar) }}"
                     class="img-fluid rounded mb-4"
                     style="width:100%;max-height:420px;object-fit:cover">

            @endif


            <h2 class="fw-bold">

                {{ $kegiatan->nama_kegiatan }}

            </h2>


            <div class="mb-3">

                @if($kegiatan->status === 'Akan Datang')

                    <span class="badge bg-primary">
                        Akan Datang
                    </span>

                @elseif($kegiatan->status === 'Berlangsung')

                    <span class="badge bg-warning text-dark">
                        Berlangsung
                    </span>

                @else

                    <span class="badge bg-success">
                        Selesai
                    </span>

                @endif

            </div>


            <div class="row mb-4">

                <div class="col-md-6">

                    <div class="p-3 bg-light rounded">

                        <i class="bi bi-calendar-event text-primary"></i>

                        <strong>
                            Tanggal
                        </strong>

                        <br>

                        {{ $kegiatan->tanggal->format('d F Y') }}

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="p-3 bg-light rounded">

                        <i class="bi bi-geo-alt text-danger"></i>

                        <strong>
                            Lokasi
                        </strong>

                        <br>

                        {{ $kegiatan->lokasi }}

                    </div>

                </div>

            </div>


            <hr>


            <h5 class="fw-bold">
                Deskripsi Kegiatan
            </h5>


            <div class="mt-3"
                 style="line-height:1.8">

                {!! nl2br(e($kegiatan->deskripsi)) !!}

            </div>


        </div>

    </div>

</div>

@endsection