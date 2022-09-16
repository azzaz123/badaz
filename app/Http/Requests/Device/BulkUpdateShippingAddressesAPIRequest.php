<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateShippingAddressesAPIRequest extends FormRequest
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
            'data.*.title' => ['nullable', 'string'],
            'data.*.first_name' => ['nullable', 'string'],
            'data.*.last_name' => ['nullable', 'string'],
            'data.*.email' => ['nullable', 'string'],
            'data.*.phone_number' => ['nullable', 'string'],
            'data.*.address' => ['nullable', 'string'],
            'data.*.country_id' => ['nullable', 'string'],
            'data.*.state_id' => ['nullable', 'integer'],
            'data.*.city' => ['nullable', 'string'],
            'data.*.zip_code' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
