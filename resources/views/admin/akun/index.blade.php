@extends('layouts.app-admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light rounded-3 p-2">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard', ['kelas' => 'Semua']) }}" class="text-decoration-none text-dark fw-bold">Dashboard</a>
                <li class="breadcrumb-item active" aria-current="page">Akun</li>
            </ol>
        </nav>
        <h1 class="mb-4">Akun</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Akun Kepala Sekolah</h3>
                    <a href="{{ route('admin.akun.create') }}" class="btn btn-success">
                        <i class="mdi mdi-plus me-1"></i>
                        Tambah Akun
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered mb-0 table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kepseks as $kepsek)
                            <tr>
                                <td onclick="window.location='{{ route('akun.edit', $kepsek->id) }}'" style="cursor: pointer;">
                                    <img src="{{ asset('images/profil-guru.png') }}" alt="table-user" class="me-2 rounded-circle" style="height: 3rem;"/>
                                    {{ $kepsek->name }}
                                </td>
                                <td onclick="window.location='{{ route('akun.edit', $kepsek->id) }}'" style="cursor: pointer;">{{ $kepsek->email }}</td>
                                <td >
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('akun.edit', $kepsek->id) }}" class="btn btn-primary btn-sm me-2">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    
                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('akun.destroy', $kepsek->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-id="{{ $kepsek->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Akun Guru</h3>
                    <a href="{{ route('admin.akun.create') }}" class="btn btn-success">
                        <i class="mdi mdi-plus me-1"></i>
                        Tambah Akun
                    </a>
                </div>
                <div class="table-responsive" style="cursor: default">
                    <table class="table table-striped table-bordered mb-0 table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gurus as $guru)
                            <tr>
                                <td onclick="window.location='{{ route('akun.edit', $guru->id) }}'" style="cursor: pointer;">
                                    <img src="{{ asset('images/profil-guru.png') }}" alt="table-user" class="me-2 rounded-circle" style="height: 3rem;"/>
                                    {{ $guru->name }}
                                </td>
                                <td onclick="window.location='{{ route('akun.edit', $guru->id) }}'" style="cursor: pointer;">{{ $guru->email }}</td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('akun.edit', $guru->id) }}" class="btn btn-primary btn-sm me-2">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    
                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('akun.destroy', $guru->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-id="{{ $guru->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus akun ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        let deleteForm;

        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.btn-link[data-bs-toggle="modal"]');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    deleteForm = this.closest('form');
                });
            });

            document.getElementById('confirmDelete').addEventListener('click', function () {
                if (deleteForm) {
                    deleteForm.submit();
                }
            });
        });
    </script>
@endsection