<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransactionsAPIRequest extends FormRequest
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
            'order_id' => ['nullable', 'integer'],
            'user_id' => ['nullable', 'integer'],
            'user_type' => ['nullable', 'string'],
            'currency' => ['nullable', 'string'],
            'payment_amount' => ['nullable', 'string'],
            'payment_status' => ['nullable', 'string'],
            'ip_address' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
