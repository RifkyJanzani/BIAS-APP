@extends('layouts.app-kepsek')

@section('content')
<div class="container">
    <h1>Daftar Siswa</h1>

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
                    <th>Kelas</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswa as $index => $s)
                <tr style="cursor: pointer">
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
                    <td>{{ $s->kelas }}</td>
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
