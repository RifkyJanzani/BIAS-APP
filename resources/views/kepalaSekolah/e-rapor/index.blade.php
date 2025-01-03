@extends('layouts.app-kepsek')

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

            <!-- Dropdown for Report Selection -->
            <div class="row mb-4">
                <div class="col-md-6 col-lg-4">
                    <label for="raporSelect" class="form-label">Pilih Rapor</label>
                    <select id="raporSelect" class="form-select" onchange="filterSiswa()">
                        <option value="kosong">Tabel Kosong</option>
                        <option value="Triwulan">Rapor Triwulan</option>
                        <option value="Akhir">Rapor Akhir</option>
                    </select>
                </div>
            </div>

            <!-- Tabel Kosong -->
            <div class="card shadow-sm" id="tabelKosong">
                <div class="card-body p-0">
                    <h5 class="mb-3">Daftar Siswa Rapor - </h5>
                    <div class="table-responsive">
                        <table class="table custom-striped mb-0">
                            <thead>
                                <tr class="table-light">
                                    <th>Foto</th>
                                    <th class="ps-3">Nama</th>
                                    <th>NIS</th>
                                    <th>Kelas</th>
                                    <th>Umur</th>
                                    <th>Jenis Kelamin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada data yang ditampilkan.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Tabel Daftar Siswa Rapor Triwulan -->
            <div class="card shadow-sm" id="tabelTriwulan" style="display: none;">
                <div class="card-body p-0">
                    <h5 class="mb-3">Daftar Siswa Rapor - Triwulan</h5>
                    <div class="table-responsive">
                        <table class="table custom-striped mb-0">
                            <thead>
                                <tr class="table-light">
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>NIS</th>
                                    <th>Kelas</th>
                                    <th>Jenis Kelamin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($siswaTriwulan as $s)
                                <tr onclick="window.location='{{ route('kepsek.e-rapor.triwulan', $s->nis) }}'" style="cursor: pointer;">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($s->photo)
                                                <img src="{{ asset($s->photo) }}" class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                            @else
                                                <img src="{{ asset('images/Profile Icon.png') }}" alt="Default Foto" class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $s->name }}</td>
                                    <td>{{ $s->nis }}</td>
                                    <td>{{ $s->kelas }}</td>
                                    <td>{{ $s->gender }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Tabel Daftar Siswa Rapor Akhir -->
            <div class="card shadow-sm" id="tabelAkhir" style="display: none;">
                <div class="card-body p-0">
                    <h5 class="mb-3">Daftar Siswa Rapor - Akhir</h5>
                    <div class="table-responsive">
                        <table class="table custom-striped mb-0">
                            <thead>
                                <tr class="table-light">
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>NIS</th>
                                    <th>Kelas</th>
                                    <th>Jenis Kelamin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($siswaAkhir as $s)
                                <tr onclick="window.location='{{ route('kepsek.e-rapor.akhir', $s->nis) }}'" style="cursor: pointer;">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($s->photo)
                                                <img src="{{ asset($s->photo) }}" class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                            @else
                                                <img src="{{ asset('images/Profile Icon.png') }}" alt="Default Foto" class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $s->name }}</td>
                                    <td>{{ $s->nis }}</td>
                                    <td>{{ $s->kelas }}</td>
                                    <td>{{ $s->gender }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        // Fungsi untuk mengatur tampilan tabel berdasarkan pilihan dropdown
        function filterSiswa() {
            const selectedValue = document.getElementById('raporSelect').value;
            const tabelKosong = document.getElementById('tabelKosong');
            const tabelTriwulan = document.getElementById('tabelTriwulan');
            const tabelAkhir = document.getElementById('tabelAkhir');

            // Sembunyikan semua tabel
            tabelKosong.style.display = 'none';
            tabelTriwulan.style.display = 'none';
            tabelAkhir.style.display = 'none';

            // Tampilkan tabel sesuai pilihan
            if (selectedValue === 'kosong') {
                tabelKosong.style.display = '';
            } else if (selectedValue === 'Triwulan') {
                tabelTriwulan.style.display = '';
            } else if (selectedValue === 'Akhir') {
                tabelAkhir.style.display = '';
            }
        }

        // Memastikan state terakhir tetap terjaga saat halaman dimuat
        window.onload = function() {
            const selectedValue = localStorage.getItem('selectedRapor') || 'kosong';
            document.getElementById('raporSelect').value = selectedValue;
            filterSiswa();
        };

        // Simpan state pilihan dropdown ke localStorage
        document.getElementById('raporSelect').addEventListener('change', function() {
            localStorage.setItem('selectedRapor', this.value);
        });
    </script>
@endsection
