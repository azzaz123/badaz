<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateQuoteRequestsAPIRequest extends FormRequest
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
            'data.*.product_id' => ['nullable', 'integer'],
            'data.*.product_title' => ['nullable', 'string'],
            'data.*.product_quantity' => ['nullable', 'integer'],
            'data.*.seller_id' => ['nullable', 'integer'],
            'data.*.buyer_id' => ['nullable', 'integer'],
            'data.*.status' => ['nullable', 'string'],
            'data.*.price_offered' => ['nullable', 'integer'],
            'data.*.price_currency' => ['nullable', 'string'],
            'data.*.is_buyer_deleted' => ['nullable', 'integer'],
            'data.*.is_seller_deleted' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
