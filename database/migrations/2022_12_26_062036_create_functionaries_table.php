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
        Schema::create('functionaries', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->unsignedBigInteger('sectoral_id')->nullable();
            $table->string('name');
            $table->string('study_program');
            $table->string('generation');
            $table->string('card_url')->nullable();
            $table->timestamps();

            $table->foreign('sectoral_id')->references('id')->on('sectorals')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('functionaries');
    }
};
