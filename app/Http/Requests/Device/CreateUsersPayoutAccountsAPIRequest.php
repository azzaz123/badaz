<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateUsersPayoutAccountsAPIRequest extends FormRequest
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
            'user_id' => ['nullable', 'integer'],
            'payout_paypal_email' => ['nullable', 'string'],
            'payout_bitcoin_address' => ['nullable', 'string'],
            'iban_full_name' => ['nullable', 'string'],
            'iban_country_id' => ['nullable', 'string'],
            'iban_bank_name' => ['nullable', 'string'],
            'iban_number' => ['nullable', 'string'],
            'swift_full_name' => ['nullable', 'string'],
            'swift_address' => ['nullable', 'string'],
            'swift_state' => ['nullable', 'string'],
            'swift_city' => ['nullable', 'string'],
            'swift_postcode' => ['nullable', 'string'],
            'swift_country_id' => ['nullable', 'string'],
            'swift_bank_account_holder_name' => ['nullable', 'string'],
            'swift_iban' => ['nullable', 'string'],
            'swift_code' => ['nullable', 'string'],
            'swift_bank_name' => ['nullable', 'string'],
            'swift_bank_branch_city' => ['nullable', 'string'],
            'swift_bank_branch_country_id' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
