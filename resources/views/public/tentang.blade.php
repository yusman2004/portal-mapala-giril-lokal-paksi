@extends('layouts.public')

@section('title', 'Tentang Kami - MAPALA Giril Lokal Paksi')

@section('content')

<section class="page-hero">
    <div class="container">
        <span>TENTANG KAMI</span>
        <h1>Giril Lokal Paksi</h1>
        <p>
            Mengenal lebih dekat keluarga besar
            MAPALA Giril Lokal Paksi.
        </p>
    </div>
</section>

<section class="py-5">
    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <span class="section-label">
                    SIAPA KAMI?
                </span>

                <h2 class="display-5 fw-bold mb-4">
                    Tumbuh bersama alam,
                    bergerak bersama.
                </h2>

                <p class="text-secondary lh-lg">
                    MAPALA Giril Lokal Paksi merupakan organisasi
                    mahasiswa yang menjadi wadah bagi mahasiswa
                    untuk mengembangkan kemampuan, pengalaman,
                    dan kepedulian melalui kegiatan alam bebas.
                </p>

                <p class="text-secondary lh-lg">
                    Kami percaya bahwa perjalanan di alam bukan
                    hanya tentang mencapai puncak, tetapi juga
                    tentang belajar bertanggung jawab, bekerja
                    sama, menghargai sesama, dan menjaga lingkungan.
                </p>

            </div>

            <div class="col-lg-6">

                <div class="about-feature-box">

                    <i class="bi bi-compass-fill"></i>

                    <h3>
                        Semangat Petualangan
                    </h3>

                    <p>
                        Menumbuhkan keberanian untuk mencoba,
                        belajar dan menghadapi tantangan.
                    </p>

                </div>

                <div class="about-feature-box">

                    <i class="bi bi-tree-fill"></i>

                    <h3>
                        Peduli Lingkungan
                    </h3>

                    <p>
                        Menjadikan alam sebagai ruang belajar
                        sekaligus tanggung jawab bersama.
                    </p>

                </div>

                <div class="about-feature-box">

                    <i class="bi bi-people-fill"></i>

                    <h3>
                        Persaudaraan
                    </h3>

                    <p>
                        Membangun hubungan yang kuat melalui
                        kebersamaan dan pengalaman.
                    </p>

                </div>

            </div>

        </div>

    </div>
</section>

<section class="py-5 bg-light">

    <div class="container text-center">

        <span class="section-label">
            NILAI KAMI
        </span>

        <h2 class="fw-bold mb-5">
            Apa yang Kami Bangun
        </h2>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="value-card">
                    <i class="bi bi-shield-check"></i>
                    <h4>Disiplin</h4>
                    <p>
                        Membentuk pribadi yang bertanggung jawab
                        dalam setiap kegiatan.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="value-card">
                    <i class="bi bi-people"></i>
                    <h4>Solidaritas</h4>
                    <p>
                        Saling membantu dan menjaga satu sama lain
                        dalam setiap perjalanan.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="value-card">
                    <i class="bi bi-globe-asia-australia"></i>
                    <h4>Konservasi</h4>
                    <p>
                        Menjaga dan melestarikan lingkungan
                        untuk generasi berikutnya.
                    </p>
                </div>
            </div>

        </div>

    </div>

</section>

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-label">
                ORGANISASI
            </span>

            <h2 class="fw-bold">
                Pengurus MAPALA
            </h2>

        </div>

        <div class="row g-4 justify-content-center">

            @foreach($pengurus as $item)

                <div class="col-6 col-md-4 col-lg-2">

                    <div class="pengurus-card">

                        @if($item->foto)

                            <img
                                src="{{ asset('storage/' . $item->foto) }}"
                                alt="{{ $item->nama }}"
                            >

                        @else

                            <div class="pengurus-placeholder">
                                <i class="bi bi-person"></i>
                            </div>

                        @endif

                        <h5>
                            {{ $item->nama }}
                        </h5>

                        <p>
                            {{ $item->jabatan }}
                        </p>

                        <small>
                            {{ $item->periode }}
                        </small>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

@push('styles')
<style>

.page-hero {
    padding: 100px 0;
    background:
        linear-gradient(
            rgba(5, 35, 20, .88),
            rgba(5, 35, 20, .88)
        ),
        url('https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&w=1800&q=85')
        center/cover;
    color: white;
}

.page-hero span {
    color: #86efac;
    font-size: .8rem;
    font-weight: 800;
    letter-spacing: 2px;
}

.page-hero h1 {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 800;
    margin: 12px 0;
}

.page-hero p {
    color: rgba(255,255,255,.75);
    font-size: 1.1rem;
}

.section-label {
    color: #166534;
    font-size: .8rem;
    font-weight: 800;
    letter-spacing: 2px;
}

.about-feature-box {
    padding: 25px;
    margin-bottom: 15px;
    border-radius: 18px;
    background: #f7faf7;
}

.about-feature-box i {
    color: #166534;
    font-size: 2rem;
}

.about-feature-box h3 {
    font-size: 1.2rem;
    font-weight: 800;
    margin-top: 10px;
}

.about-feature-box p {
    color: #6b7280;
    margin: 0;
}

.value-card {
    background: white;
    border-radius: 20px;
    padding: 35px 25px;
    height: 100%;
    box-shadow: 0 10px 35px rgba(0,0,0,.06);
}

.value-card i {
    font-size: 2.5rem;
    color: #166534;
}

.value-card h4 {
    font-weight: 800;
    margin-top: 15px;
}

.value-card p {
    color: #6b7280;
}

.pengurus-card {
    text-align: center;
}

.pengurus-card img,
.pengurus-placeholder {
    width: 130px;
    height: 130px;
    border-radius: 50%;
    object-fit: cover;
    margin: auto auto 15px;
    border: 5px solid #e6f4e9;
}

.pengurus-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #e6f4e9;
    color: #166534;
    font-size: 2.5rem;
}

.pengurus-card h5 {
    font-size: 1rem;
    font-weight: 800;
    margin-bottom: 4px;
}

.pengurus-card p {
    color: #166534;
    font-size: .8rem;
    font-weight: 700;
    margin-bottom: 2px;
}

.pengurus-card small {
    color: #9ca3af;
}

</style>
@endpush

@endsection