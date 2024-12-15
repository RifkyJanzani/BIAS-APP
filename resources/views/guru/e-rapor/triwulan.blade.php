@extends('layouts.app-guru')

@section('content')
<div class="content-wrapper">
    <div class="container py-4">
        <!-- Back button dan nama siswa -->
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('guru.e-rapor.siswa', $siswa->nis) }}" class="text-decoration-none text-dark">
                <div class="d-flex align-items-center">
                    <i class="bi bi-arrow-left-circle-fill fs-2 me-2"></i>
                    <h4 class="mb-0 fs-3">{{ $siswa->name }} / Rapor Triwulan</h4>
                </div>
            </a>
        </div>

        <!-- Card Rapor -->
        <div class="row g-4">
            <!-- Data Siswa Card -->
            <div class="col-md-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <!-- Foto Siswa -->
                        <img src="{{ asset('path/to/photo.jpg') }}" alt="Foto Siswa"
                             class="rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;">

                        <!-- Data Siswa tanpa label -->
                        <h5 class="mb-1">{{ $siswa->name }}</h5>
                        <p class="mb-1 text-secondary">Kelas {{ $siswa->kelas }}</p>
                        <p class="mb-0 text-secondary">{{ $siswa->nis }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <!-- Card Nilai Agama dan Budi Pekerti -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Nilai Agama dan Budi Pekerti</h5>
                        <div>
                            <p class="mb-2"><strong>Capaian Belajar:</strong></p>
                            <p class="text-justify">
                                Ananda menunjukkan perkembangan yang baik dalam memahami nilai-nilai agama
                                dan budi pekerti. Mampu menerapkan sikap hormat, sopan santun, dan
                                menunjukkan perilaku yang sesuai dengan ajaran agama dalam kehidupan sehari-hari.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card Jati Diri -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Jati Diri</h5>
                        <div>
                            <p class="mb-2"><strong>Capaian Belajar:</strong></p>
                            <p class="text-justify">
                                Ananda menunjukkan perkembangan yang baik dalam pembentukan jati diri.
                                Mampu mengekspresikan diri dengan percaya diri, menunjukkan kemandirian,
                                dan memiliki kesadaran akan identitas dirinya sebagai individu yang unik.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card Dasar-dasar Literasi dan STEAM -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Dasar-dasar Literasi dan STEAM</h5>
                        <div>
                            <p class="mb-2"><strong>Capaian Belajar:</strong></p>
                            <p class="text-justify">
                                Ananda menunjukkan perkembangan yang baik dalam pemahaman dasar literasi
                                dan STEAM. Mampu mengenal huruf, angka, dan konsep dasar sains. Menunjukkan
                                ketertarikan dalam eksplorasi dan eksperimen sederhana.
                            </p>
                        </div>
                    </div>
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
        /* transition: margin-left 0.3s ease-in-out; */
        margin-left: 0;
        padding-left: 15px;
        padding-right: 15px;
    }

    /* Saat sidebar terbuka */
    body.sidebar-open .content-wrapper {
        /* margin-left: 330px; */
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
