<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateCouponsAPIRequest extends FormRequest
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
            'seller_id' => ['nullable', 'integer'],
            'coupon_code' => ['nullable', 'string'],
            'discount_rate' => ['nullable', 'integer'],
            'coupon_count' => ['nullable', 'integer'],
            'minimum_order_amount' => ['nullable', 'integer'],
            'currency' => ['nullable', 'string'],
            'usage_type' => ['nullable', 'string'],
            'category_ids' => ['nullable'],
            'expiry_date' => ['nullable'],
            'is_active' => ['boolean'],
        ];
    }
}
