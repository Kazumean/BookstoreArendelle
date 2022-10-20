<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->integer('user_id');
            $table->integer('status');
            $table->integer('total_price');
            $table->date('order_date')->nullable();
            $table->string('destination_name')->nullable();
            $table->string('destination_email')->nullable();
            $table->string('destination_zipcode')->nullable();
            $table->string('destination_address')->nullable();
            $table->string('destination_tel')->nullable();
            $table->dateTime('delivery_time')->nullable();
            $table->integer('payment_method')->nullable();
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
};
