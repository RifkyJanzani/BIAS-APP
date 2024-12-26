@extends('layouts.app-guru')

@section('content')
<div class="content-wrapper">
    <div class="container py-4">
        <!-- Back button dan nama siswa -->
        <div class="d-flex align-items-center mb-4">
            <a href={{ route('guru.kelas.daftar-pekan', ['nis'=>$nis]) }}  class="text-decoration-none text-dark">
                <div class="d-flex align-items-center">
                    <i class="bi bi-arrow-left-circle-fill fs-4 me-2"></i>
                    <h4 class="mb-0">{{ $nama }} / Bulan {{ ucfirst($bulan) }}, Pekan ke {{ $pekan }}</h4>
                </div>
            </a>
        </div>
        <!-- Card pilihan rapor -->
        <div class="card shadow-sm">
        <form action="{{ $penilaian->isNotEmpty() ? route('update.penilaian', $penilaian->first()->id) : route('submit.penilaian') }}" method="POST" enctype="multipart/form-data" id="penilaianForm">
            @csrf
            @if($penilaian->isNotEmpty())
                @method('PUT') <!-- Gunakan metode PUT jika penilaian sudah ada -->
            @endif

            <!-- Input tersembunyi untuk bulan dan pekan -->
            <input type="hidden" name="nis" value="{{ $nis }}">            
            <input type="hidden" name="bulan" value="{{ $bulan }}">
            <input type="hidden" name="pekan" value="{{ $pekan }}">

            <div class="p-3 border rounded shadow-sm">
                <p class="text-secondary mb-4">Silakan mengisi kriteria penilaian di bawah ini.</p>
                
                <!-- Loop untuk menampilkan daftar pertanyaan secara dinamis -->
                @foreach($kriterias as $kriteria)
                    <h4 class="my-5">{{ $kriteria }}</h4>
                    @foreach($capaian as $item)
                    @if ($item['kriteria'] != $kriteria)
                        @continue
                    @endif
                    @php
                        $penilaianItem = $penilaian->where('id_capaian', $item['id'])->first();
                    @endphp
                    <div class="m-3 p-3 border rounded shadow-sm">
                        <label for="capaian_{{ $item['id'] }}" class="form-label mb-sm-2 mb-3">{{ $item['pernyataan'] }}</label>
                        <div id="capaian_{{ $item['id'] }}" class="d-flex flex-wrap flex-column flex-sm-row justify-content-sm-around justify-content-start gap-sm-0 gap-3">
                            <div class="form-check">
                                <input class="form-check-input" style="cursor: pointer" type="radio" name="capaian_{{ $item['id'] }}" id="belumMuncul_{{ $item['id'] }}" value="0" required
                                {{ $penilaianItem ? ($penilaianItem->capaian == '0' ? 'checked' : '') : '' }}>
                                <label class="form-check-label" style="cursor: pointer" for="belumMuncul_{{ $item['id'] }}">
                                    Belum Muncul
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" style="cursor: pointer" type="radio" name="capaian_{{ $item['id'] }}" id="muncul_{{ $item['id'] }}" value="1" required 
                                {{ $penilaianItem ? ($penilaianItem->capaian == '0' ? '' : 'checked') : '' }}>
                                <label class="form-check-label" style="cursor: pointer" for="muncul_{{ $item['id'] }}">
                                    Muncul
                                </label>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endforeach

                <div class="m-3 p-3 border rounded shadow-sm">
                    <label for="fotoKegiatan" class="form-label">Unggah foto kegiatan anak:</label>
                    <div class="d-flex flex-column">
                        <input class="form-control" type="file" id="fotoKegiatan" name="fotoKegiatan">
                    </div>
                </div>

                <!-- Ubah teks tombol berdasarkan apakah penilaian ada atau tidak -->
                <button type="submit" class="btn btn-primary m-3 float-end mt-5" id="submitBtn" disabled><b>{{ $penilaian->isNotEmpty() ? 'UPDATE' : 'SUBMIT' }}</b></button>
            </div>
        </form>
    </div>
</div>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // JavaScript untuk mendeteksi perubahan dan mengaktifkan tombol
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('penilaianForm');
        const submitBtn = document.getElementById('submitBtn');
        
        let initialData = new FormData(form);
        
        // Fungsi untuk memeriksa perubahan
        form.addEventListener('change', function() {
            let currentData = new FormData(form);
            let isChanged = false;

            // Bandingkan data awal dan data saat ini
            for (let [key, value] of currentData.entries()) {
                if (value !== initialData.get(key)) {
                    isChanged = true;
                    break;
                }
            }

            // Aktifkan atau nonaktifkan tombol sesuai perubahan
            submitBtn.disabled = !isChanged;
        });

        // Menampilkan SweetAlert jika ada pesan 'success' di session
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonText: 'Tutup'
            });
        @endif

        // Menampilkan loading screen hanya saat submit
        submitBtn.addEventListener('click', function(event) {
            // Menampilkan SweetAlert loading saat tombol submit ditekan
            Swal.fire({
                title: 'Kami sedang membuat Rapor Triwulan',
                text: 'Karena Anda telah mengisi rapor selama 3 bulan. Harap tunggu 3-6 menit.',
                showConfirmButton: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
        });
    });
</script>

@endsection
