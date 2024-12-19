@extends('layouts.app-admin')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light rounded-3 p-2">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-dark fw-bold">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Capaian Penilaian</li>
        </ol>
    </nav>
    <h1 class="mb-4">Capaian Penilaian</h1>
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahCapaianModal">Tambah Capaian Penilaian</button>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Pernyataan</th>
                <th>Penilaian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($capaianPenilaian as $capaian)
                <tr>
                    <td>{{ $capaian->pernyataan }}</td>
                    <td>{{ $capaian->penilaian }}</td>
                    <td>
                        <a href="{{ route('capaian.edit', $capaian->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('capaian.destroy', $capaian->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Tambah Capaian -->
<div class="modal fade" id="tambahCapaianModal" tabindex="-1" aria-labelledby="tambahCapaianModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahCapaianModalLabel">Tambah Capaian Penilaian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('capaian.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="pernyataan" class="form-label">Pernyataan</label>
                        <input type="text" class="form-control" id="pernyataan" name="pernyataan" required>
                    </div>
                    <div class="mb-3">
                        <label for="penilaian" class="form-label">Penilaian</label>
                        <select class="form-select" id="penilaian" name="penilaian" required>
                            <option value="belumMuncul">Belum Muncul</option>
                            <option value="muncul">Muncul</option>
                            <option value="baik">Baik</option>
                            <option value="sudahMuncul">Sudah Muncul</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection