@extends('layouts.app-guru')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="icon-wrapper bg-dark text-white rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; margin-right: 15px;">
                            <img src="{{ asset('images/siswa.svg') }}" alt="Siswa" style="width: 30px; height: 30px;">
                        </div>
                        <div>
                            <p class="mb-0 text-start">Siswa</p>
                            <h4 class="mb-0 text-start fw-bold">{{ $jumlahSiswa }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="icon-wrapper bg-primary text-white rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; margin-right: 15px;">
                            <img src="{{ asset('images/penilaian.svg') }}" alt="Penilaian" style="width: 30px; height: 30px;">
                        </div>
                        <div>
                            <p class="mb-0 text-start">Penilaian</p>
                            <h4 class="mb-0 text-start fw-bold">7</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="icon-wrapper bg-info text-white rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; margin-right: 15px;">
                            <img src="{{ asset('images/Kelas Icon.svg') }}" alt="Kelas" style="width: 30px; height: 30px;">
                        </div>
                        <div>
                            <p class="mb-0 text-start">Kelas</p>
                            <h4 class="mb-0 text-start fw-bold">2</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card "Kelas Saya" -->
    <div class="card shadow-sm mb-4" style="background-color: #f9f9f9;">
        <div class="card-body">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title fw-bold text-dark">Kelas saya</h5>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        TK
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">TK</a></li>
                        <li><a class="dropdown-item" href="#">PG</a></li>
                    </ul>
                </div>
            </div>

            <!-- Daftar Kelas -->
            <div class="list-group">
                <!-- Kelas 1 -->
                <div class="list-group-item d-flex justify-content-between align-items-center rounded mb-2">
                    <span>TK A</span>
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/Kelas Icon.svg') }}" alt="Jumlah siswa" style="width: 20px; height: 20px;" class="me-2">
                        <span>36</span>
                    </div>
                </div>

                <!-- Kelas 2 -->
                <div class="list-group-item d-flex justify-content-between align-items-center rounded mb-2">
                    <span>TK B</span>
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/Kelas Icon.svg') }}" alt="Jumlah siswa" style="width: 20px; height: 20px;" class="me-2">
                        <span>36</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card untuk Tabel -->
    <div class="card shadow-sm">
        <div class="card-body">
            <!-- Header -->
            <h5 class="card-title fw-bold mb-3 text-primary">Siswa</h5>
            
            <!-- Tabel -->
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                            <th>Umur</th>
                            <th>Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop untuk menampilkan data siswa -->
                        @foreach($siswa as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!-- Cek jika foto ada, jika ada tampilkan, jika tidak tampilkan foto default -->
                                        @if($item->photo)
                                            <img src="{{ asset($item->photo) }}" alt="Foto Siswa" class="rounded-circle me-2" style="width: 30px; height: 30px;">
                                        @else
                                            <img src="{{ asset('images/Profile Icon.png') }}" alt="Foto Default" class="rounded-circle me-2" style="width: 30px; height: 30px;">
                                        @endif
                                        {{ $item->name }}
                                    </div>
                                </td>
                                <td>{{ $item->nis }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ $item->umur }}</td>
                                <td>{{ $item->gender == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection