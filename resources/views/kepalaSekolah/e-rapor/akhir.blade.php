@extends('layouts.app-kepsek')

@section('content')
<div class="content-wrapper">
    <div class="container py-4">
        <!-- Back button dan nama siswa -->
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('kepsek.e-rapor') }}" class="text-decoration-none text-dark">
                <div class="d-flex align-items-center">
                    <i class="bi bi-arrow-left-circle-fill fs-2 me-4"></i>
                    <h4 class="mb-0 fs-3">{{ $siswa->name }} / Rapor Akhir</h4>
                </div>
            </a>
        </div>

        <!-- Card Rapor -->
        <div class="row g-4">
            <!-- Data Siswa Card -->
            <div class="col-md-3">
                <div class="card shadow-sm" style="height: auto; border-radius: 10px;">
                    <div class="card-body text-center" style="padding: 30px 5px;">
                        <!-- Foto Siswa -->
                        <img src="{{ $siswa->photo ? asset($siswa->photo) : asset('images/foto-siswa.jpg') }}" alt="Foto Siswa"
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
                <div class="card shadow-sm mb-4" style="border-radius: 10px;">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Nilai Agama dan Budi Pekerti</h5>
                        <div>
                            <p class="mb-2"><strong>Capaian Belajar:</strong></p>
                            <p class="text-justify">
                                {{ $rapor->nilai_agama_budi_pekerti ?? 'Data capaian belajar tidak tersedia.' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card Jati Diri -->
                <div class="card shadow-sm mb-4" style="border-radius: 10px;">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Jati Diri</h5>
                        <div>
                            <p class="mb-2"><strong>Capaian Belajar:</strong></p>
                            <p class="text-justify">
                                {{ $rapor->nilai_jati_diri ?? 'Data capaian belajar tidak tersedia.' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card Dasar-dasar Literasi dan STEAM -->
                <div class="card shadow-sm mb-4" style="border-radius: 10px;">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Dasar-dasar Literasi dan STEAM</h5>
                        <div>
                            <p class="mb-2"><strong>Capaian Belajar:</strong></p>
                            <p class="text-justify">
                                {{ $rapor->nilai_literasi_steam ?? 'Data capaian belajar tidak tersedia.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Buat PDF -->
        <div class="d-flex justify-content-end">
            <a href="{{ route('generate.pdf', $siswa->nis) }}" class="btn btn-danger px-4">
                <img src="{{ asset('images/pdf-icon.png') }}" alt="PDF Icon" style="width: 20px; height: 20px; object-fit: cover;" class="me-2">
                BUAT PDF
            </a>
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
