<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyInBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->integer('salon_id')->unsigned()->index()->change();
            $table->integer('stylist_id')->unsigned()->index()->change();
            $table->integer('render_booking_id')->unsigned()->index()->change();

            $table->foreign('salon_id')
                ->references('id')->on('salons')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('stylist_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                
            $table->foreign('render_booking_id')
                ->references('id')->on('render_bookings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
        });
    }
}
