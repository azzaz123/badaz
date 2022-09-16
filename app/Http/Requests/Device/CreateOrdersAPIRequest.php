<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrdersAPIRequest extends FormRequest
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
            'order_number' => ['nullable', 'integer'],
            'buyer_id' => ['nullable', 'integer'],
            'buyer_type' => ['nullable', 'string'],
            'price_subtotal' => ['nullable', 'string'],
            'price_vat' => ['nullable', 'integer'],
            'price_shipping' => ['nullable', 'string'],
            'price_total' => ['nullable', 'string'],
            'price_currency' => ['nullable', 'string'],
            'coupon_code' => ['nullable', 'string'],
            'coupon_discount' => ['nullable', 'integer'],
            'coupon_discount_rate' => ['nullable', 'integer'],
            'coupon_seller_id' => ['nullable', 'integer'],
            'status' => ['nullable', 'integer'],
            'payment_method' => ['nullable', 'string'],
            'payment_status' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
