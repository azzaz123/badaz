<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateCouponProductsAPIRequest extends FormRequest
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
            'data.*.coupon_id' => ['nullable', 'integer'],
            'data.*.product_id' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
