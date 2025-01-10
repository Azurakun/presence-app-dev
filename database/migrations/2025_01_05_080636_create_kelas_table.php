<?php
use Illuminate\Database\Migrations\Migration;  
use Illuminate\Database\Schema\Blueprint;  
use Illuminate\Support\Facades\Schema;  
  
class CreateKelasTable extends Migration  
{  
    /**  
     * Run the migrations.  
     *  
     * @return void  
     */  
    public function up()  
    {  
        Schema::create('kelas', function (Blueprint $table) {  
            $table->id(); // Kolom id  
            $table->string('id_kelas'); // Kolom id_kelas  
            $table->string('nama_kelas'); // Kolom nama_kelas  
            $table->string('nama_guru'); // Kolom nama_guru  
            $table->string('mata_pelajaran'); // Kolom mata_pelajaran  
            $table->string('jam_pengajaran'); // Kolom jam_pengajaran  
            $table->integer('jumlah_siswa'); // Kolom jumlah_siswa  
            $table->timestamps(); // Kolom created_at dan updated_at  
            $table->string('account_type'); // Kolom account_type  
        });  
    }  
  
    /**  
     * Reverse the migrations.  
     *  
     * @return void  
     */  
    public function down()  
    {  
        Schema::dropIfExists('kelas');  
    }  
}  
