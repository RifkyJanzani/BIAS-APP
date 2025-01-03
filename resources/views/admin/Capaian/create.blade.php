@extends('layouts.app-admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light rounded-3 p-2">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard', ['kelas' => 'Semua']) }}" class="text-decoration-none text-dark fw-bold">Dashboard</a>
                <li class="breadcrumb-item"><a href="{{ route('admin.capaian.index') }}" class="text-decoration-none text-dark fw-bold">Capaian Penilaian</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Capaian</li>
            </ol>
        </nav>
        <h1>Tambah Capaian Penilaian</h1>
        <form action="{{ route('admin.capaian.store') }}" method="POST">
            @csrf
            <!-- Dropdown untuk memilih kriteria -->
            <div class="mb-3">
                <label for="kriteria" class="form-label">Pilih Kriteria</label>
                <select class="form-select" id="kriteria" name="kriteria" required="required">
                    <option value="" disabled selected>Pilih Kriteria</option>
                    <option value="Nilai Agama dan Budi Pekerti">Nilai Agama dan Budi Pekerti</option>
                    <option value="Jati Diri">Jati Diri</option>
                    <option value="Dasar Literasi dan STEAM">Dasar Literasi dan STEAM</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="multiInputCheckbox" class="form-label">
                    <input type="checkbox" id="multiInputCheckbox"> Buat banyak pernyataan sekaligus
                </label>
            </div>

            <div id="singleInputContainer" class="mb-3">
                <label for="pernyataan" class="form-label">Pernyataan</label>
                <input type="text" class="form-control" id="pernyataan" name="pernyataan[]" required="required">
            </div>

            <div id="multiInputContainer" class="mb-3 d-none">
                <label for="pernyataanMulti" class="form-label">Masukkan banyak pernyataan (pisahkan dengan baris baru)</label>
                <textarea class="form-control" id="pernyataanMulti" name="pernyataan_multi" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script>
        const checkbox = document.getElementById('multiInputCheckbox');
        const singleInput = document.getElementById('singleInputContainer');
        const multiInput = document.getElementById('multiInputContainer');
        const singleInputField = document.getElementById('pernyataan');
        const multiInputField = document.getElementById('pernyataanMulti');
    
        checkbox.addEventListener('change', function () {
            if (this.checked) {
                // Hapus teks input jika checkbox dicentang
                singleInputField.value = '';
                multiInputField.value = '';
    
                singleInput.classList.add('d-none');
                multiInput.classList.remove('d-none');
                singleInputField.removeAttribute('required');
                multiInputField.setAttribute('required', 'required');
            } else {
                // Hapus teks input jika checkbox dibatalkan
                singleInputField.value = '';
                multiInputField.value = '';
    
                singleInput.classList.remove('d-none');
                multiInput.classList.add('d-none');
                multiInputField.removeAttribute('required');
                singleInputField.setAttribute('required', 'required');
            }
        });
    </script>    
@endsection