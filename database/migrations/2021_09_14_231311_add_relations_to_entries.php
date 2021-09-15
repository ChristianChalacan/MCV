<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationsToEntries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entries', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->unsignedInteger('kind_id');
            $table->foreign('kind_id')->references('id')->on('kinds')->onDelete('restrict');
            $table->unsignedInteger('charge_id');
            $table->foreign('charge_id')->references('id')->on('charges')->onDelete('restrict');
            $table->unsignedInteger('provider_id');
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entries', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['provider_id']);
            $table->dropForeign(['charge_id']);
            $table->dropForeign(['kind_id']);
        });
    }
}
