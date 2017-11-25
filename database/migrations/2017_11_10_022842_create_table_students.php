<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStudents extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('class_id')->unsigned();
            $table->string('name');
            $table->string('address');
            $table->integer('age');
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->timestamps();
        });

        Schema::table('students', function(Blueprint $table) {
            $table->foreign('class_id')->references('id')->on('class')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}
