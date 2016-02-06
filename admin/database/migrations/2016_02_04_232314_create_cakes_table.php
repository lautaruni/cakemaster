<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cakes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->smallInteger('height')->default(3);
            $table->smallInteger('width')->default(3);
            $table->smallInteger('ingredient_qty')->default(9);
            $table->smallInteger('points')->default(0);
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
        Schema::drop('cakes');
    }
}
