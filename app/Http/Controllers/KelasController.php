<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'idKelas' => '  required|string',
            'namaKelas' => 'required|string',
            'namaGuru' => 'required|string',
            'mataPelajaran' => 'required|string',
            'jamPengajaran' => 'required|string',
            'jumlahSiswa' => 'required|integer',
        ]);

        // Save the data to the database (assuming you have a Kelas model)
        // Kelas::create($request->all());

        return response()->json(['success' => true]);
    }
}
