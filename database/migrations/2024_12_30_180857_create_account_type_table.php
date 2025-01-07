<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTypeTable extends Migration
{
    public function up()
    {
        Schema::create('account_type', function (Blueprint $table) {
            $table->id(); // Kolom ID yang auto increment
            $table->string('type_name')->unique(); // Kolom untuk nama tipe akun, harus unik
            $table->text('description')->nullable(); // Kolom untuk deskripsi tipe akun, bisa null
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->string('account_type')->after('password');

        });
    }

    public function down()
    {
        Schema::dropIfExists('account_type'); // Menghapus tabel jika migration dibatalkan
    }
}
