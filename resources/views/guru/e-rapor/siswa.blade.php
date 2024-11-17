@extends('layouts.app-guru')

@section('content')
<div class="container py-4">
    <!-- Back button dan nama siswa -->
    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('guru.e-rapor') }}" class="text-decoration-none text-dark">
            <div class="d-flex align-items-center">
                <i class="bi bi-arrow-left-circle-fill fs-4 me-2"></i>
                <h4 class="mb-0">Marvin McKinney</h4>
            </div>
        </a>
    </div>

    <!-- Card pilihan rapor -->
    <div class="card shadow-sm">
        <div class="card-body">
            <p class="text-secondary mb-4">Silakan pilih ingin melihat e-rapor yang mana.</p>

            <!-- Pilihan Rapor -->
            <div class="d-grid gap-2">
                <a href="{{ route('guru.e-rapor.triwulan') }}" class="btn btn-light text-start py-3">
                    Rapor Triwulan
                </a>
                <a href="{{ route('guru.e-rapor.akhir') }}" class="btn btn-light text-start py-3">
                    Rapor Akhir
                </a>
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
</style>
@endsection
