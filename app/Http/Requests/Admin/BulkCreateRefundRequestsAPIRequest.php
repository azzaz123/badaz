<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateRefundRequestsAPIRequest extends FormRequest
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
            'data.*.buyer_id' => ['nullable', 'integer'],
            'data.*.seller_id' => ['nullable', 'integer'],
            'data.*.order_id' => ['nullable', 'integer'],
            'data.*.order_number' => ['nullable', 'integer'],
            'data.*.order_product_id' => ['nullable', 'integer'],
            'data.*.status' => ['nullable', 'integer'],
            'data.*.is_completed' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
