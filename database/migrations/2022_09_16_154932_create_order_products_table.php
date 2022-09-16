<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->nullable();
            $table->integer('seller_id')->nullable();
            $table->integer('buyer_id')->nullable();
            $table->string('buyer_type')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('product_type')->nullable();
            $table->string('listing_type')->nullable();
            $table->string('product_title')->nullable();
            $table->string('product_slug')->nullable();
            $table->bigInteger('product_unit_price')->nullable();
            $table->integer('product_quantity')->nullable();
            $table->string('product_currency')->nullable();
            $table->double('product_vat_rate')->nullable();
            $table->bigInteger('product_vat')->nullable();
            $table->bigInteger('product_total_price')->nullable();
            $table->string('variation_option_ids')->nullable();
            $table->integer('commission_rate')->nullable();
            $table->string('order_status')->nullable();
            $table->integer('is_approved')->nullable();
            $table->string('shipping_tracking_number')->nullable();
            $table->string('shipping_tracking_url')->nullable();
            $table->string('shipping_method')->nullable();
            $table->bigInteger('seller_shipping_cost')->nullable();
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
        Schema::dropIfExists('order_products');
    }
}
