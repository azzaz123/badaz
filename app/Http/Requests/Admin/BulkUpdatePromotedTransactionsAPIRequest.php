<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdatePromotedTransactionsAPIRequest extends FormRequest
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
            'data.*.user_id' => ['nullable', 'integer'],
            'data.*.product_id' => ['nullable', 'integer'],
            'data.*.currency' => ['nullable', 'string'],
            'data.*.payment_amount' => ['nullable', 'string'],
            'data.*.payment_status' => ['nullable', 'string'],
            'data.*.purchased_plan' => ['nullable', 'string'],
            'data.*.day_count' => ['nullable', 'integer'],
            'data.*.ip_address' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
