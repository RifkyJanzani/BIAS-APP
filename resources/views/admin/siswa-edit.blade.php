@extends('layouts.app-admin')

@section('content')
<div class="container">
    <h1>Edit Data Siswa</h1>
    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        @csrf
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
            <label for="umur" class="form-label">Umur</label>
            <input type="number" class="form-control" id="umur" name="umur" value="{{ $siswa->umur }}" required>
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
