<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function siswa()
    {
        // Ambil data siswa yang sedang login
        $student = auth()->user(); // Pastikan Anda menggunakan autentikasi

        return view('profile.siswa', compact('student')); // Pastikan path ini benar
    }
}
