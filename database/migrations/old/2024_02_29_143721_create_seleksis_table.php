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
        Schema::create('seleksi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kandidat_id');
            $table->string('nama_kandidat_id')->nullable();
            $table->bigInteger('job_id');
            $table->string('nama_job_id')->nullable();
            $table->string('status')->nullable();
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
};
