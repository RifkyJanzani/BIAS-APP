@extends('layouts.app-admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light rounded-3 p-2">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-dark fw-bold">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Penilaian</li>
            </ol>
        </nav>
        <h1 class="mb-4">Penilaian</h1>
    </div>
@endsection