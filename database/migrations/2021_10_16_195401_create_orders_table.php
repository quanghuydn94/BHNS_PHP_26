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
            $table->string('order_customer_name')->nullable();
            $table->string('order_customer_phone')->nullable();
            $table->string('order_customer_email')->nullable();
            $table->string('order_customer_address')->nullable();
            $table->string('order_note')->nullable();
            $table->unsignedBigInteger('order_status_id');
            $table->foreign('order_status_id')->references('id')->on('orderstatus')->onDelete('cascade');
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->boolean('active');
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