<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuoteRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable();
            $table->string('product_title')->nullable();
            $table->integer('product_quantity')->nullable();
            $table->integer('seller_id')->nullable();
            $table->integer('buyer_id')->nullable();
            $table->string('status')->nullable();
            $table->bigInteger('price_offered')->nullable();
            $table->string('price_currency')->nullable();
            $table->integer('is_buyer_deleted')->nullable();
            $table->integer('is_seller_deleted')->nullable();
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
        Schema::dropIfExists('quote_requests');
    }
}
