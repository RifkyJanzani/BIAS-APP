@extends('layouts.app-guru')

@section('content')
    <div class="content-wrapper">
        <div class="container py-4">
            <!-- Search Bar -->
            <div class="row mb-4">
                <div class="col-md-6 col-lg-4">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search text-muted" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg>
                        </span>
                        <input type="text" class="form-control border-start-0 ps-0"
                            placeholder="Cari Rapor" aria-label="Cari Rapor">
                    </div>
                </div>
            </div>

            <!-- Title -->
            <h2 class="h4 mb-4"><b>E-Rapor Siswa</b></h2>

            <!-- Daftar Siswa Title -->
            <h5 class="mb-3">Daftar Siswa</h5>

            <!-- Daftar Siswa Table -->
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table custom-striped mb-0">
                            <thead>
                                <tr class="table-light">
                                    <th class="ps-3">Nama</th>
                                    <th>NIS</th>
                                    <th>Kelas</th>
                                    <th>Umur</th>
                                    <th>Jenis Kelamin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(range(1, 15) as $index)
                                <tr style="cursor: pointer" onclick="window.location='{{ route('guru.e-rapor.siswa') }}'">
                                    <td class="ps-3">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-wrapper me-2">
                                                <img src="{{ asset('images/foto-siswa.jpg') }}"
                                                    class="avatar-image"
                                                    alt="Avatar">
                                            </div>
                                            <span>Marvin McKinney</span>
                                        </div>
                                    </td>
                                    <td>2201169</td>
                                    <td>TK A</td>
                                    <td>5</td>
                                    <td>Laki-laki</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CSS tambahan -->
    <style>
        /* Aplikasikan Poppins ke semua elemen */
        * {
            font-family: 'Poppins', sans-serif;
        }

        /* Styling untuk teks */
        h2, h5 {
            font-weight: 600;
        }

        /* Styling untuk tabel */
        .table > :not(caption) > * > * {
            padding-top: 1rem;
            padding-bottom: 1rem;
            /* Override Bootstrap default background */
            --bs-table-bg: transparent !important;
            background-color: transparent !important;
        }

        /* Custom striped effect */
        .custom-striped tbody tr:nth-child(odd) {
            background-color: #f8f9fa !important;
        }

        .custom-striped tbody tr:nth-child(even) {
            background-color: #ffffff !important;
        }

        /* Hover effect */
        .custom-striped tbody tr:hover {
            background-color: #f1f3f5 !important;
        }

        /* Pastikan header tetap memiliki background */
        .custom-striped thead tr {
            background-color: #ffffff !important;
        }

        /* Styling untuk input search */
        .form-control {
            font-weight: 400;
        }

        /* Styling untuk teks dalam tabel */
        td, th {
            font-weight: 400;
        }

        th {
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
            margin-left: 330px; /* Sesuaikan dengan lebar offcanvas */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .content-wrapper {
                padding-left: 10px;
                padding-right: 10px;
            }

            body.sidebar-open .content-wrapper {
                margin-left: 0; /* Tidak bergeser di mobile */
            }
        }

        /* Tambahan untuk smooth transition pada offcanvas */
        .offcanvas {
            transition: transform 0.3s ease-in-out;
        }

        /* Style untuk avatar */
        .avatar-wrapper {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            overflow: hidden;
            position: relative;
        }

        .avatar-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
    </style>
@endsection
