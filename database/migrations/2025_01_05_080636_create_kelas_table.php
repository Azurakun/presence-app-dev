<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('id_kelas')->unique();
            $table->string('nama_kelas');
            $table->string('nama_guru');
            $table->string('mata_pelajaran');
            $table->string('jam_pengajaran');
            $table->integer('jumlah_siswa');
            // $table->string('qr_code')->nullable(); // Jika Anda ingin menyimpan QR Code
            $table->timestamps();
            $table->string('account_type')->after('password');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kelas');
    }
}
