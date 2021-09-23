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
            $table->char('feature',10)->nullable();
            $table->double('quantity')->nullable();
            $table->integer('valueone')->nullable();
            $table->integer('valuetwo')->nullable();
            $table->integer('valuethree')->nullable();
            $table->integer('valuefour')->nullable();
            $table->integer('valuefive')->nullable();
            $table->boolean('confirmed')->nullable();
            $table->char('organoleptic', 30)->nullable();
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
