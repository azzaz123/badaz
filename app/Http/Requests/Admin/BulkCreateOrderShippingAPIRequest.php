<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateOrderShippingAPIRequest extends FormRequest
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
            'data.*.order_id' => ['nullable', 'integer'],
            'data.*.shipping_first_name' => ['nullable', 'string'],
            'data.*.shipping_last_name' => ['nullable', 'string'],
            'data.*.shipping_email' => ['nullable', 'string'],
            'data.*.shipping_phone_number' => ['nullable', 'string'],
            'data.*.shipping_address' => ['nullable', 'string'],
            'data.*.shipping_country' => ['nullable', 'string'],
            'data.*.shipping_state' => ['nullable', 'string'],
            'data.*.shipping_city' => ['nullable', 'string'],
            'data.*.shipping_zip_code' => ['nullable', 'string'],
            'data.*.billing_first_name' => ['nullable', 'string'],
            'data.*.billing_last_name' => ['nullable', 'string'],
            'data.*.billing_email' => ['nullable', 'string'],
            'data.*.billing_phone_number' => ['nullable', 'string'],
            'data.*.billing_address' => ['nullable', 'string'],
            'data.*.billing_country' => ['nullable', 'string'],
            'data.*.billing_state' => ['nullable', 'string'],
            'data.*.billing_city' => ['nullable', 'string'],
            'data.*.billing_zip_code' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
