<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranTable extends Migration
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
            $table->bigInteger('kategori_job_id')->nullable();
            $table->string('status')->nullable();
            $table->text('alasan_reject')->nullable();
            $table->string('blacklist')->nullable();
            $table->date('tanggal_cek_verifikasi')->nullable();
            $table->date('tanggal_sudah_verifikasi')->nullable();
            $table->date('tanggal_reject_verifikasi')->nullable();
            $table->string('bayar_cf', 50)->nullable();
            $table->string('bukti_tf_cf', 50)->nullable();
            $table->date('tanggal_tf_cf')->nullable();
            $table->string('status_paid_cf', 50)->nullable();
            $table->date('tanggal_refund_cf')->nullable();
            $table->string('bayar_refund_cf', 50)->nullable();
            $table->text('catatan_pembayaran_cf')->nullable();
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
}
