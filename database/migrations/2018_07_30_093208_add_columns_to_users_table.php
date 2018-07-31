<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'phone_number')) {

                $table->string('phone_number')->after('password');
                $table->string('address')->after('phone_number');
                $table->tinyInteger('permission')->after('address');
                $table->integer('salon_id')->unsigned()->index()->after('permission');
            }

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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone_number');
            $table->dropColumn('address');
            $table->dropColumn('permission');
            $table->dropColumn('salon_id');
        });
    }
}
