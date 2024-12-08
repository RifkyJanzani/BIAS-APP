@extends('layouts.app-admin')

@section('content')
    <div class="container">
        <h1>Akun</h1>
        <div class="card shadow" style="margin-bottom: 3rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Akun Kepala Sekolah</h3>
                    <a href="#" class="btn btn-success position-relative">
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
                                <th>Kelas</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <tr>
                                <td>
                                    <img src="{{ asset('images/profil-guru.png') }}" alt="table-user" class="me-2 rounded-circle" style="height: 3rem;"/>
                                    Umi Kalkun
                                </td>
                                <td>umikalkun@example.com</td>
                                <td>Kelas A</td>
                                <td class="table-action text-center">
                                    <a href="javascript: void(0);" class="action-icon">
                                        <i class="mdi mdi-delete text-danger"></i>
                                    </a>
                                </td>
                            </tr>
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
                                <th>Kelas</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <tr>
                                <td>
                                    <img src="{{ asset('images/profil-guru.png') }}" alt="table-user" class="me-2 rounded-circle" style="height: 3rem;"/>
                                    Umi Kalkun
                                </td>
                                <td>umikalkun@example.com</td>
                                <td>Kelas A</td>
                                <td class="table-action text-center">
                                    <a href="javascript: void(0);" class="action-icon">
                                        <i class="mdi mdi-delete text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="{{ asset('images/profil-guru.png') }}" alt="table-user" class="me-2 rounded-circle" style="height: 3rem;"/>
                                    Budi Santoso
                                </td>
                                <td>budisantoso@example.com</td>
                                <td>Kelas B</td>
                                <td class="table-action text-center">
                                    <a href="javascript: void(0);" class="action-icon">
                                        <i class="mdi mdi-delete text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="{{ asset('images/profil-guru.png') }}" alt="table-user" class="me-2 rounded-circle" style="height: 3rem;"/>
                                    Siti Aminah
                                </td>
                                <td>sitiaminah@example.com</td>
                                <td>Kelas C</td>
                                <td class="table-action text-center">
                                    <a href="javascript: void(0);" class="action-icon">
                                        <i class="mdi mdi-delete text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-3">
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
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
@endsection