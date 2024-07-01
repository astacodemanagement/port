<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelurahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelurahan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kecamatan_id');
            $table->string('nama_kelurahan', 100)->nullable()->index('kelurahan');
            $table->char('kode_pos', 5)->nullable()->index('kdpos');
            
            $table->foreign('kecamatan_id', 'fk_kecs_kels_idx')->references('id')->on('kecamatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelurahan');
    }
}
