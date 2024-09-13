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
        // kolom motivation_work di screaning dari boolean ke string
        Schema::table('screaning', function (Blueprint $table) {
            $table->string('motivation_work')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('screaning', function (Blueprint $table) {
            $table->boolean('motivation_work')->nullable()->change();
        });
    }
};
