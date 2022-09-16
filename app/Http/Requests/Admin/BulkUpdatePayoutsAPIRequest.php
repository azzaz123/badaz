<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdatePayoutsAPIRequest extends FormRequest
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
            'data.*.user_id' => ['nullable', 'integer'],
            'data.*.payout_method' => ['nullable', 'string'],
            'data.*.amount' => ['nullable', 'integer'],
            'data.*.currency' => ['nullable', 'string'],
            'data.*.status' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
