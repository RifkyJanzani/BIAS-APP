@extends('layouts.app-guru')

@section('content')
<div class="container py-4">
    <!-- Title and Search Bar Section -->
    <div class="row mb-4">
        <div class="col-md-6 col-lg-4">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search text-muted" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </span>
                <input type="text" class="form-control border-start-0 ps-0"
                    placeholder="Cari Kelas" aria-label="Cari Kelas">
            </div>
        </div>
    </div>
    <h3 style="font-weight: bold; margin-right: 20px; padding: 30px 0;">Kelas</h3>

    <!-- Class Cards Section -->
    <div style="background-color: #f9f9f9; padding: 20px; border-radius: 10px; border: 1px solid #e0e0e0;">
        <h4 style="font-weight: bold;">Kelas Saya</h4>
        <div class="row mt-3">
            <!-- Card for TK A -->
            <div class="col-md-6">
                <div class="card" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 100%; max-width: 600px; margin: auto;">
                    <img src="https://placehold.co/600x300" class="card-img-top" alt="Kelas TK A" style="border-top-left-radius: 10px; border-top-right-radius: 10px; width: 100%; height: auto; object-fit: cover;">
                    <div class="card-body" onclick="window.location='{{ route('guru.kelas.daftar-siswa') }}'">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 style="font-weight: bold; margin: 0;">TK A</h5>
                            <div class="d-flex align-items-center" style="font-size: 0.9em; color: #888;">
                                <img src="{{ asset('images/Kelas Icon.svg') }}" alt="Jumlah siswa" style="width: 20px; height: 20px;" class="me-2">
                                <span>36</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card for TK B -->
            <div class="col-md-6">
                <div class="card" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 100%; max-width: 600px; margin: auto;">
                    <img src="https://placehold.co/600x300" class="card-img-top" alt="Kelas TK B" style="border-top-left-radius: 10px; border-top-right-radius: 10px; width: 100%; height: auto; object-fit: cover;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 style="font-weight: bold; margin: 0;">TK B</h5>
                            <div class="d-flex align-items-center" style="font-size: 0.9em; color: #888;">
                                <img src="{{ asset('images/Kelas Icon.svg') }}" alt="Jumlah siswa" style="width: 20px; height: 20px;" class="me-2">
                                <span>36</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
