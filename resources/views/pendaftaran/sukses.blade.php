@extends('layouts.public')

@section('title', 'Pendaftaran Berhasil | MAPALA Giril Lokal Paksi')

@section('content')

<section class="hero-page">

    <div class="container">

        <div class="row justify-content-center text-center">

            <div class="col-lg-8">

                <div
                    class="bg-white text-success rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4"
                    style="
                        width:100px;
                        height:100px;
                        font-size:45px;
                    "
                >
                    <i class="bi bi-check-lg"></i>
                </div>

                <h1 class="display-5 fw-bold">
                    Pendaftaran Berhasil!
                </h1>

                <p class="lead mb-4">
                    Terima kasih telah mendaftar sebagai
                    calon anggota MAPALA Giril Lokal Paksi.
                </p>

                <div class="d-flex justify-content-center gap-2 flex-wrap">

                    <a
                        href="{{ url('/') }}"
                        class="btn btn-light btn-lg px-4"
                    >
                        <i class="bi bi-house me-2"></i>
                        Kembali ke Beranda
                    </a>

                    <a
                        href="{{ route('pendaftaran.create') }}"
                        class="btn btn-outline-light btn-lg px-4"
                    >
                        Daftar Lagi
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card border-0 shadow-sm">

                    <div class="card-body p-4 text-center">

                        <i class="bi bi-hourglass-split text-success fs-1"></i>

                        <h4 class="fw-bold mt-3">
                            Menunggu Verifikasi
                        </h4>

                        <p class="text-muted mb-0">
                            Data Anda sudah tersimpan.
                            Pengurus akan melakukan proses
                            verifikasi terhadap pendaftaran Anda.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection