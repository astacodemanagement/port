<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kota', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('provinsi_id');
            $table->string('nama_kota', 100)->nullable()->index('kabkot');
            $table->string('nama_ibukota', 100)->nullable();
            $table->char('k_bsni', 3)->nullable()->index('kbsni');
            
            $table->foreign('provinsi_id', 'fk_provs_kabkots_idx')->references('id')->on('provinsi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kota');
    }
}
