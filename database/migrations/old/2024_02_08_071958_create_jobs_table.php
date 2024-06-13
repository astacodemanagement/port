<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job', function (Blueprint $table) {
            $table->id();
            $table->string('nama_job');
            $table->string('nama_perusahaan');
            $table->string('mitra');
            $table->string('tanggal_tutup');
            $table->string('gaji');
            $table->string('jenis_pembayaran');
            $table->string('estimasi_minimal');
            $table->string('estimasi_maksimal');
            $table->string('gaji_diterima');
            $table->string('tanggal_kurs');
            $table->string('nominal_kurs');
            $table->bigInteger('negara_id');  
            $table->string('nama_negara');  
            $table->bigInteger('kategori_job_id');  
            $table->string('nama_kategori_job');  
            $table->string('kontrak_kerja');  
            $table->string('jam_kerja');  
            $table->string('hari_kerja');  
            $table->string('cuti_kerja');  
            $table->string('masa_percobaan');  
            $table->string('mata_uang_gaji');  
            $table->string('kerja_lembur');  
            $table->string('bahasa');  
            $table->text('deskripsi');  
            $table->string('jenis_kelamin');  
            $table->string('tinggi_badan');  
            $table->string('berat_badan');  
            $table->string('rentang_usia');  
            $table->string('level_bahasa');  
            $table->string('pengalaman_kerja');  
            $table->text('paragraf_galeri');  
            $table->string('link_video');  
            $table->text('info_lain');  
            $table->text('disclaimer');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job');
    }
};
