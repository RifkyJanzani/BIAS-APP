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
                <label for="format_jawaban" class="form-label">Format Jawaban</label>
                <select class="form-select" id="format_jawaban" name="format_jawaban" required>
                    <option value="format 1" {{ $capaian->format_jawaban == 'format 1' ? 'selected' : '' }}>Format 1</option>
                    <option value="format 2" {{ $capaian->format_jawaban == 'format 2' ? 'selected' : '' }}>Format 2</option>
                    <option value="deskripsi" {{ $capaian->format_jawaban == 'deskripsi' ? 'selected' : '' }}>Deskripsi</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection 