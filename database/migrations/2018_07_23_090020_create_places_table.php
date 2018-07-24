<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('city_id')->references('id')->on('cities')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('name');
            $table->string('image');
            $table->string('descript')->nullable();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('places');
    }
}
