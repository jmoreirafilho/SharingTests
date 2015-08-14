<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_cities', function(Blueprint $table){
            $table->increments('id');
            $table->string('name', 255);
            $table->unsignedInteger('location_state_id');
            $table->foreign('location_state_id')->references('id')->on('location_states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('location_cities');
    }
}
