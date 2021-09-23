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
            $table->integer('jabas')->nullable();
            $table->double('unit')->nullable();
            $table->double('packing')->nullable();
            $table->double('net');
            $table->string('product');
            $table->string('lot', 30);
            $table->double('final');
            $table->string('guia', 30)->nullable();
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
