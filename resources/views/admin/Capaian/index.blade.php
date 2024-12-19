@extends('layouts.app-admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light rounded-3 p-2">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-dark fw-bold">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Capaian Penilaian</li>
            </ol>
        </nav>
        <h1>Capaian Penilaian</h1>
        <a href="{{ route('admin.capaian.create') }}" class="btn btn-success">Tambah Capaian</a>
        <table class="table table-striped table-bordered mb-0 table-hover">
            <thead>
                <tr>
                    <th>Pernyataan</th>
                    <th>Format Jawaban</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($capaian as $item)
                    <tr>
                        <td>{{ $item->pernyataan }}</td>
                        <td>{{ $item->format_jawaban }}</td>
                        <td>
                            <a href="{{ route('admin.capaian.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('admin.capaian.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-id="{{ $item->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
            const deleteButtons = document.querySelectorAll('.btn-danger[data-bs-toggle="modal"]');
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