<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('telp')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('logo_sekolah')->nullable();
            $table->string('nama_hotel')->nullable();
            $table->string('logo_hotel')->nullable();
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
        Schema::dropIfExists('sekolah');
    }
}
