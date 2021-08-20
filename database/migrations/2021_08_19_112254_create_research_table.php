<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research', function (Blueprint $table) {
            $table->increments('id');
            $table->char('feature',10);
            $table->double('quantity');
            $table->integer('valueone');
            $table->integer('valuetwo');
            $table->integer('valuethree');
            $table->integer('valuefour');
            $table->integer('valuefive');
            $table->boolean('confirmed');
            $table->char('organoleptic', 30);
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
        Schema::dropIfExists('research');
    }
}
