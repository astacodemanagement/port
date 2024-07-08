<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogHistoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_histori', function (Blueprint $table) {
            $table->integer('ID')->primary();
            $table->string('Tabel_Asal', 50)->nullable();
            $table->integer('ID_Entitas')->nullable();
            $table->enum('Aksi', ['Create', 'Read', 'Update', 'Delete'])->nullable();
            $table->timestamp('Waktu')->nullable();
            $table->string('Pengguna', 50)->nullable();
            $table->text('Data_Lama')->nullable();
            $table->text('Data_Baru')->nullable();
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
        Schema::dropIfExists('log_histori');
    }
}
