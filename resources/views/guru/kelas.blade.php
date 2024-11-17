@extends('layouts.app-guru')

@section('content')
<div class="container">
    <!-- Title and Search Bar Section -->
    <div class="d-flex align-items-center mb-4">
        <div class="input-group w-25">
            <span class="input-group-text bg-white" style="border-radius: 10px 0 0 10px;">
                <i class="bi bi-search" style="font-size: 1.2em;"></i>
            </span>
            <input type="text" class="form-control" placeholder="Cari Kelas" style="border-radius: 0 10px 10px 0; background-color: #f1f1f1;">
        </div>
    </div>
    <h3 style="font-weight: bold; margin-right: 20px;">Kelas</h3>

    <!-- Class Cards Section -->
    <div style="background-color: #f9f9f9; padding: 20px; border-radius: 10px; border: 1px solid #e0e0e0;">
        <h4 style="font-weight: bold;">Kelas Saya</h4>
        <div class="row mt-3">
            <!-- Card for TK A -->
            <div class="col-md-6">
                <div class="card" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 100%; max-width: 600px; margin: auto;">
                    <img src="https://placehold.co/600x300" class="card-img-top" alt="Kelas TK A" style="border-top-left-radius: 10px; border-top-right-radius: 10px; width: 100%; height: auto; object-fit: cover;">
                    <div class="card-body">
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
