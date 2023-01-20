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
        Schema::create('functionary_sectoral', function (Blueprint $table) {
            $table->unsignedBigInteger('sectoral_id');
            $table->unsignedBigInteger('functionary_id');
            $table->string('role');
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();

            $table->foreign('sectoral_id')->references('id')->on('sectorals')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('functionary_id')->references('id')->on('functionaries')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('functionary_sectoral');
    }
};
