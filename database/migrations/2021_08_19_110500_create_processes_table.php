<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('process');
            $table->time('hour');
            $table->integer('turn');
            $table->double('initial');
            $table->integer('jabas');
            $table->double('unit');
            $table->double('packing');
            $table->double('net');
            $table->char('product', 30);
            $table->char('lot', 30);
            $table->double('final');
            $table->char('guia', 30);
            $table->text('observation');
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
        Schema::dropIfExists('processes');
    }
}
