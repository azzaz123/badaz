<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateOrderProductsAPIRequest extends FormRequest
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
            'data.*.seller_id' => ['nullable', 'integer'],
            'data.*.buyer_id' => ['nullable', 'integer'],
            'data.*.buyer_type' => ['nullable', 'string'],
            'data.*.product_id' => ['nullable', 'integer'],
            'data.*.product_type' => ['nullable', 'string'],
            'data.*.listing_type' => ['nullable', 'string'],
            'data.*.product_title' => ['nullable', 'string'],
            'data.*.product_slug' => ['nullable', 'string'],
            'data.*.product_unit_price' => ['nullable', 'integer'],
            'data.*.product_quantity' => ['nullable', 'integer'],
            'data.*.product_currency' => ['nullable', 'string'],
            'data.*.product_vat_rate' => ['nullable', 'integer'],
            'data.*.product_vat' => ['nullable', 'integer'],
            'data.*.product_total_price' => ['nullable', 'integer'],
            'data.*.variation_option_ids' => ['nullable', 'string'],
            'data.*.commission_rate' => ['nullable', 'integer'],
            'data.*.order_status' => ['nullable', 'string'],
            'data.*.is_approved' => ['nullable', 'integer'],
            'data.*.shipping_tracking_number' => ['nullable', 'string'],
            'data.*.shipping_tracking_url' => ['nullable', 'string'],
            'data.*.shipping_method' => ['nullable', 'string'],
            'data.*.seller_shipping_cost' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
