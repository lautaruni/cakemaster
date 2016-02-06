<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCakeToIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cake_to_ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cake_id')->unsigned();
            $table->integer('ingredient_id')->unsigned();
            //$table->foreign('cake_id')->references('id')->on('cakes');
            //$table->foreign('ingredient_id')->references('id')->on('ingredients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cake_to_ingredients');
    }
}
