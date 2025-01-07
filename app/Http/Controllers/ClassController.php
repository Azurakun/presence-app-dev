<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas; // Pastikan Anda memiliki model Kelas
use Intervention\Image\Facades\Image; // Tambahkan ini untuk menggunakan Intervention Image
use SimpleSoftwareIO\QrCode\Facades\QrCode; // Tambahkan ini untuk menggunakan QR Code

class ClassController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'idKelas' => 'required|string|max:255',
            'namaKelas' => 'required|string|max:255',
            'namaGuru' => 'required|string|max:255',
            'mataPelajaran' => 'required|string|max:255',
            'jamPengajaran' => 'required|string|max:255',
            'jumlahSiswa' => 'required|integer',
        ]);

        // Simpan data ke database
        $kelas = new Kelas();
        $kelas->id_kelas = $request->idKelas;
        $kelas->nama_kelas = $request->namaKelas;
        $kelas->nama_guru = $request->namaGuru;
        $kelas->mata_pelajaran = $request->mataPelajaran;
        $kelas->jam_pengajaran = $request->jamPengajaran;
        $kelas->jumlah_siswa = $request->jumlahSiswa;

        // Generate QR Code
        $qrCodeData = "ID: {$kelas->id_kelas}\nNama Kelas: {$kelas->nama_kelas}";
        $qrCodeImage = QrCode::format('png')->size(300)->generate($qrCodeData);

        // Save QR Code as image
        $qrCodePath = 'qr_codes/' . $kelas->id_kelas . '.png'; // Path untuk menyimpan QR Code
        Image::make($qrCodeImage)->save(public_path($qrCodePath));

        // Simpan path QR Code ke database
        $kelas->qr_code = $qrCodePath; // Pastikan kolom qr_code ada di tabel kelas
        $kelas->save();

        return response()->json(['success' => true]);
    }
}
