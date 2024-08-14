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
        // add field nama_kontak_darurat in kandidat table
        Schema::table('kandidat', function (Blueprint $table) {
            $table->mediumText('nama_kontak_darurat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('kandidat', function (Blueprint $table) {
            $table->dropColumn('nama_kontak_darurat');
        });
    }
};
