<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateCouponProductsAPIRequest extends FormRequest
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
            'coupon_id' => ['nullable', 'integer'],
            'product_id' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
