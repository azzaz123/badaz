<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_settings', function (Blueprint $table) {
            $table->id();
            $table->string('default_currency')->nullable();
            $table->integer('allow_all_currencies_for_classied')->nullable();
            $table->integer('currency_converter')->nullable();
            $table->integer('auto_update_exchange_rates')->nullable();
            $table->string('currency_converter_api')->nullable();
            $table->string('currency_converter_api_key')->nullable();
            $table->integer('bank_transfer_enabled')->nullable();
            $table->text('bank_transfer_accounts')->nullable();
            $table->integer('cash_on_delivery_enabled')->nullable();
            $table->bigInteger('price_per_day')->nullable();
            $table->bigInteger('price_per_month')->nullable();
            $table->integer('free_product_promotion')->nullable();
            $table->integer('payout_paypal_enabled')->nullable();
            $table->integer('payout_bitcoin_enabled')->nullable();
            $table->integer('payout_iban_enabled')->nullable();
            $table->integer('payout_swift_enabled')->nullable();
            $table->bigInteger('min_payout_paypal')->nullable();
            $table->bigInteger('min_payout_bitcoin')->nullable();
            $table->bigInteger('min_payout_iban')->nullable();
            $table->bigInteger('min_payout_swift')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('created_at')->nullable();
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
        Schema::dropIfExists('payment_settings');
    }
}
