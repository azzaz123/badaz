<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earnings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_number')->nullable();
            $table->integer('order_product_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->bigInteger('price')->nullable();
            $table->integer('commission_rate')->nullable();
            $table->bigInteger('shipping_cost')->nullable();
            $table->bigInteger('earned_amount')->nullable();
            $table->string('currency')->nullable();
            $table->double('exchange_rate')->nullable();
            $table->integer('is_refunded')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('updated_at')->nullable();
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
        Schema::dropIfExists('earnings');
    }
}
