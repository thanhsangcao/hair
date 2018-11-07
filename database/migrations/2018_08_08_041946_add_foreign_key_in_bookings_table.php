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
            $table->string('name')->nullable()->after('status');
            $table->string('phone_number')->nullable()->after('name');
            $table->string('time_booking')->change();
            $table->integer('grand_total')->nullable()->change();
            $table->integer('salon_id')->unsigned()->nullable()->index()->change();
            $table->integer('stylist_id')->unsigned()->index()->change();
            $table->integer('render_booking_id')->unsigned()->nullable()->index()->change();
            $table->integer('customer_id')->unsigned()->nullable()->index()->change();

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

            $table->foreign('customer_id')
                ->references('id')->on('users')
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
            $table->dropForeign('bookings_customer_id_foreign');
            $table->dropForeign('bookings_render_booking_id_foreign');
            $table->dropForeign('bookings_salon_id_foreign');
            $table->dropForeign('bookings_stylist_id_foreign');
            $table->integer('render_booking_id')->unsigned()->change();
            $table->integer('stylist_id')->unsigned()->change();
            $table->integer('salon_id')->unsigned()->change();
            $table->float('grand_total')->change();
            $table->date('time_booking')->change();
            $table->dropColumn('phone_number');
            $table->dropColumn('name');
            $table->dropColumn('customer_id');
        });
    }
}
