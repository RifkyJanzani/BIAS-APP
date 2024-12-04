@extends('layouts.app-admin')

@section('content')
<div class="container">
    <h1>Daftar</h1>
    <div class="card">
        <div class="card-body">
            <!-- Form Upload Excel -->
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data" class="mb-3">
                @csrf
                <div class="d-flex align-items-center">
                    <input type="file" name="file" class="form-control me-2" required>
                    <button type="submit" class="btn btn-success">Import</button>
                    <a href="{{ route('siswa.create') }}" class="btn btn-primary ms-2">
                        Tambah
                    </a>
                </div>
            </form>

            <!-- Tabel Data -->
            @if(isset($siswa) && $siswa->isNotEmpty())
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th></th>
                                <th>Nama</th>
                                <th>NIS</th>
                                <th>Kelas</th>
                                <th>Umur</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($siswa as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($item->foto)
                                                <img src="{{ asset('public/uploads' . $item->photo) }}" class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                            @else
                                                <img src="{{ asset('images/Profile Icon.png') }}" alt="Default Foto" class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->nis }}</td>
                                    <td>{{ $item->kelas }}</td>
                                    <td>{{ $item->umur }}</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-primary btn-sm me-2">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        
                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('siswa.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center">Data siswa tidak ditemukan.</p>
            @endif
        </div>
    </div>
</div>
@endsection
