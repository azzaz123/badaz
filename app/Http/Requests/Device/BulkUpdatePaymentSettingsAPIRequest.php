<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdatePaymentSettingsAPIRequest extends FormRequest
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
            'data.*.default_currency' => ['nullable', 'string'],
            'data.*.allow_all_currencies_for_classied' => ['nullable', 'integer'],
            'data.*.currency_converter' => ['nullable', 'integer'],
            'data.*.auto_update_exchange_rates' => ['nullable', 'integer'],
            'data.*.currency_converter_api' => ['nullable', 'string'],
            'data.*.currency_converter_api_key' => ['nullable', 'string'],
            'data.*.bank_transfer_enabled' => ['nullable', 'integer'],
            'data.*.bank_transfer_accounts' => ['nullable'],
            'data.*.cash_on_delivery_enabled' => ['nullable', 'integer'],
            'data.*.price_per_day' => ['nullable', 'integer'],
            'data.*.price_per_month' => ['nullable', 'integer'],
            'data.*.free_product_promotion' => ['nullable', 'integer'],
            'data.*.payout_paypal_enabled' => ['nullable', 'integer'],
            'data.*.payout_bitcoin_enabled' => ['nullable', 'integer'],
            'data.*.payout_iban_enabled' => ['nullable', 'integer'],
            'data.*.payout_swift_enabled' => ['nullable', 'integer'],
            'data.*.min_payout_paypal' => ['nullable', 'integer'],
            'data.*.min_payout_bitcoin' => ['nullable', 'integer'],
            'data.*.min_payout_iban' => ['nullable', 'integer'],
            'data.*.min_payout_swift' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
