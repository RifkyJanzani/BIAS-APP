@extends('layouts.app-admin')

@section('content')
    <div class="container">
        <h1>Capaian Penilaian</h1>
        <a href="{{ route('admin.capaian.create') }}" class="btn btn-success">Tambah Capaian</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Pernyataan</th>
                    <th>Penilaian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($capaian as $item)
                    <tr>
                        <td>{{ $item->pernyataan }}</td>
                        <td>{{ $item->penilaian }}</td>
                        <td>
                            <a href="{{ route('admin.capaian.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('admin.capaian.destroy', $item->id) }}" method="POST" class="d-inline">
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
@endsection 