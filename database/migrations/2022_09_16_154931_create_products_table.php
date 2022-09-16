<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('product_type')->nullable();
            $table->string('listing_type')->nullable();
            $table->string('sku')->nullable();
            $table->integer('category_id')->nullable();
            $table->bigInteger('price')->nullable();
            $table->string('currency')->nullable();
            $table->integer('discount_rate')->nullable();
            $table->double('vat_rate')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('status')->nullable();
            $table->integer('is_promoted')->nullable();
            $table->dateTime('promote_start_date')->nullable();
            $table->dateTime('promote_end_date')->nullable();
            $table->string('promote_plan')->nullable();
            $table->integer('promote_day')->nullable();
            $table->integer('is_special_offer')->nullable();
            $table->dateTime('special_offer_date')->nullable();
            $table->integer('visibility')->nullable();
            $table->string('rating')->nullable();
            $table->integer('pageviews')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('external_link')->nullable();
            $table->string('files_included')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('shipping_class_id')->nullable();
            $table->integer('shipping_delivery_time_id')->nullable();
            $table->integer('multiple_sale')->nullable();
            $table->integer('is_sold')->nullable();
            $table->integer('is_deleted')->nullable();
            $table->integer('is_draft')->nullable();
            $table->integer('is_free_product')->nullable();
            $table->integer('is_rejected')->nullable();
            $table->string('reject_reason')->nullable();
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
        Schema::dropIfExists('products');
    }
}
