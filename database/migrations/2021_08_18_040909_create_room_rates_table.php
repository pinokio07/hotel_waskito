<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_rates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_type_id');
            $table->integer('individual')->nullable();
            $table->integer('group')->nullable();
            $table->integer('government')->nullable();
            $table->integer('company')->nullable();
            $table->integer('travel')->nullable();
            $table->integer('airlines')->nullable();
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
        Schema::dropIfExists('room_rates');
    }
}
