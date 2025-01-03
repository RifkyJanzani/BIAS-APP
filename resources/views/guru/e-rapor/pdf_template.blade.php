<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapor {{ $siswa->name }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 20px;
        }

        h1, h2, h3 {
            text-align: center;
        }

        hr {
            border: none;
            margin: 10px 0; /* Mengurangi jarak vertikal */
            background-color: #28a745;
            height: 3px;
        }

        .text-title {
            text-align: center;
            margin-top: 5px; /* Mengurangi jarak setelah <hr> */
            margin-bottom: 10px; /* Jarak sebelum elemen berikutnya */
            font-weight: bold;
        }

        /* Table Styling for Header */
        .header-table {
            width: 100%; /* Lebar penuh tabel */
            border-collapse: collapse; /* Hapus jarak antar sel */
        }

        .header-table td {
            vertical-align: middle; /* Konten di tengah secara vertikal */
        }

        .header-logo {
            width: 100px; /* Lebar tetap untuk kolom logo */
            text-align: center;
        }

        .header-logo img {
            width: 100px; /* Ukuran logo */
            height: auto; /* Proporsi logo tetap */
        }

        .header-text {
            text-align: left;
            padding-left: 20px; /* Jarak antara teks dan logo */
            color: #28a745;
        }

        .header-text h1 {
            font-size: 18px;
            margin: 5px 0;
            text-transform: uppercase;
            font-weight: bold;
        }

        .header-text p {
            font-size: 12px;
            margin: 5px 0;
            text-align: center;
        }


        /* Table Styling */
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .info-table th, .info-table td {
            border: 1px solid #000;
            text-align: left;
            padding: 8px;
            white-space: nowrap; /* Prevent line wrapping */
            overflow: hidden; /* Hide overflow content if too long */
        }

        /* Adjust column widths */
        .info-table th:nth-child(1), .info-table th:nth-child(3) {
            width: 15%; /* Kolom Nama Sekolah dan Kelas */
        }

        .info-table td:nth-child(2), .info-table td:nth-child(4) {
            width: 35%; /* Kolom isi Nama Sekolah dan Kelas */
        }
        /* Jarak antar tabel */
        .mb-5 {
            margin-bottom: 3rem; /* Atur jarak antar tabel */
        }

        /* Pastikan border terlihat */
        .table-bordered {
            border-collapse: collapse; /* Border tabel lebih tegas */
        }

        .table-bordered th, .table-bordered td {
            border: 1px solid #000; /* Border pada sel tabel */
        }

        /* Page break styles */
        h2, h3, h4, p {
            page-break-inside: avoid;
        }
        .page-break {
            page-break-after: always;
        }
        .long-text {
            overflow-wrap: break-word;
            word-wrap: break-word;
            hyphens: auto;
        }
    </style>
</head>
<body>

    <table class="header-table">
        <tr>
            <td class="header-logo">
                <img src="{{ public_path('images/BIAS LOGO.png') }}" alt="Logo">
            </td>
            <td class="header-text">
                <h1>YAYASAN ASH-SHADIQIEN MARDHAATILLAH</h1>
                <h1>RAUDHATUL ATHFAL BINA ILMU ANAK SHALEH</h1>
                <p>NS. RA. 10.1.23.27.30.143</p>
                <p>JL. BATU RADEN RAYA NO 27 KECAMATAN RANCASARI KOTA BANDUNG 40292</p>
            </td>
        </tr>
    </table>
    <hr>

    <main>
        <div class="text-center">
            <h3>LAPORAN PERKEMBANGAN ANAK DIDIK</h3>
            <h3>TAHUN PELAJARAN 2024 – 2025</h3>
        </div>

        <!-- Info Table -->
        <table class="info-table">
            <tr>
                <th>Nama Sekolah</th>
                <td>RA Bina Ilmu Anak Shaleh</td>
                <th>Kelas</th>
                <td>TK A (Kuning)</td>
            </tr>
            <tr>
                <th>Nama Siswa</th>
                <td>{{ $siswa->name }}</td>
                <th>Fase</th>
                <td>Fondasi</td>
            </tr>
        </table>

        <!-- Nilai Agama dan Budi Pekerti Section -->
        <div class="container mt-4">
            <br>
            <table class="table table-bordered">
                <thead style="background-color: #28a745; color: #fff;">
                    <tr>
                        <th class="text-center">Nilai Agama dan Budi Pekerti</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: justify; line-height: 1.6;">
                            {{$rapor->nilai_agama_budi_pekerti}}
                        </td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th>Foto kegiatan anak</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Jati Diri Section -->
        <div class="container mt-5">
            <br>
            <table class="table table-bordered">
                <thead style="background-color: #17a2b8; color: #fff;">
                    <tr>
                        <th class="text-center">Jati Diri</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: justify; line-height: 1.6;">
                            {{$rapor->nilai_jati_diri}}
                        </td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th>Foto kegiatan anak</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Dasar-dasar Literasi dan STEAM Section -->
        <div class="container mt-5">
            <br>
            <table class="table table-bordered">
                <thead style="background-color: #ffc107; color: #000;">
                    <tr>
                        <th class="text-center">Dasar-dasar Literasi dan STEAM</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: justify; line-height: 1.6;">
                            {{$rapor->nilai_literasi_steam}}
                        </td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th>Foto kegiatan anak</th>
                    </tr>
                </thead>
            </table>
        </div>
    </main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
