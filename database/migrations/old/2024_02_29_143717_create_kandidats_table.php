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
        Schema::create('kandidat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kandidat');
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
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('no_wa')->nullable();
            $table->string('foto')->nullable();

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
        Schema::dropIfExists('kandidat');
    }
};
