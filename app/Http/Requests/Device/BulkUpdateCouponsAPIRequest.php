<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateCouponsAPIRequest extends FormRequest
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
            'data.*.seller_id' => ['nullable', 'integer'],
            'data.*.coupon_code' => ['nullable', 'string'],
            'data.*.discount_rate' => ['nullable', 'integer'],
            'data.*.coupon_count' => ['nullable', 'integer'],
            'data.*.minimum_order_amount' => ['nullable', 'integer'],
            'data.*.currency' => ['nullable', 'string'],
            'data.*.usage_type' => ['nullable', 'string'],
            'data.*.category_ids' => ['nullable'],
            'data.*.expiry_date' => ['nullable'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
