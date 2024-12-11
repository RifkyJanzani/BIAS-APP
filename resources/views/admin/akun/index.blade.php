@extends('layouts.app-admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Akun</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Akun Kepala Sekolah</h3>
                    <a href="{{ route('admin.akun.create') }}" class="btn btn-success">
                        <i class="mdi mdi-plus me-1"></i>
                        Tambah Akun Kepala Sekolah
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th class="text-center">Aksi</th>
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
                                <td class="text-center">
                                    <form action="{{ route('akun.destroy', $kepsek->id) }}" method="post" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-link text-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-id="{{ $kepsek->id }}">
                                            <i class="mdi mdi-delete"></i>
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
                    <a href="#" class="btn btn-success">
                        <i class="mdi mdi-plus me-1"></i>
                        Tambah Akun Guru
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th class="text-center">Aksi</th>
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
                                <td class="text-center">
                                    <form action="{{ route('akun.destroy', $guru->id) }}" method="post" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-link text-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-id="{{ $guru->id }}">
                                            <i class="mdi mdi-delete"></i>
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