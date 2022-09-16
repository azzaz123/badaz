<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreatePayoutsAPIRequest extends FormRequest
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
            'payout_method' => ['nullable', 'string'],
            'amount' => ['nullable', 'integer'],
            'currency' => ['nullable', 'string'],
            'status' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
