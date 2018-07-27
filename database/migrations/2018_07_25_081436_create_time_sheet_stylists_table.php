<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeSheetStylistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_sheet_stylists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stylist_id')->unsigned();
            $table->string('mon');
            $table->string('tues');
            $table->string('wed');
            $table->string('thur');
            $table->string('fri');
            $table->string('sat');
            $table->string('sun');
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
        Schema::dropIfExists('time_sheet_stylists');
    }
}
