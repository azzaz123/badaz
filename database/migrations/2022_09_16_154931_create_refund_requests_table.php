<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefundRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refund_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('buyer_id')->nullable();
            $table->integer('seller_id')->nullable();
            $table->integer('order_id')->nullable();
            $table->bigInteger('order_number')->nullable();
            $table->integer('order_product_id')->nullable();
            $table->integer('status')->nullable();
            $table->integer('is_completed')->nullable();
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
        Schema::dropIfExists('refund_requests');
    }
}
