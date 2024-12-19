@extends('layouts.app-guru')

@section('content')
<div class="content-wrapper">
    <div class="container py-4">
        <!-- Back button dan nama siswa -->
        <div class="d-flex align-items-center mb-4">
            <a href="javascript:void(0);" onclick="window.history.back()" class="text-decoration-none text-dark">
                <div class="d-flex align-items-center">
                    <i class="bi bi-arrow-left-circle-fill fs-4 me-2"></i>
                    <h4 class="mb-0">{{ $nama }}</h4>
                </div>
            </a>
        </div>

        <!-- Card pilihan rapor -->
        <div class="card shadow-sm">
            <div class="card-body">
                <p class="text-secondary mb-4">Silakan pilih ingin menilai di bulan dan pekan keberapa.</p>

                <!-- Pilihan Rapor -->
                <div class="d-grid gap-2">
                    <div class="accordion" id="accordionExample">
                        @php
                            // Daftar bulan yang ingin ditampilkan
                            $months = ['September', 'Oktober', 'November', 'Desember', 'Januari', 'Februari', 'Maret', 'April', 'Mei'];
                        @endphp

                        @foreach($months as $index => $month)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-{{ $index }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $index }}" aria-expanded="false" aria-controls="collapse-{{ $index }}">
                                    {{ $month }}
                                </button>
                            </h2>
                            <div id="collapse-{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $index }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="d-grid gap-0">
                                        @for($week = 1; $week <= 4; $week++)
                                            <a href="{{ route('guru.kelas.penilaian', ['nis' => $nis, 'bulan' => strtolower($month), 'pekan' => $week]) }}" class="btn btn-light text-start py-2 mb-2">
                                                Pekan {{ $week }}
                                            </a>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


            </div>
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

    /* Styling untuk tombol */
    .btn {
        font-weight: 500;
    }

    .btn-light {
        background-color: #f8f9fa;
        border: none;
    }

    .btn-light:hover {
        background-color: #e9ecef;
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
