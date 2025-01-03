@extends('layouts.app-admin')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light rounded-3 p-2">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard', ['kelas' => 'Semua']) }}" class="text-decoration-none text-dark fw-bold">Dashboard</a>
            <li class="breadcrumb-item"><a href="{{ route('admin.daftar') }}" class="text-decoration-none text-dark fw-bold">Daftar</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data Siswa</li>
        </ol>
    </nav>
    <h1>Tambah Data Siswa</h1>
    
    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data"> <!-- Tambahkan enctype -->
        @csrf
        <div class="text-center mb-4">
            <div class="mb-3">
                <img id="photo-preview" 
                    src="{{ asset('images/Profile Icon.png') }}" 
                    alt="Foto Siswa" 
                    class="rounded-circle img-thumbnail"
                    style="width: 120px; height: 120px; object-fit: cover;">
            </div>
            <input type="file" class="form-control d-none" id="photo" name="photo" accept=".png, .jpg, .jpeg" onchange="previewPhoto(this)">
            <button class="btn btn-outline-primary btn-sm" type="button" onclick="document.getElementById('photo').click()">Unggah Foto</button>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama siswa" required>
        </div>
        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS" required>
        </div>
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan kelas" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="gender" name="gender" required>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.daftar') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

<script>
    function previewPhoto(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('photo-preview').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
