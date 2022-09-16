<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreatePaymentSettingsAPIRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'default_currency' => ['nullable', 'string'],
            'allow_all_currencies_for_classied' => ['nullable', 'integer'],
            'currency_converter' => ['nullable', 'integer'],
            'auto_update_exchange_rates' => ['nullable', 'integer'],
            'currency_converter_api' => ['nullable', 'string'],
            'currency_converter_api_key' => ['nullable', 'string'],
            'bank_transfer_enabled' => ['nullable', 'integer'],
            'bank_transfer_accounts' => ['nullable'],
            'cash_on_delivery_enabled' => ['nullable', 'integer'],
            'price_per_day' => ['nullable', 'integer'],
            'price_per_month' => ['nullable', 'integer'],
            'free_product_promotion' => ['nullable', 'integer'],
            'payout_paypal_enabled' => ['nullable', 'integer'],
            'payout_bitcoin_enabled' => ['nullable', 'integer'],
            'payout_iban_enabled' => ['nullable', 'integer'],
            'payout_swift_enabled' => ['nullable', 'integer'],
            'min_payout_paypal' => ['nullable', 'integer'],
            'min_payout_bitcoin' => ['nullable', 'integer'],
            'min_payout_iban' => ['nullable', 'integer'],
            'min_payout_swift' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
