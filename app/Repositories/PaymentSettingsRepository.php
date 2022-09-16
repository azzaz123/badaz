<?php

namespace App\Repositories;

use App\Models\PaymentSettings;

class PaymentSettingsRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
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
     * @return string[]
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
     * @return string
     */
    public function model(): string
    {
        return PaymentSettings::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
