<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTable extends Migration
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
            $table->string('mitra')->nullable();
            $table->string('tanggal_tutup')->nullable();
            $table->string('gaji')->nullable();
            $table->string('jenis_pembayaran')->nullable();
            $table->string('estimasi_minimal')->nullable();
            $table->string('estimasi_maksimal')->nullable();
            $table->string('gaji_diterima')->nullable();
            $table->string('tanggal_kurs')->nullable();
            $table->string('nominal_kurs')->nullable();
            $table->bigInteger('negara_id')->nullable();
            $table->bigInteger('kategori_job_id')->nullable();
            $table->string('kontrak_kerja')->nullable();
            $table->string('jam_kerja')->nullable();
            $table->string('hari_kerja')->nullable();
            $table->string('cuti_kerja')->nullable();
            $table->string('masa_percobaan')->nullable();
            $table->string('mata_uang_gaji')->nullable();
            $table->string('kerja_lembur')->nullable();
            $table->string('bahasa')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tinggi_badan')->nullable();
            $table->string('berat_badan')->nullable();
            $table->string('rentang_usia')->nullable();
            $table->string('level_bahasa')->nullable();
            $table->string('pengalaman_kerja')->nullable();
            $table->text('paragraf_galeri')->nullable();
            $table->string('link_video')->nullable();
            $table->text('info_lain')->nullable();
            $table->text('disclaimer')->nullable();
            $table->enum('status', ['draft', 'publish'])->default('publish');
            $table->string('gambar')->nullable();
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
}
