@extends('layouts.app-admin')

@section('content')
    <div class="container">
        <h1>Akun</h1>
        <div class="card shadow" style="margin-bottom: 3rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Akun Kepala Sekolah</h3>
                    <a href="{{ route('admin.akun.create') }}" class="btn btn-success position-relative">
                        <i class="mdi mdi-plus me-1"></i>
                        Tambah Akun Kepala Sekolah
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="display: none;">1</span>
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-centered table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($kepseks as $kepsek)
                            <tr>
                                <td onclick="window.location='{{ route('akun.edit', $kepsek->id) }}'">
                                    <img src="{{ asset('images/profil-guru.png') }}" alt="table-user" class="me-2 rounded-circle" style="height: 3rem;"/>
                                    {{ $kepsek->name }}
                                </td>
                                <td onclick="window.location='{{ route('akun.edit', $kepsek->id) }}'">{{ $kepsek->email }}</td>
                                <td class="table-action text-center">
                                    <form action="{{ route('akun.destroy', $kepsek->id) }}" method="post" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="action-icon" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-id="{{ $kepsek->id }}">
                                            <i class="mdi mdi-delete text-danger"></i>
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
        
        <div class="card shadow" style="margin-bottom: 2rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Akun Guru</h3>
                    <a href="#" class="btn btn-success position-relative">
                        <i class="mdi mdi-plus me-1"></i>
                        Tambah Akun Guru
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="display: none;">1</span>
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-centered table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($gurus as $guru)
                            <tr>
                                <td onclick="window.location='{{ route('akun.edit', $guru->id) }}'">
                                    <img src="{{ asset('images/profil-guru.png') }}" alt="table-user" class="me-2 rounded-circle" style="height: 3rem;"/>
                                    {{ $guru->name }}
                                </td>
                                <td onclick="window.location='{{ route('akun.edit', $guru->id) }}'">{{ $guru->email }}</td>
                                <td class="table-action text-center">
                                    <form action="{{ route('akun.destroy', $guru->id) }}" method="post" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="action-icon" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-id="{{ $guru->id }}">
                                            <i class="mdi mdi-delete text-danger"></i>
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

    <style>
        .btn-success {
            transition: background-color 0.3s ease;
        }

        .btn-success:hover {
            background-color: #28a745;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
    
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
            const deleteButtons = document.querySelectorAll('.action-icon[data-bs-toggle="modal"]');
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