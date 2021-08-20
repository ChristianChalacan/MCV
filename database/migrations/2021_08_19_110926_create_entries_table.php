<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('turn');
            $table->time('hour');
            $table->char('batch',20);
            $table->boolean('vehicle');
            $table->boolean('hygiene');
            $table->double('weight');
            $table->double('rejection');
            $table->double('extra');
            $table->text('observation');
            $table->double('availableweight');
            $table->double('availablejabas');
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
        Schema::dropIfExists('entries');
    }
}
