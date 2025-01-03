@extends('layouts.app-kepsek')

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
                            <h4 class="mb-0 text-start fw-bold">{{ $totalSiswa }}</h4>
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
    <!-- Card untuk Tabel -->
    <div class="card shadow-sm">
        <div class="card-body">
            <!-- Header -->
            <h5 class="card-title fw-bold text-dark">Siswa</h5>

            <!-- Tabel -->
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 10%;">Foto</th>
                            <th style="width: 20%;">>Nama</th>
                            <th style="width: 20%;">NIS</th>
                            <th style="width: 20%;">Kelas</th>
                            <th style="width: 15%;">Umur</th>
                            <th style="width: 15%;">Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($siswa as $s)
                        <tr>
                            <td>
                                @if($s->photo)
                                    <img src="{{ asset($s->photo) }}" class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/Profile Icon.png') }}" alt="Default Foto" class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                @endif
                            </td>
                            <td>{{ $s->name }}</td>
                            <td>{{ $s->nis }}</td>
                            <td>{{ $s->kelas }}</td>
                            <td>{{ $s->umur }}</td>
                            <td>{{ $s->gender }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Setelah table -->
            <div class="d-flex justify-content-center">
                {{ $siswa->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
    </div>
@endsection
