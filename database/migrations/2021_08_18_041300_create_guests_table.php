<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->string('title')->nullable();
            $table->string('nama_depan');
            $table->string('nama_belakang')->nullable();
            $table->integer('id_no')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('email')->nullable();
            $table->string('telp')->nullable();      
            $table->string('kota')->nullable();
            $table->text('alamat')->nullable();      
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
        Schema::dropIfExists('guests');
    }
}
