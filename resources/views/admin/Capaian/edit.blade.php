@extends('layouts.app-admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light rounded-3 p-2">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-dark fw-bold">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.capaian.index') }}" class="text-decoration-none text-dark fw-bold">Capaian Penilaian</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Capaian</li>
            </ol>
        </nav>
        <h1>Edit Capaian Penilaian</h1>
        <form action="{{ route('admin.capaian.update', $capaian->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="pernyataan" class="form-label">Pernyataan</label>
                <input type="text" class="form-control" id="pernyataan" name="pernyataan" value="{{ $capaian->pernyataan }}" required>
            </div>
            <div class="mb-3">
                <label for="kriteria" class="form-label">Format Jawaban</label>
                <select class="form-select" id="kriteria" name="kriteria" required>
                    <option value="Nilai Agama dan Budi Pekerti" {{ $capaian->kriteria == 'Nilai Agama dan Budi Pekerti' ? 'selected' : '' }}>Nilai Agama dan Budi Pekerti</option>
                    <option value="Jati Diri" {{ $capaian->kriteria == 'Jati Diri' ? 'selected' : '' }}>Jati Diri</option>
                    <option value="Dasar Literasi dan STEAM" {{ $capaian->kriteria == 'Dasar Literasi dan STEAM' ? 'selected' : '' }}>Dasar Literasi dan STEAM</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection 