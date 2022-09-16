<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePromotedTransactionsAPIRequest extends FormRequest
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
            'payment_method' => ['nullable', 'string'],
            'payment_id' => ['nullable', 'string'],
            'user_id' => ['nullable', 'integer'],
            'product_id' => ['nullable', 'integer'],
            'currency' => ['nullable', 'string'],
            'payment_amount' => ['nullable', 'string'],
            'payment_status' => ['nullable', 'string'],
            'purchased_plan' => ['nullable', 'string'],
            'day_count' => ['nullable', 'integer'],
            'ip_address' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
