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
        Schema::create('sectorals', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('abbreviation');
            $table->string('logo')->nullable();
            $table->string('description');
            $table->string('card_url')->nullable();
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
        Schema::dropIfExists('sectorals');
    }
};
