<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_states', function(Blueprint $table){
            $table->increments('id');
            $table->string('name', 255);
            $table->string('uf', 10);
            $table->unsignedInteger('location_country_id');
            $table->foreign('location_country_id')->references('id')->on('location_countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('location_states');
    }
}
