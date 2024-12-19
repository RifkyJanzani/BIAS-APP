@extends('layouts.app-guru')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light rounded-3 p-2">
            <li class="breadcrumb-item"><a href="{{ route('guru.dashboard') }}" class="text-decoration-none text-dark fw-bold">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('guru.kelas.index') }}" class="text-decoration-none text-dark fw-bold">Kelas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Siswa Kelas {{ $kelas }}</li>
        </ol>
    </nav>

    <h1>Daftar Siswa Kelas {{ $kelas }}</h1>

    @if(count($siswa) == 0)
        <p>Belum ada siswa di kelas ini.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswa as $index => $s)
                <tr style="cursor: pointer" onclick="window.location='{{ route('guru.kelas.daftar-pekan', [$s->nis]) }}'">
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
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('guru.kelas.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
