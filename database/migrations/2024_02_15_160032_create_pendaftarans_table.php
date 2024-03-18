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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('negara_id')->nullable();
            $table->string('nama_negara')->nullable();
            $table->bigInteger('kategori_job_id')->nullable();
            $table->string('nama_kategori_job')->nullable();
            // informasi pribadi
            $table->string('nik')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('usia')->nullable();
            $table->string('agama')->nullable();
            $table->string('berat_badan')->nullable();
            $table->string('tinggi_badan')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('status_kawin')->nullable();
            $table->string('nama_lengkap_ayah')->nullable();
            $table->string('nama_lengkap_ibu')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kota')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('referensi')->nullable();
            $table->string('nama_referensi')->nullable();
            // dokumen perjalanan luar negeri
            $table->string('no_paspor')->nullable();
            $table->date('tanggal_pengeluaran_paspor')->nullable();
            $table->string('masa_kadaluarsa')->nullable();
            $table->string('kantor_paspor')->nullable();
            $table->string('kondisi_paspor')->nullable();
            // pengalaman kerja
            // $table->string('negara_tempat_kerja')->nullable();
            // $table->string('nama_perusahaan')->nullable();
            // $table->date('tanggal_mulai_kerja')->nullable();
            // $table->date('tanggal_selesai_kerja')->nullable();
            // $table->string('posisi')->nullable();
    
            // english skill
            $table->string('level_bahasa_inggris')->nullable();
            $table->string('sertifikat_bahasa_inggris')->nullable();
    
            // screening
            $table->string('memiliki_anak')->nullable();
            $table->string('jumlah_anak')->nullable();
            $table->string('usia_anak')->nullable();
            $table->string('yakin_kerja_diluar_negeri')->nullable();
            $table->string('patuh_peraturan')->nullable();
            $table->string('motivasi')->nullable();
    
            // screening health
            $table->string('apa_anda_sehat')->nullable();
            $table->string('keterbatasan_fisik')->nullable();
            $table->string('keterangan_keterbatasan_fisik')->nullable();
            $table->string('pernah_operasi')->nullable();
            $table->string('keterangan_pernah_operasi')->nullable();
            $table->string('riwayat_penyakit_rawat')->nullable();
            $table->string('keterangan_riwayat_penyakit_rawat')->nullable();
            $table->string('apa_anda_hamil')->nullable();
            // upload dokumen
            $table->string('foto')->nullable();
            $table->string('paspor')->nullable();
            $table->string('ktp')->nullable();
            $table->string('kk')->nullable();
            // informasi pendukung
            $table->string('sertifikat_kompetensi')->nullable();
            $table->string('paklaring')->nullable();
            $table->string('video_diri')->nullable();
            $table->string('video_skill')->nullable();
            $table->string('password')->nullable();
            $table->string('status')->nullable();
            $table->string('blacklist')->nullable();

             // informasi kontak
             $table->string('email')->nullable();
             $table->string('no_hp')->nullable();
             $table->string('no_wa')->nullable();
         
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
        Schema::dropIfExists('pendaftaran');
    }
};
