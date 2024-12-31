<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'classes'; // Nama tabel di database

    protected $fillable = [
        'id_kelas',
        'nama_kelas',
        'nama_guru',
        'mata_pelajaran',
        'jam_pengajaran',
        'jumlah_siswa',
    ];
}