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
            $table->enum('kategori', ['dalam negeri', 'luar negeri'])->default('dalam negeri');
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
            $table->dropColumn('kategori');
        });
    }
};
