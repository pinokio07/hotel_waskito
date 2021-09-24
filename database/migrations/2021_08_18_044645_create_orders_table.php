<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('guest_id');
            $table->set('vip', [1, 2, 3, 4])->default(1);
            $table->set('market_code', ['individual', 'group', 'government', 'corporate', 'travel-agent', 'airlines', 'other'])->default('individual');
            $table->string('market_detail')->nullable();
            $table->string('by_name')->nullable();
            $table->string('by_phone')->nullable();
            $table->string('by_address')->nullable();
            $table->string('by_email')->nullable();
            $table->date('arrivals')->nullable();
            $table->date('departure')->nullable();
            $table->integer('nights')->default(1);
            $table->set('status',['arrivals', 'arrived', 'check-out', 'canceled'])
                  ->default('arrivals');
            $table->bigInteger('price')->length(20)->default(0);
            $table->integer('adult')->default(1);
            $table->integer('child')->default(0);
            $table->string('res_type')->nullable();
            $table->string('payment_type')->default('cash');
            $table->string('card_no')->nullable();
            $table->date('exp_date')->nullable();
            $table->string('company')->nullable();
            $table->string('letter_no')->nullable();
            $table->string('voucher_no')->nullable();
            $table->string('payment_detail')->nullable();
            $table->bigInteger('deposit')->length(20)->default(0);
            $table->string('cancel_reason')->nullable();
            $table->bigInteger('revenue')->length(20)->default(0);
            $table->string('additional_request')->nullable();
            $table->boolean('conf_letter')->default(false);
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
        Schema::dropIfExists('orders');
    }
}
