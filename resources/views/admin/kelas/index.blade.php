@extends('layouts.app-admin')

@section('content')
<div class="container">
    <h1>Kelas</h1>
    <div class="row">
        @foreach($kelas as $k)
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="{{ asset('images/kelas-default.jpg') }}" class="card-img-top" alt="Gambar Kelas">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $k->kelas ?? 'Kelas Kosong' }}</h5>
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/Kelas Icon.svg') }}" alt="Jumlah siswa" style="width: 20px; height: 20px;" class="me-2">
                        <span>{{ $k->jumlah }}</span>
                    </div>
                    @if($k->kelas)
                    <a href="{{ route('admin.kelas.show', $k->kelas) }}" class="btn btn-primary">Lihat Siswa</a>
                    @else
                    <button class="btn btn-secondary" disabled>Kelas Kosong</button>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- <a href="#" class="btn btn-dark mt-3">+ Kelas Baru</a> --}}
</div>
@endsection
