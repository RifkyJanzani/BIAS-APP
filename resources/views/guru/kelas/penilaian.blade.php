@extends('layouts.app-guru')

@section('content')
<div class="content-wrapper">
    <div class="container py-4">
        <!-- Back button dan nama siswa -->
        <div class="d-flex align-items-center mb-4">
            <a href="javascript:void(0);" onclick="window.history.back()" class="text-decoration-none text-dark">
                <div class="d-flex align-items-center">
                    <i class="bi bi-arrow-left-circle-fill fs-4 me-2"></i>
                    <h4 class="mb-0">Marvin McKinney / Bulan {{ ucfirst($bulan) }}, Pekan ke {{ $pekan }}</h4>
                </div>
            </a>
        </div>

       <!-- Card pilihan rapor -->
       <div class="card shadow-sm">
        <div class="p-3 border rounded shadow-sm">
            <p class="text-secondary mb-4">Silakan mengisi kriteria penilaian di bawah ini.</p>
            <!-- Kriteria Penilaian -->
            <div class="m-3 p-3 border rounded shadow-sm">
                <label for="motorik" class="form-label">Bagaimana perkembangan motorik anak?</label>
                <div id="motorik" class="d-flex flex-wrap flex-column flex-sm-row justify-content-sm-around justify-content-start gap-sm-0 gap-2">
                    <div class="form-check">
                        <input class="form-check-input" style="cursor: pointer" type="radio" name="motorik" id="belumMuncul" value="belumMuncul">
                        <label class="form-check-label" for="belumMuncul">
                            Belum Muncul
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" style="cursor: pointer" type="radio" name="motorik" id="muncul" value="muncul">
                        <label class="form-check-label" for="muncul">
                            Muncul
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" style="cursor: pointer" type="radio" name="motorik" id="baik" value="baik">
                        <label class="form-check-label" for="baik">
                            Baik
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" style="cursor: pointer" type="radio" name="motorik" id="sangatBaik" value="sangatBaik">
                        <label class="form-check-label" for="sangatBaik">
                            Sangat Baik
                        </label>
                    </div>
                </div>
            </div>
            <div class="m-3 p-3 border rounded shadow-sm">
                <label for="fotoKegiatan" class="form-label">Unggah foto kegiatan anak:</label>
                <div class="d-flex flex-column">
                    <input class="form-control" type="file" id="fotoKegiatan" name="fotoKegiatan">
                </div>
            </div>
            <button type="button" class="btn btn-primary m-3 float-end"><b>SUBMIT</b></button>
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
