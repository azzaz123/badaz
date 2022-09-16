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
            $table->bigInteger('order_number')->nullable();
            $table->integer('buyer_id')->nullable();
            $table->string('buyer_type')->nullable();
            $table->string('price_subtotal')->nullable();
            $table->bigInteger('price_vat')->nullable();
            $table->string('price_shipping')->nullable();
            $table->string('price_total')->nullable();
            $table->string('price_currency')->nullable();
            $table->string('coupon_code')->nullable();
            $table->bigInteger('coupon_discount')->nullable();
            $table->integer('coupon_discount_rate')->nullable();
            $table->integer('coupon_seller_id')->nullable();
            $table->integer('status')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('added_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
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
