<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateEarningsAPIRequest extends FormRequest
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
            'order_product_id' => ['nullable', 'integer'],
            'user_id' => ['nullable', 'integer'],
            'price' => ['nullable', 'integer'],
            'commission_rate' => ['nullable', 'integer'],
            'shipping_cost' => ['nullable', 'integer'],
            'earned_amount' => ['nullable', 'integer'],
            'currency' => ['nullable', 'string'],
            'exchange_rate' => ['nullable', 'integer'],
            'is_refunded' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
