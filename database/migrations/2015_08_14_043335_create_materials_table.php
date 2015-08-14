<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function(Blueprint $table){
            $table->increments('id');
            $table->string('link_url', 255);
            $table->string('description', 255);
            $table->datetime('datetime');
            $table->unsignedInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->unsignedInteger('college_id');
            $table->foreign('college_id')->references('id')->on('colleges');
            $table->unsignedInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->unsignedInteger('location_city_id');
            $table->foreign('location_city_id')->references('id')->on('location_cities');
            $table->unsignedInteger('location_state_id');
            $table->foreign('location_state_id')->references('id')->on('location_states');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('materials');
    }
}
