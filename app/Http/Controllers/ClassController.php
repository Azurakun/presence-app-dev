<?php

namespace App\Http\Controllers;

use App\Models\ClassModel; // Pastikan Anda mengimpor model yang benar
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function update(Request $request)
{
    $validatedData = $request->validate([
        'idKelas' => 'required|string|max:50',
        'namaKelas' => 'required|string|max:100',
        'namaGuru' => 'required|string|max:100',
        'mataPelajaran' => 'required|string|max:100',
        'jamPengajaran' => 'required|string|max:50',
        'jumlahSiswa' => 'required|integer',
    ]);

    // Temukan kelas berdasarkan ID
    $class = ClassModel::where('id_kelas', $validatedData['idKelas'])->first();

    if ($class) {
        // Update data kelas
        $class->update([
            'nama_kelas' => $validatedData['namaKelas'],
            'nama_guru' => $validatedData['namaGuru'],
            'mata_pelajaran' => $validatedData['mataPelajaran'],
            'jam_pengajaran' => $validatedData['jamPengajaran'],
            'jumlah_siswa' => $validatedData['jumlahSiswa'],
        ]);

        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false, 'message' => 'Kelas tidak ditemukan.']);
}

    public function fetchKelas()
    {
        return response()->json(ClassModel::all());
    }
}
