<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeleksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seleksi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kandidat_id');
            $table->bigInteger('job_id');
            $table->string('job_terselect', 50)->nullable();
            $table->string('gaji_akhir', 50)->nullable();
            $table->bigInteger('durasi_kontrak')->nullable();
            $table->date('tanggal_akhir_kontrak')->nullable();
            $table->bigInteger('employer_id')->nullable();
            $table->bigInteger('agency_id')->nullable();
            $table->date('tanggal_apply')->nullable();
            $table->date('tanggal_cek_kualifikasi')->nullable();
            $table->date('tanggal_lolos_kualifikasi')->nullable();
            $table->text('keterangan_dari_lolos_kualifikasi')->nullable();
            $table->text('keterangan_interview')->nullable();
            $table->date('tanggal_interview')->nullable();
            $table->date('tanggal_dari_interview')->nullable();
            $table->text('keterangan_dari_interview')->nullable();
            $table->date('tanggal_dari_lolos_interview')->nullable();
            $table->text('keterangan_dari_lolos_interview')->nullable();
            $table->date('tanggal_dalam_proses')->nullable();
            $table->string('status_dalam_kerja', 50)->nullable();
            $table->text('keterangan_dalam_proses')->nullable();
            $table->date('tanggal_transfer_kf')->nullable();
            $table->string('status_kf', 50)->nullable();
            $table->date('tanggal_refund_kf')->nullable();
            $table->string('jumlah_refund_kf', 50)->nullable();
            $table->date('tanggal_berangkat')->nullable();
            $table->string('jam_terbang', 50)->nullable();
            $table->string('mik', 50)->nullable();
            $table->string('iktt', 50)->nullable();
            $table->string('mjk', 50)->nullable();
            $table->string('jak', 50)->nullable();
            $table->date('tanggal_ak')->nullable();
            $table->string('vt', 50)->nullable();
            $table->string('vd', 50)->nullable();
            $table->date('tanggal_validity')->nullable();
            $table->date('tanggal_terbit')->nullable();
            $table->date('tanggal_habis')->nullable();
            $table->string('pap', 50)->nullable();
            $table->text('supplier_id')->nullable();
            $table->text('keterangan_seleksi_terbang')->nullable();
            $table->date('tanggal_seleksi_terbang')->nullable();
            $table->date('tanggal_selesai_kontrak')->nullable();
            $table->text('keterangan_selesai_kontrak')->nullable();
            $table->date('tanggal_batal')->nullable();
            $table->text('keterangan_batal')->nullable();
            $table->string('status')->nullable();
            $table->string('biaya_penempatan')->nullable();
            $table->string('biaya_id')->nullable();
            $table->string('biaya_mcu')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('total_biaya')->nullable();
            $table->string('total_bayar')->nullable();
            $table->string('sisa_bayar')->nullable();
            $table->string('id_ktkln')->nullable();
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
        Schema::dropIfExists('seleksi');
    }
}
