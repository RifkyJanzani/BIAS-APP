@extends('layouts.app-admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light rounded-3 p-2">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-dark fw-bold">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar</li>
            </ol>
        </nav>
        <h1 class="mb-4">Daftar</h1>
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
                                                @if($item->photo)
                                                    <img src="{{ asset($item->photo) }}" class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                                @else
                                                    <img src="{{ asset('images/Profile Icon.png') }}" alt="Default Foto" class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                                @endif
                                            </div>
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->nis }}</td>
                                        <td>{{ $item->kelas }}</td>
                                        <td>{{ $item->umur }}</td>
                                        <td>{{ $item->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                        <td>
                                            <!-- Tombol Edit -->
                                            <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-primary btn-sm me-2">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            
                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('siswa.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
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
                @else
                    <p class="text-center">Data siswa tidak ditemukan.</p>
                @endif

                <!-- Modal Konfirmasi Hapus -->
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
                            </div>
                        </div>
                    </div>
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
