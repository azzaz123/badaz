<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateDigitalSalesAPIRequest extends FormRequest
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
            'data.*.order_id' => ['nullable', 'integer'],
            'data.*.product_id' => ['nullable', 'integer'],
            'data.*.product_title' => ['nullable', 'string'],
            'data.*.seller_id' => ['nullable', 'integer'],
            'data.*.buyer_id' => ['nullable', 'integer'],
            'data.*.license_key' => ['nullable', 'string'],
            'data.*.purchase_code' => ['nullable', 'string'],
            'data.*.currency' => ['nullable', 'string'],
            'data.*.price' => ['nullable', 'integer'],
            'data.*.purchase_date' => ['nullable'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
