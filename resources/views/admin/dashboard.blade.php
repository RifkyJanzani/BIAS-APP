@extends('layouts.app-admin')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <!-- Card 1: Jumlah Siswa -->
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

        <!-- Card 2: Jumlah Kelas -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-wrapper bg-info text-white rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; margin-right: 15px;">
                        <img src="{{ asset('images/Kelas Icon.svg') }}" alt="Kelas" style="width: 30px; height: 30px;">
                    </div>
                    <div>
                        <p class="mb-0 text-start">Kelas</p>
                        <h4 class="mb-0 text-start fw-bold">{{ $jumlahKelas }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dropdown dan Daftar Kelas -->
    <div class="card shadow-sm mb-4" style="background-color: #f9f9f9;">
        <div class="card-body">
            <!-- Dropdown -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title fw-bold text-dark">Kelas</h5>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $kelasDipilih ?? 'Pilih Kelas' }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ url('admin/dashboard') }}">Semua Kelas</a></li>
                        @foreach($kelasSiswa as $kelas)
                            <li><a class="dropdown-item" href="{{ url('admin/dashboard?kelas=' . $kelas->kelas) }}">{{ $kelas->kelas }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Daftar Kelas -->
            <div class="list-group">
                @forelse($kelasSiswa as $kelas)
                    <div class="list-group-item d-flex justify-content-between align-items-center rounded mb-2">
                        <span>{{ $kelas->kelas }}</span>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/Kelas Icon.svg') }}" alt="Jumlah siswa" style="width: 20px; height: 20px;" class="me-2">
                            <span>{{ $kelas->jumlah }}</span>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Tidak ada data kelas tersedia.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Card untuk Tabel Siswa -->
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title fw-bold mb-3 text-primary">Siswa</h5>

            @if($siswa->isNotEmpty())
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>NIS</th>
                                <th>Kelas</th>
                                <th>Umur</th>
                                <th>Jenis Kelamin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($siswa as $item)
                                <tr>
                                    <td>
                                        <img src="{{ $item->photo ? asset($item->photo) : asset('images/Profile Icon.png') }}" 
                                             class="rounded" style="width: 40px; height: 40px; object-fit: cover;">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->nis }}</td>
                                    <td>{{ $item->kelas }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->age }} Tahun</td>
                                    <td>{{ $item->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $siswa->appends(['kelas' => request('kelas')])->links('vendor.pagination.custom') }}
            @else
                <p class="text-center">Tidak ada data siswa untuk kelas ini.</p>
            @endif
        </div>
    </div>
</div>
@endsection
