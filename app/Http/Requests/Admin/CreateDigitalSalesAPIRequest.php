<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateDigitalSalesAPIRequest extends FormRequest
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
            'order_id' => ['nullable', 'integer'],
            'product_id' => ['nullable', 'integer'],
            'product_title' => ['nullable', 'string'],
            'seller_id' => ['nullable', 'integer'],
            'buyer_id' => ['nullable', 'integer'],
            'license_key' => ['nullable', 'string'],
            'purchase_code' => ['nullable', 'string'],
            'currency' => ['nullable', 'string'],
            'price' => ['nullable', 'integer'],
            'purchase_date' => ['nullable'],
            'is_active' => ['boolean'],
        ];
    }
}
