<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersPayoutAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_payout_accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('payout_paypal_email')->nullable();
            $table->string('payout_bitcoin_address')->nullable();
            $table->string('iban_full_name')->nullable();
            $table->string('iban_country_id')->nullable();
            $table->string('iban_bank_name')->nullable();
            $table->string('iban_number')->nullable();
            $table->string('swift_full_name')->nullable();
            $table->string('swift_address')->nullable();
            $table->string('swift_state')->nullable();
            $table->string('swift_city')->nullable();
            $table->string('swift_postcode')->nullable();
            $table->string('swift_country_id')->nullable();
            $table->string('swift_bank_account_holder_name')->nullable();
            $table->string('swift_iban')->nullable();
            $table->string('swift_code')->nullable();
            $table->string('swift_bank_name')->nullable();
            $table->string('swift_bank_branch_city')->nullable();
            $table->string('swift_bank_branch_country_id')->nullable();
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
        Schema::dropIfExists('users_payout_accounts');
    }
}
