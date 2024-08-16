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
            $table->string('tanggal_mulai_kerja')->change();
            $table->string('tanggal_selesai_kerja')->change();
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
                $table->date('tanggal_mulai_kerja')->change();
                $table->date('tanggal_selesai_kerja')->change();
            });
    }
};
