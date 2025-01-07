<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <style>
        h1 {
            font-family: 'Roboto', sans-serif;
            font-weight: 500;
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('layouts.navbar')

    <div class="container mt-4">
        <h1>Data Kelas dan QR Code</h1>
        <div class="card">
            <div class="card-header text-white" style="background-color: #24313d;">
                <h5>Daftar Kelas</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID Kelas</th>
                            <th>Nama Kelas</th>
                            <th>Nama Guru</th>
                            <th>Mata Pelajaran</th>
                            <th>Jam Pengajaran</th>
                            <th>Jumlah Siswa</th>
                            <th>QR Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kelas as $item)
                        <tr>
                            <td>{{ $item->id_kelas }}</td>
                            <td>{{ $item->nama_kelas }}</td>
                            <td>{{ $item->nama_guru }}</td>
                            <td>{{ $item->mata_pelajaran }}</td>
                            <td>{{ $item->jam_pengajaran }}</td>
                            <td>{{ $item->jumlah_siswa }}</td>
                            <td>
                                <div id="qrCodeContainer{{ $item->id_kelas }}" style="display: inline-block;"></div>
                                <script>
                                    new QRCode(document.getElementById("qrCodeContainer{{ $item->id_kelas }}"), {
                                        text: `ID: {{ $item->id_kelas }}\nNama Kelas: {{ $item->nama_kelas }}`,
                                        width: 100,
                                        height: 100,
                                    });
                                </script>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</body>
</html>
