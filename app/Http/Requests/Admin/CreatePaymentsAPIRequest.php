<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreatePaymentsAPIRequest extends FormRequest
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
            'payer_email' => ['nullable', 'string'],
            'payment_status' => ['nullable', 'string'],
            'purchased_plan' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
