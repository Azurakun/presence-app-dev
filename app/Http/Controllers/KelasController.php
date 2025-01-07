<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas'; // Nama tabel di database
    protected $fillable = [
        'id_kelas',
        'nama_kelas',
        'nama_guru',
        'mata_pelajaran',
        'jam_pengajaran',
        'jumlah_siswa',
        'qr_code', // Tambahkan ini jika Anda menyimpan QR Code
    ];
}
