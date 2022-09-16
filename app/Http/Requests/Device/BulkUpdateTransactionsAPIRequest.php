<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateTransactionsAPIRequest extends FormRequest
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
            'data.*.payment_method' => ['nullable', 'string'],
            'data.*.payment_id' => ['nullable', 'string'],
            'data.*.order_id' => ['nullable', 'integer'],
            'data.*.user_id' => ['nullable', 'integer'],
            'data.*.user_type' => ['nullable', 'string'],
            'data.*.currency' => ['nullable', 'string'],
            'data.*.payment_amount' => ['nullable', 'string'],
            'data.*.payment_status' => ['nullable', 'string'],
            'data.*.ip_address' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
