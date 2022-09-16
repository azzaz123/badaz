<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateOrdersAPIRequest extends FormRequest
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
            'data.*.order_number' => ['nullable', 'integer'],
            'data.*.buyer_id' => ['nullable', 'integer'],
            'data.*.buyer_type' => ['nullable', 'string'],
            'data.*.price_subtotal' => ['nullable', 'string'],
            'data.*.price_vat' => ['nullable', 'integer'],
            'data.*.price_shipping' => ['nullable', 'string'],
            'data.*.price_total' => ['nullable', 'string'],
            'data.*.price_currency' => ['nullable', 'string'],
            'data.*.coupon_code' => ['nullable', 'string'],
            'data.*.coupon_discount' => ['nullable', 'integer'],
            'data.*.coupon_discount_rate' => ['nullable', 'integer'],
            'data.*.coupon_seller_id' => ['nullable', 'integer'],
            'data.*.status' => ['nullable', 'integer'],
            'data.*.payment_method' => ['nullable', 'string'],
            'data.*.payment_status' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
