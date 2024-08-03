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
        Schema::table('pengalaman_kerja', function (Blueprint $table) {
            $table->string('desc_pekerjaan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengalaman_kerja', function (Blueprint $table) {
            $table->dropColumn('desc_pekerjaan')->nullable();
        });
    }
};
