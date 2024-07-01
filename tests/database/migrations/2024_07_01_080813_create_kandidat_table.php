<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKandidatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kandidat', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pendaftaran_id')->nullable();
            $table->string('nik')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('usia')->nullable();
            $table->string('agama')->nullable();
            $table->string('berat_badan')->nullable();
            $table->string('tinggi_badan')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('status_kawin')->nullable();
            $table->string('nama_lengkap_ayah')->nullable();
            $table->string('nama_lengkap_ibu')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kota_id')->nullable();
            $table->string('kecamatan_id')->nullable();
            $table->string('provinsi_id')->nullable();
            $table->string('referensi')->nullable();
            $table->string('nama_referensi')->nullable();
            $table->string('nama_keluarga')->nullable();
            $table->string('hubungan')->nullable();
            $table->string('no_telp_darurat')->nullable();
            $table->string('no_paspor')->nullable();
            $table->date('tanggal_pengeluaran_paspor')->nullable();
            $table->string('masa_kadaluarsa')->nullable();
            $table->string('kantor_paspor')->nullable();
            $table->string('kondisi_paspor')->nullable();
            $table->string('level_bahasa_inggris')->nullable();
            $table->string('pic_level')->nullable();
            $table->string('catatan_level')->nullable();
            $table->string('sertifikat_bahasa_inggris')->nullable();
            $table->string('memiliki_anak')->nullable();
            $table->string('jumlah_anak')->nullable();
            $table->string('usia_anak')->nullable();
            $table->string('yakin_kerja_diluar_negeri')->nullable();
            $table->string('patuh_peraturan')->nullable();
            $table->string('motivasi')->nullable();
            $table->string('apa_anda_sehat')->nullable();
            $table->string('keterbatasan_fisik')->nullable();
            $table->string('keterangan_keterbatasan_fisik')->nullable();
            $table->string('pernah_operasi')->nullable();
            $table->string('keterangan_pernah_operasi')->nullable();
            $table->string('riwayat_penyakit_rawat')->nullable();
            $table->string('keterangan_riwayat_penyakit_rawat')->nullable();
            $table->string('apa_anda_hamil')->nullable();
            $table->string('ada_ktp')->nullable();
            $table->string('ada_kk')->nullable();
            $table->string('ada_akta_lahir')->nullable();
            $table->string('ada_ijazah')->nullable();
            $table->string('ada_buku_nikah')->nullable();
            $table->string('ada_paspor')->nullable();
            $table->string('penjelasan_dokumen')->nullable();
            $table->string('foto')->nullable();
            $table->string('paspor')->nullable();
            $table->string('ktp')->nullable();
            $table->string('kk')->nullable();
            $table->string('sertifikat_kompetensi')->nullable();
            $table->string('paklaring')->nullable();
            $table->string('akta_lahir')->nullable();
            $table->string('ijazah')->nullable();
            $table->text('buku_nikah')->nullable();
            $table->string('video_diri')->nullable();
            $table->string('video_skill')->nullable();
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('no_wa')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('status')->nullable();
            $table->string('blacklist')->nullable();
            $table->timestamps();
            $table->text('keterangan_belum_kerja')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kandidat');
    }
}
