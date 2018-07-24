<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routines', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('course_id')->unsigned()->nullable();
            $table->foreign('course_id')->references('id')->on('courses')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('day')->nullable();
            $table->string('room')->nullable();
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
        Schema::dropIfExists('routines');
    }
}
