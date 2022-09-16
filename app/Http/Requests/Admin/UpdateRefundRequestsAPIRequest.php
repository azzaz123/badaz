<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRefundRequestsAPIRequest extends FormRequest
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
            'buyer_id' => ['nullable', 'integer'],
            'seller_id' => ['nullable', 'integer'],
            'order_id' => ['nullable', 'integer'],
            'order_number' => ['nullable', 'integer'],
            'order_product_id' => ['nullable', 'integer'],
            'status' => ['nullable', 'integer'],
            'is_completed' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
