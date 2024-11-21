@extends('layouts.app-guru')

@section('content')
<div class="content-wrapper">
    <div class="container py-4">
        <!-- Back button dan nama siswa -->
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('guru.e-rapor.siswa') }}" class="text-decoration-none text-dark">
                <div class="d-flex align-items-center">
                    <i class="bi bi-arrow-left-circle-fill fs-4 me-2"></i>
                    <h4 class="mb-0">Marvin McKinney / Rapor Triwulan</h4>
                </div>
            </a>
        </div>

        <!-- Card Rapor -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <!-- Informasi Siswa -->
                <div class="mb-4">
                    <p class="mb-1"><strong>Nama:</strong> Marvin McKinney</p>
                    <p class="mb-1"><strong>Kelas:</strong> A</p>
                    <p class="mb-1"><strong>NIS:</strong> 2201169</p>
                </div>

                <!-- Capaian Belajar -->
                <div>
                    <p class="mb-2"><strong>Capaian Belajar:</strong></p>
                    <p class="text-justify">
                        Selama periode ini, menunjukkan perkembangan yang sangat baik di berbagai
                        aspek. Pada aspek kognitif, Dita sudah mampu mengenali huruf-huruf awal
                        abjad dan dapat menghitung hingga angka 20 dengan lancar. Ia juga dapat
                        mengelompokkan objek berdasarkan warna dan bentuk secara tepat. Pada
                        aspek motorik, Dita semakin terampil dalam berlari, melompat, dan bermain
                        lompat tali.
                    </p>
                </div>
            </div>
        </div>

        <!-- Tombol Buat PDF -->
        <div class="d-flex justify-content-end">
            <button class="btn btn-dark px-4">
                BUAT PDF
            </button>
        </div>
    </div>
</div>

<style>
    /* Aplikasikan Poppins ke semua elemen */
    * {
        font-family: 'Poppins', sans-serif;
    }

    /* Styling untuk teks */
    h4 {
        font-weight: 600;
    }

    p {
        font-weight: 400;
    }

    strong {
        font-weight: 500;
    }

    /* Styling untuk tombol */
    .btn {
        font-weight: 500;
    }

    /* Update style untuk content wrapper */
    .content-wrapper {
        transition: margin-left 0.3s ease-in-out;
        margin-left: 0;
        padding-left: 15px;
        padding-right: 15px;
    }

    /* Saat sidebar terbuka */
    body.sidebar-open .content-wrapper {
        margin-left: 330px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .content-wrapper {
            padding-left: 10px;
            padding-right: 10px;
        }

        body.sidebar-open .content-wrapper {
            margin-left: 0;
        }
    }

    /* Tambahkan ini untuk transisi yang seamless */
    .offcanvas {
        transition: transform 0.3s ease-in-out;
    }
</style>
@endsection
