<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateEarningsAPIRequest extends FormRequest
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
            'data.*.order_product_id' => ['nullable', 'integer'],
            'data.*.user_id' => ['nullable', 'integer'],
            'data.*.price' => ['nullable', 'integer'],
            'data.*.commission_rate' => ['nullable', 'integer'],
            'data.*.shipping_cost' => ['nullable', 'integer'],
            'data.*.earned_amount' => ['nullable', 'integer'],
            'data.*.currency' => ['nullable', 'string'],
            'data.*.exchange_rate' => ['nullable', 'integer'],
            'data.*.is_refunded' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
