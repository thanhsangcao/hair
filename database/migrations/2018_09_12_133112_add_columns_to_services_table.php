<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('description')->nullable()->after('price');
            $table->string('img')->nullable()->after('description');
            $table->integer('show')->nullable()->after('img');
            $table->integer('delete')->nullable()->after('show');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('img');
            $table->dropColumn('description');
            $table->dropColumn('show');
            $table->dropColumn('delete');
        });
    }
}
