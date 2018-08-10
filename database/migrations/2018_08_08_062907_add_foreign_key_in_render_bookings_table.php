<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyInRenderBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('render_bookings', function (Blueprint $table) {
            $table->integer('salon_id')->unsigned()->index()->change();

            $table->foreign('salon_id')
                ->references('id')->on('salons')
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
        Schema::table('render_bookings', function (Blueprint $table) {
            //
        });
    }
}
