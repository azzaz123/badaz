<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->integer('seller_id')->nullable();
            $table->string('coupon_code')->nullable();
            $table->integer('discount_rate')->nullable();
            $table->integer('coupon_count')->nullable();
            $table->bigInteger('minimum_order_amount')->nullable();
            $table->string('currency')->nullable();
            $table->string('usage_type')->nullable();
            $table->text('category_ids')->nullable();
            $table->dateTime('expiry_date')->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
