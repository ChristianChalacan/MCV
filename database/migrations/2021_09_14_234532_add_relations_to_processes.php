<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationsToProcesses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('processes', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->unsignedInteger('shipping_id');
            $table->foreign('shipping_id')->references('id')->on('shippings')->onDelete('restrict');
            $table->unsignedInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('restrict');
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('restrict');
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
        Schema::table('processes', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['shipping_id']);
            $table->dropForeign(['client_id']);
            $table->dropForeign(['order_id']);
            $table->dropForeign(['entry_id']);

        });
    }
}
