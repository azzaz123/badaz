<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotedTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promoted_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('payment_method')->nullable();
            $table->string('payment_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('currency')->nullable();
            $table->string('payment_amount')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('purchased_plan')->nullable();
            $table->integer('day_count')->nullable();
            $table->string('ip_address')->nullable();
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
        Schema::dropIfExists('promoted_transactions');
    }
}
