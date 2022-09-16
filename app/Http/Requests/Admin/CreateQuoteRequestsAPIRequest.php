<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuoteRequestsAPIRequest extends FormRequest
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
            'product_id' => ['nullable', 'integer'],
            'product_title' => ['nullable', 'string'],
            'product_quantity' => ['nullable', 'integer'],
            'seller_id' => ['nullable', 'integer'],
            'buyer_id' => ['nullable', 'integer'],
            'status' => ['nullable', 'string'],
            'price_offered' => ['nullable', 'integer'],
            'price_currency' => ['nullable', 'string'],
            'is_buyer_deleted' => ['nullable', 'integer'],
            'is_seller_deleted' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
