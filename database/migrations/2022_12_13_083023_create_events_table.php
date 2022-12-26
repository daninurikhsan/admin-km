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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('abbreviation')->nullable();
            $table->string('short_description');
            $table->string('description');
            $table->string('registration_url');
            $table->string('information_url');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('bg_thumbnail');
            $table->string('fg_thumbnail');
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
        Schema::dropIfExists('events');
    }
};
