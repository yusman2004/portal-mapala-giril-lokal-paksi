@extends('layouts.public')

@section('title', 'Kontak - MAPALA Giril Lokal Paksi')

@section('content')

<!-- HERO -->
<section class="page-hero">
    <div class="container">
        <span>KONTAK</span>

        <h1>Hubungi Kami</h1>

        <p>
            Jangan ragu untuk menghubungi
            MAPALA Giril Lokal Paksi.
        </p>
    </div>
</section>


<!-- CONTACT -->
<section class="py-5">

    <div class="container">

        {{-- SUCCESS --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4">
                <i class="bi bi-check-circle-fill me-2"></i>

                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>
            </div>
        @endif


        {{-- ERROR --}}
        @if($errors->any())
            <div class="alert alert-danger shadow-sm mb-4">

                <strong>
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Periksa kembali data yang diisi.
                </strong>

                <ul class="mb-0 mt-2">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>
        @endif


        <div class="row g-5">

            <!-- INFORMASI -->
            <div class="col-lg-5">

                <span class="section-label">
                    INFORMASI
                </span>

                <h2 class="fw-bold mb-4">
                    Mari Terhubung
                </h2>

                <p class="text-secondary lh-lg">

                    Untuk informasi mengenai kegiatan,
                    pendaftaran anggota, kerja sama,
                    atau pertanyaan lainnya, silakan
                    menghubungi kami melalui kontak yang tersedia.

                </p>


                <!-- ALAMAT -->
                <div class="contact-item">

                    <div class="contact-icon">

                        <i class="bi bi-geo-alt-fill"></i>

                    </div>

                    <div>

                        <strong>Alamat</strong>

                        <p>
                            Sekretariat MAPALA Giril Lokal Paksi
                        </p>

                    </div>

                </div>


                <!-- EMAIL -->
                <div class="contact-item">

                    <div class="contact-icon">

                        <i class="bi bi-envelope-fill"></i>

                    </div>

                    <div>

                        <strong>Email</strong>

                        <p>
                            info@girillokalpaksi.test
                        </p>

                    </div>

                </div>


                <!-- INSTAGRAM -->
                <div class="contact-item">

                    <div class="contact-icon">

                        <i class="bi bi-instagram"></i>

                    </div>

                    <div>

                        <strong>Instagram</strong>

                        <p>
                            @girilokalpaksi
                        </p>

                    </div>

                </div>


                <!-- PENDAFTARAN -->
                <div class="join-card mt-4">

                    <div class="join-icon">

                        <i class="bi bi-people-fill"></i>

                    </div>

                    <div>

                        <h5>
                            Ingin bergabung?
                        </h5>

                        <p>
                            Jadilah bagian dari perjalanan
                            MAPALA Giril Lokal Paksi.
                        </p>

                        <a href="{{ route('pendaftaran.create') }}"
                           class="btn btn-success">

                            <i class="bi bi-person-plus me-1"></i>

                            Daftar Menjadi Anggota

                        </a>

                    </div>

                </div>

            </div>


            <!-- FORM PESAN -->
            <div class="col-lg-7">

                <div class="contact-form-box">

                    <div class="mb-4">

                        <span class="section-label">
                            PESAN
                        </span>

                        <h2 class="fw-bold mt-1">
                            Kirim Pesan
                        </h2>

                        <p class="text-secondary mb-0">
                            Silakan isi formulir berikut untuk
                            menghubungi kami.
                        </p>

                    </div>


                    <form action="{{ route('public.kontak.store') }}"
                          method="POST">

                        @csrf


                        <!-- NAMA + EMAIL -->
                        <div class="row g-3">

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">

                                    Nama Lengkap

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-person"></i>
                                    </span>

                                    <input type="text"
                                           name="nama"
                                           class="form-control @error('nama') is-invalid @enderror"
                                           value="{{ old('nama') }}"
                                           placeholder="Nama lengkap"
                                           required>

                                </div>

                                @error('nama')

                                    <div class="text-danger small mt-1">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">

                                    Email

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-envelope"></i>
                                    </span>

                                    <input type="email"
                                           name="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}"
                                           placeholder="nama@email.com"
                                           required>

                                </div>

                                @error('email')

                                    <div class="text-danger small mt-1">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>

                        </div>


                        <!-- TELEPON -->
                        <div class="mt-3">

                            <label class="form-label fw-semibold">

                                Nomor Telepon

                                <span class="text-muted small">
                                    (opsional)
                                </span>

                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-telephone"></i>
                                </span>

                                <input type="text"
                                       name="telepon"
                                       class="form-control @error('telepon') is-invalid @enderror"
                                       value="{{ old('telepon') }}"
                                       placeholder="08xxxxxxxxxx">

                            </div>

                            @error('telepon')

                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <!-- SUBJEK -->
                        <div class="mt-3">

                            <label class="form-label fw-semibold">

                                Subjek

                                <span class="text-danger">
                                    *
                                </span>

                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-chat-left-text"></i>
                                </span>

                                <input type="text"
                                       name="subjek"
                                       class="form-control @error('subjek') is-invalid @enderror"
                                       value="{{ old('subjek') }}"
                                       placeholder="Contoh: Informasi kegiatan"
                                       required>

                            </div>

                            @error('subjek')

                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <!-- PESAN -->
                        <div class="mt-3">

                            <label class="form-label fw-semibold">

                                Pesan

                                <span class="text-danger">
                                    *
                                </span>

                            </label>

                            <textarea name="pesan"
                                      rows="6"
                                      class="form-control @error('pesan') is-invalid @enderror"
                                      placeholder="Tulis pesan kamu di sini..."
                                      required>{{ old('pesan') }}</textarea>

                            @error('pesan')

                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <!-- BUTTON -->
                        <div class="mt-4">

                            <button type="submit"
                                    class="btn btn-success btn-lg px-4">

                                <i class="bi bi-send-fill me-2"></i>

                                Kirim Pesan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>


@push('styles')

<style>

/* SECTION LABEL */

.section-label {

    color: #166534;

    font-size: .8rem;

    font-weight: 800;

    letter-spacing: 2px;

}


/* CONTACT ITEM */

.contact-item {

    display: flex;

    gap: 15px;

    margin-top: 25px;

}


.contact-icon {

    width: 48px;

    height: 48px;

    min-width: 48px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 13px;

    background: #dcfce7;

    color: #166534;

    font-size: 1.1rem;

}


.contact-item strong {

    font-weight: 800;

}


.contact-item p {

    color: #6b7280;

    margin: 4px 0 0;

    line-height: 1.6;

}


/* JOIN CARD */

.join-card {

    display: flex;

    gap: 15px;

    padding: 20px;

    border-radius: 18px;

    background: #f0fdf4;

    border: 1px solid #dcfce7;

}


.join-icon {

    width: 45px;

    height: 45px;

    min-width: 45px;

    border-radius: 12px;

    background: #166534;

    color: white;

    display: flex;

    align-items: center;

    justify-content: center;

}


.join-card h5 {

    font-weight: 800;

    margin-bottom: 5px;

}


.join-card p {

    color: #6b7280;

    margin-bottom: 12px;

}


/* FORM BOX */

.contact-form-box {

    background: white;

    border-radius: 24px;

    padding: 35px;

    border: 1px solid #e5e7eb;

    box-shadow: 0 10px 35px rgba(0,0,0,.06);

}


/* INPUT */

.contact-form-box .form-control {

    min-height: 48px;

    border-color: #d1d5db;

}


.contact-form-box textarea.form-control {

    min-height: 150px;

}


.contact-form-box .form-control:focus {

    border-color: #166534;

    box-shadow: 0 0 0 .2rem rgba(22,101,52,.1);

}


.contact-form-box .input-group-text {

    background: #f9fafb;

    border-color: #d1d5db;

    color: #166534;

}


/* BUTTON */

.contact-form-box .btn-success {

    background: #166534;

    border-color: #166534;

    font-weight: 700;

    border-radius: 12px;

}


.contact-form-box .btn-success:hover {

    background: #14532d;

    border-color: #14532d;

}


/* MOBILE */

@media (max-width: 767px) {

    .contact-form-box {

        padding: 25px 20px;

        border-radius: 18px;

    }

    .join-card {

        flex-direction: column;

    }

}

</style>

@endpush

@endsection