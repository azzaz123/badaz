<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderShippingAPIRequest extends FormRequest
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
            'order_id' => ['nullable', 'integer'],
            'shipping_first_name' => ['nullable', 'string'],
            'shipping_last_name' => ['nullable', 'string'],
            'shipping_email' => ['nullable', 'string'],
            'shipping_phone_number' => ['nullable', 'string'],
            'shipping_address' => ['nullable', 'string'],
            'shipping_country' => ['nullable', 'string'],
            'shipping_state' => ['nullable', 'string'],
            'shipping_city' => ['nullable', 'string'],
            'shipping_zip_code' => ['nullable', 'string'],
            'billing_first_name' => ['nullable', 'string'],
            'billing_last_name' => ['nullable', 'string'],
            'billing_email' => ['nullable', 'string'],
            'billing_phone_number' => ['nullable', 'string'],
            'billing_address' => ['nullable', 'string'],
            'billing_country' => ['nullable', 'string'],
            'billing_state' => ['nullable', 'string'],
            'billing_city' => ['nullable', 'string'],
            'billing_zip_code' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
