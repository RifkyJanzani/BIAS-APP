@extends('layouts.app-admin')

@section('content')
<div class="container">
    <h1>Edit Data Siswa</h1>
    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="text-center mb-4">
            <div class="mb-3">
                <img id="photo-preview" 
                    src="{{ $siswa->photo ? asset($siswa->photo) : asset('images/Profile Icon.png') }}" 
                    alt="Foto Siswa" 
                    class="rounded-circle img-thumbnail"
                    style="width: 120px; height: 120px; object-fit: cover;">
            </div>
            <input type="file" class="form-control d-none" id="photo" name="photo" accept=".png, .jpg, .jpeg" onchange="previewPhoto(this)">
            <button class="btn btn-outline-primary btn-sm" type="button" onclick="document.getElementById('photo').click()">Unggah Foto</button>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $siswa->name }}" required>
        </div>
        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" class="form-control" id="nis" name="nis" value="{{ $siswa->nis }}" required>
        </div>
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $siswa->kelas }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">tanggal_lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="gender" name="gender" required>
                <option value="L" {{ $siswa->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $siswa->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.daftar') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
