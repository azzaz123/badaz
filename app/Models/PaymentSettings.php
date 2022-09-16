<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class PaymentSettings extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'payment_settings';

    /**
     * @var string[]
     */
    protected $fillable = [
        'default_currency',
        'allow_all_currencies_for_classied',
        'currency_converter',
        'auto_update_exchange_rates',
        'currency_converter_api',
        'currency_converter_api_key',
        'bank_transfer_enabled',
        'bank_transfer_accounts',
        'cash_on_delivery_enabled',
        'price_per_day',
        'price_per_month',
        'free_product_promotion',
        'payout_paypal_enabled',
        'payout_bitcoin_enabled',
        'payout_iban_enabled',
        'payout_swift_enabled',
        'min_payout_paypal',
        'min_payout_bitcoin',
        'min_payout_iban',
        'min_payout_swift',
        'is_active',
        'created_at',
        'updated_at',
        'added_by',
        'updated_by',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'default_currency' => 'string',
        'allow_all_currencies_for_classied' => 'integer',
        'currency_converter' => 'integer',
        'auto_update_exchange_rates' => 'integer',
        'currency_converter_api' => 'string',
        'currency_converter_api_key' => 'string',
        'bank_transfer_enabled' => 'integer',
        'bank_transfer_accounts' => 'string',
        'cash_on_delivery_enabled' => 'integer',
        'price_per_day' => 'integer',
        'price_per_month' => 'integer',
        'free_product_promotion' => 'integer',
        'payout_paypal_enabled' => 'integer',
        'payout_bitcoin_enabled' => 'integer',
        'payout_iban_enabled' => 'integer',
        'payout_swift_enabled' => 'integer',
        'min_payout_paypal' => 'integer',
        'min_payout_bitcoin' => 'integer',
        'min_payout_iban' => 'integer',
        'min_payout_swift' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
