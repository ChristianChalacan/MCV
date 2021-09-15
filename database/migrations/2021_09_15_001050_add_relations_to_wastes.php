<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationsToWastes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wastes', function (Blueprint $table) {
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
        Schema::table('wastes', function (Blueprint $table) {
            $table->dropForeign(['entry_id']);
        });
    }
}
