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
        Schema::create('pengalaman_kerja', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pendaftaran_id');
            $table->string('negara_tempat_kerja')->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->date('tanggal_mulai_kerja')->nullable();
            $table->date('tanggal_selesai_kerja')->nullable();
            $table->string('posisi')->nullable();
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
        Schema::dropIfExists('pengalaman_kerja');
    }
};
