<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('hotel_id')->unsigned();
            $table->integer('room_type_id')->unsigned();
            $table->string('image');
            $table->integer('status');
            $table->string('descipt');
            $table->integer('price');
            $table->integer('discount');
            $table->timestamps();
            $table->foreign('hotel_id')->reference('id')->on('hotels')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('room_type_id')->reference('id')->on('room_types')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
