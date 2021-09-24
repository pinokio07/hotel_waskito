<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('room_type_id');
            $table->integer('no')->nullable();
            $table->string('bed')->nullable();
            $table->string('view')->nullable();
            $table->boolean('smoking')->default(false);
            $table->boolean('sidebyside')->default(false);
            $table->integer('floor')->nullable();
            $table->set('room_status', ['clean', 'dirty', 'out of order', 'inspected'])
                  ->default('clean');
            $table->set('fo_status', ['vacant', 'occupied'])->default('vacant');
            $table->set('res_status', ['arrivals', 'arrived', 'departed', 'not reserved'])
                  ->default('not reserved');
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
