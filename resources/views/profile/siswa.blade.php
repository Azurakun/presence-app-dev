<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Dashboard Siswa</h1>
        <div class="card">
            <div class="card-header">
                <h5>Selamat datang, {{ $student->name }}</h5>
            </div>
            <div class="card-body">
                <p>Email: {{ $student->email }}</p>
                <p>ID Kelas: {{ $student->class_id }}</p>
                <!-- Tambahkan informasi lain yang relevan -->
            </div>
        </div>

        <h2 class="mt-4">Mata Pelajaran</h2>
        <ul class="list-group">
            <li class="list-group-item">Matematika</li>
            <li class="list-group-item">Bahasa Inggris</li>
            <li class="list-group-item">Ilmu Pengetahuan Alam</li>
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
