@extends('layouts.app-admin')

@section('content')
    <div class="container">
        <h1>Edit Capaian Penilaian</h1>
        <form action="{{ route('admin.capaian.update', $capaian->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="pernyataan" class="form-label">Pernyataan</label>
                <input type="text" class="form-control" id="pernyataan" name="pernyataan" value="{{ $capaian->pernyataan }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection 