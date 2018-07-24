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
            $table->integer('user_id');
            $table->foreign('hotel_id')->reference('id')->on('hotels')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('room_type_id')->reference('id')->on('room_types')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('image');
            $table->integer('status');
            $table->string('descipt');
            $table->integer('price');
            $table->integer('discount');
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
        Schema::dropIfExists('rooms');
    }
}
