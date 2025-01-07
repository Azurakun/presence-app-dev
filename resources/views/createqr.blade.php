<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <style>
        .sidebar {
            min-height: 100vh;
            width: 250px;
        }

        .content {
            flex-grow: 1;
        }

        .form-control {
            padding: 0.5rem;
            font-size: 0.9rem;
        }

        .card {
            max-width: 100%;
        }

        .btn {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }

        .form-container {
            display: flex;
            flex-wrap: wrap; /* Responsive untuk layar kecil */
            gap: 20px;
        }

        .form-section, .qr-section {
            flex: 1 1 calc(50% - 20px); /* Kedua elemen membagi ruang 50% */
        }

        #qrCodeContainer {
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px dashed #ddd;
            padding: 20px;
            height: 100%;
        }

        #saveKelasBtn {
            margin-top: 10px; /* Tambahkan jarak dengan QR Code */
        }

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

    <div class="d-flex">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content Area -->
        <div class="content">
            <div class="container mt-4">
                <h1>Buat Kode QR untuk Kelas Baru</h1>
                <div class="card">
                    <div class="card-header text-white" style="background-color: #24313d;">
                        <h5>Form Tambah Kelas</h5>
                    </div>
                    <div class="card-body">
                        <!-- Container untuk Form dan QR Code -->
                        <div class="form-container">
                            <!-- Form Section -->
                            <div class="form-section">
                                <form id="addKelasForm">
                                    @csrf <!-- CSRF Token -->
                                    <div class="mb-1">
                                        <label for="idKelas" class="form-label">ID Kelas</label>
                                        <input type="text" class="form-control" id="idKelas" name="idKelas" required>
                                    </div>
                                    <div class="mb-1">
                                        <label for="namaKelas" class="form-label">Nama Kelas</label>
                                        <input type="text" class="form-control" id="namaKelas" name="namaKelas" required>
                                    </div>
                                    <div class="mb-1">
                                        <label for="namaGuru" class="form-label">Nama Guru Pengajar</label>
                                        <input type="text" class="form-control" id="namaGuru" name="namaGuru" required>
                                    </div>
                                    <div class="mb-1">
                                        <label for="mataPelajaran" class="form-label">Mata Pelajaran</label>
                                        <input type="text" class="form-control" id="mataPelajaran" name="mataPelajaran" required>
                                    </div>
                                    <div class="mb-1">
                                        <label for="jamPengajaran" class="form-label">Jam Pengajaran</label>
                                        <input type="text" class="form-control" id="jamPengajaran" name="jamPengajaran" required>
                                    </div>
                                    <div class="mb-1">
                                        <label for="jumlahSiswa" class="form-label">Jumlah Siswa</label>
                                        <input type="number" class="form-control" id="jumlahSiswa" name="jumlahSiswa" required>
                                    </div>
                                    <button type="submit" class="btn btn-success w-100">Buat Kode QR</button>
                                </form>
                            </div>

                            <!-- QR Code Section -->
                            <div class="qr-section">
                                <div id="qrCodeContainer">
                                    <span class="text-muted">QR Code akan muncul di sini</span>
                                </div>
                                <button class="btn btn-primary mt-3 w-100" id="saveKelasBtn" style="display: none;">Simpan Data Kelas</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script>
        document.getElementById('addKelasForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah form dari pengiriman default

            const idKelas = document.getElementById('idKelas').value;
            const namaKelas = document.getElementById('namaKelas').value;

            const qrCodeContainer = document.getElementById('qrCodeContainer');
            qrCodeContainer.innerHTML = ''; // Kosongkan konten sebelumnya

            // Membuat QR Code
            new QRCode(qrCodeContainer, {
                text: `ID: ${idKelas}\nNama Kelas: ${namaKelas}`, // Menggunakan backtick `` untuk template string
                width: 150,
                height: 150,
            });

            document.getElementById('saveKelasBtn').style.display = 'block'; // Tampilkan tombol simpan
        });

        document.getElementById('saveKelasBtn').addEventListener('click', function() {
        const formData = new FormData(document.getElementById('addKelasForm'));

        fetch('/save_kelas', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value // Include CSRF token
            }
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                alert('Data kelas berhasil disimpan.');
                window.location.href = '/dashboardadmin'; // Redirect ke halaman dashboard admin
            } else {
                alert('Gagal menyimpan data kelas.');
            }
        })
        .catch(error => {
            console.error('Error:', error); // Tangkap dan log kesalahan
            alert('Terjadi kesalahan saat menyimpan data kelas.');
        });
    });
    </script>
</body>
</html>
