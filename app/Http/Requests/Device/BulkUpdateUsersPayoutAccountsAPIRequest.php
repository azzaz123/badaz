<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateUsersPayoutAccountsAPIRequest extends FormRequest
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
            'data.*.user_id' => ['nullable', 'integer'],
            'data.*.payout_paypal_email' => ['nullable', 'string'],
            'data.*.payout_bitcoin_address' => ['nullable', 'string'],
            'data.*.iban_full_name' => ['nullable', 'string'],
            'data.*.iban_country_id' => ['nullable', 'string'],
            'data.*.iban_bank_name' => ['nullable', 'string'],
            'data.*.iban_number' => ['nullable', 'string'],
            'data.*.swift_full_name' => ['nullable', 'string'],
            'data.*.swift_address' => ['nullable', 'string'],
            'data.*.swift_state' => ['nullable', 'string'],
            'data.*.swift_city' => ['nullable', 'string'],
            'data.*.swift_postcode' => ['nullable', 'string'],
            'data.*.swift_country_id' => ['nullable', 'string'],
            'data.*.swift_bank_account_holder_name' => ['nullable', 'string'],
            'data.*.swift_iban' => ['nullable', 'string'],
            'data.*.swift_code' => ['nullable', 'string'],
            'data.*.swift_bank_name' => ['nullable', 'string'],
            'data.*.swift_bank_branch_city' => ['nullable', 'string'],
            'data.*.swift_bank_branch_country_id' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
