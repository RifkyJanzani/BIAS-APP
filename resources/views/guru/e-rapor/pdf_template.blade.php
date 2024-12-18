<!DOCTYPE html>
<html>
<head>
    <title>Rapor {{ $siswa->name }}</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1, h2, h3 {
            text-align: center;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .info {
            margin-bottom: 20px;
        }
        .info p {
            margin: 5px 0;
        }
        .content {
            margin-top: 20px;
        }
        .content h4 {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>YAYASAN ASH-SHADIQEN MARDHAATILLAH</h1>
        <h2>Laporan Perkembangan Anak Didik</h2>
    </div>

    <div class="info">
        <p>Nama Sekolah: RA Bina Ilmu Anak Shaleh</p>
        <p>Nama Siswa: {{ $siswa->name }}</p>
        <p>Semester / TA: 1 / 2023/2024</p>
        <p>Guru Kelas: Ratna, S.Ag</p>
        <p>Guru Pendamping: Syifa Nur Hasanah, S.Sos</p>
    </div>

    <div class="content">
        <h4>Nilai Agama dan Budi Pekerti</h4>
        <p>
            Alhamdulillah di semester ini, ananda {{ $siswa->name }} menunjukkan perkembangan yang baik dalam memahami nilai-nilai agama Islam...
        </p>
        <!-- Tambahkan informasi lain sesuai kebutuhan -->
    </div>
</body>
</html>
