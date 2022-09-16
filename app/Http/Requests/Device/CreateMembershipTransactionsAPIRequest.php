<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateMembershipTransactionsAPIRequest extends FormRequest
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
            'user_id' => ['nullable', 'integer'],
            'plan_id' => ['nullable', 'integer'],
            'plan_title' => ['nullable', 'string'],
            'payment_method' => ['nullable', 'string'],
            'payment_id' => ['nullable', 'string'],
            'payment_amount' => ['nullable', 'string'],
            'currency' => ['nullable', 'string'],
            'payment_status' => ['nullable', 'string'],
            'ip_address' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
