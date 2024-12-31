<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', // ID Siswa
        'name', // Nama Siswa
        'email', // Email Siswa
        'class_id', // ID Kelas
        // Tambahkan field lain yang diperlukan
    ];
}
