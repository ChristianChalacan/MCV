<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationsToRefunds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('refunds', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->unsignedInteger('provider_id');
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('restrict');
            $table->unsignedInteger('entry_id');
            $table->foreign('entry_id')->references('id')->on('entries')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('refunds', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['provider_id']);
            $table->dropForeign(['entry_id']);
        });
    }
}
