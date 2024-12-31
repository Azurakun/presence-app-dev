<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    @include('layouts.navbar')

    <div class="d-flex">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            <h1 class="mb-4">Dashboard Admin</h1>

            <!-- Table of Classes with Barcodes -->
            <div class="card">
                <div class="card-header text-white" style="background-color: #24313d;">
                    <h5 style="margin: 0;">Kelas dengan Barcode</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Kelas</th>
                                <th>Nama Kelas</th>
                                <th>Nama Guru Pengajar</th>
                                <th>Mata Pelajaran</th>
                                <th>Jam Pengajaran</th>
                                <th>Jumlah Siswa</th>
                                <th>Barcode</th>
                                <th>Edit Data</th>
                            </tr>
                        </thead>
                        <tbody id="kelasTableBody">
                            <!-- Dynamic Content from Database -->
                        </tbody>
                    </table>
                </div>
            </div>            

            <!-- Edit Form -->
            <div id="editForm" class="card mt-4 d-none">
                <div class="card-header bg-warning text-dark">
                    <h5>Edit Data Kelas</h5>
                </div>
                <div class="card-body">
                    <form id="editFormData">
                        <div class="mb-3">
                            <label for="editIDKelas" class="form-label">ID Kelas</label>
                            <input type="text" class="form-control" id="editIDKelas" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="editNamaKelas" class="form-label">Nama Kelas</label>
                            <input type="text" class="form-control" id="editNamaKelas">
                        </div>
                        <div class="mb-3">
                            <label for="editNamaGuru" class="form-label">Nama Guru Pengajar</label>
                            <input type="text" class="form-control" id="editNamaGuru">
                        </div>
                        <div class="mb-3">
                            <label for="editMataPelajaran" class="form-label">Mata Pelajaran</label>
                            <input type="text" class="form-control" id="editMataPelajaran">
                        </div>
                        <div class="mb-3">
                            <label for="editJam" class="form-label">Jam Pengajaran</label>
                            <input type="text" class="form-control" id="editJam">
                        </div>
                        <div class="mb-3">
                            <label for="editJumlahSiswa" class="form-label">Jumlah Siswa</label>
                            <input type="number" class="form-control" id="editJumlahSiswa">
                        </div>
                        <button type="button" class="btn btn-primary" onclick="saveEditForm()">Simpan Perubahan</button>
                        <button type="button" class="btn btn-secondary" onclick="hideEditForm()">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetchKelasData();
        });

        function fetchKelasData() {
            fetch('/fetch_kelas') // Pastikan Anda memiliki route ini
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('kelasTableBody');
                    tableBody.innerHTML = '';
                    data.forEach((kelas, index) => {
                        const row = `<tr>
                            <td>${index + 1}</td>
                            <td>${kelas.id_kelas}</td>
                            <td>${kelas.nama_kelas}</td>
                            <td>${kelas.nama_guru}</td>
                            <td>${kelas.mata_pelajaran}</td>
                            <td>${kelas.jam_pengajaran}</td>
                            <td>${kelas.jumlah_siswa}</td>
                            <td><img src="${kelas.barcode}" alt="Barcode" style="cursor: zoom-in;" onclick="alert('Zoom Barcode ${kelas.nama_kelas}')"></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Aksi
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" onclick="showEditForm('${kelas.id_kelas}', '${kelas.nama_kelas}', '${kelas.nama_guru}', '${kelas.mata_pelajaran}', '${kelas.jam_pengajaran}', ${kelas.jumlah_siswa})">Edit</a></li>
                                        <li><a class="dropdown-item" href="#">Hapus</a></li>
                                        <li><a class="dropdown-item" href="#">Lihat Detail</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>`;
                        tableBody.innerHTML += row;
                    });
                });
        }

        function saveEditForm() {
            const formData = new FormData(document.getElementById('editFormData'));

            fetch('/update_kelas', { // Pastikan Anda memiliki route ini
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    alert('Data berhasil diupdate');
                    fetchKelasData();
                    hideEditForm();
                } else {
                    alert('Gagal mengupdate data');
                }
            });
        }

        function showEditForm(id, kelas, guru, mapel, jam, siswa) {
            document.getElementById('editIDKelas').value = id;
            document.getElementById('editNamaKelas').value = kelas;
            document.getElementById('editNamaGuru').value = guru;
            document.getElementById('editMataPelajaran').value = mapel;
            document.getElementById('editJam').value = jam;
            document.getElementById('editJumlahSiswa').value = siswa;
            document.getElementById('editForm').classList.remove('d-none');
        }

        function hideEditForm() {
            document.getElementById('editForm').classList.add('d-none');
        }
    </script>
</body>
</html>
