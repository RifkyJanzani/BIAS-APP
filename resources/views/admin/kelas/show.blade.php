@extends('layouts.app-admin')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light rounded-3 p-2">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-dark fw-bold">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.kelas.index') }}" class="text-decoration-none text-dark fw-bold">Kelas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Siswa Kelas {{ $kelas }}</li>
        </ol>
    </nav>

    <h1>Daftar Siswa Kelas {{ $kelas }}</h1>

    @if(count($siswa) == 0)
        <p>Belum ada siswa di kelas ini.</p>
    @else
        <table class="table table-striped table-bordered mb-0 table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswa as $index => $s)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            @if($s->photo)
                                <img src="{{ asset($s->photo) }}" class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/Profile Icon.png') }}" alt="Default Foto" class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                            @endif
                        </div>
                    </td>
                    <td>{{ $s->name }}</td>
                    <td>{{ $s->nis }}</td>
                    <td>{{ $s->umur }}</td>
                    <td>{{ $s->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-primary btn-sm me-2">
                            <i class="bi bi-pencil"></i>
                        </a>
                        
                        <!-- Tombol Hapus -->
                        <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
    @endif

    <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
