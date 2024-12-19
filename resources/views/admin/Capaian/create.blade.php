@extends('layouts.app-admin')

@section('content')
    <div class="container">
        <h1>Tambah Capaian Penilaian</h1>
        <form action="{{ route('admin.capaian.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="pernyataan" class="form-label">Pernyataan</label>
                <input type="text" class="form-control" id="pernyataan" name="pernyataan" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection 