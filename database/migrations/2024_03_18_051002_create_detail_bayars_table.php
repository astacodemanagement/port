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
        Schema::create('detail_bayar', function (Blueprint $table) {
            $table->id();
            $table->string('seleksi_id'); 
            $table->string('tanggal_bayar'); 
            $table->string('jumlah_bayar'); 
            $table->string('bukti'); 
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
        Schema::dropIfExists('detail_bayar');
    }
};
