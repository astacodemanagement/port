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
        Schema::create('refund_detail_bayar', function (Blueprint $table) {
            $table->id();
            $table->string('seleksi_id'); 
            $table->string('tanggal_bayar_refund'); 
            $table->string('jumlah_bayar_refund'); 
            $table->string('bukti_bayar_refund'); 
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
        Schema::dropIfExists('refund_detail_bayar');
    }
};
