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
        Schema::create('screaning', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('have_kids')->nullable();
            $table->integer('total_kids')->nullable();
            $table->integer('old_kids')->nullable();
            $table->boolean('willing_to_work')->nullable();
            $table->boolean('willing_to_obey_rules')->nullable();
            $table->boolean('motivation_work')->nullable();
            $table->enum('health', ['Healthy', 'no']);
            $table->boolean('pyschical_disability')->nullable();
            $table->string('pyschical_disability_explain')->nullable();
            $table->boolean('operation')->nullable();
            $table->string('operation_explain')->nullable();
            $table->boolean('disease')->nullable();
            $table->string('disease_explain')->nullable();
            $table->boolean('pregnant')->nullable();
            $table->string('pregnant_explain')->nullable();
            $table->boolean('declaration')->nullable();
            $table->unsignedBigInteger('id_kandidat');
            $table->foreign('id_kandidat')->references('id')->on('kandidat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('screaning');
    }
};
