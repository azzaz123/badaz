<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateMembershipTransactionsAPIRequest extends FormRequest
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
            'data.*.plan_id' => ['nullable', 'integer'],
            'data.*.plan_title' => ['nullable', 'string'],
            'data.*.payment_method' => ['nullable', 'string'],
            'data.*.payment_id' => ['nullable', 'string'],
            'data.*.payment_amount' => ['nullable', 'string'],
            'data.*.currency' => ['nullable', 'string'],
            'data.*.payment_status' => ['nullable', 'string'],
            'data.*.ip_address' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
