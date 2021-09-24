<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->bigInteger('extra_bed')->length(20)->nullable();
            $table->bigInteger('laundry')->length(20)->nullable();
            $table->bigInteger('fnb')->length(20)->nullable();
            $table->bigInteger('etc')->length(20)->nullable();
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
        Schema::dropIfExists('other_expenses');
    }
}
