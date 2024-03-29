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
        Schema::table('sectorals', function (Blueprint $table) {
            $table->unsignedBigInteger('cabinet_id')->after('card_url');
            $table->foreign('cabinet_id')->references('id')->on('cabinets')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sectorals', function (Blueprint $table) {
            //
        });
    }
};
