<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderProductsAPIRequest extends FormRequest
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
            'seller_id' => ['nullable', 'integer'],
            'buyer_id' => ['nullable', 'integer'],
            'buyer_type' => ['nullable', 'string'],
            'product_id' => ['nullable', 'integer'],
            'product_type' => ['nullable', 'string'],
            'listing_type' => ['nullable', 'string'],
            'product_title' => ['nullable', 'string'],
            'product_slug' => ['nullable', 'string'],
            'product_unit_price' => ['nullable', 'integer'],
            'product_quantity' => ['nullable', 'integer'],
            'product_currency' => ['nullable', 'string'],
            'product_vat_rate' => ['nullable', 'integer'],
            'product_vat' => ['nullable', 'integer'],
            'product_total_price' => ['nullable', 'integer'],
            'variation_option_ids' => ['nullable', 'string'],
            'commission_rate' => ['nullable', 'integer'],
            'order_status' => ['nullable', 'string'],
            'is_approved' => ['nullable', 'integer'],
            'shipping_tracking_number' => ['nullable', 'string'],
            'shipping_tracking_url' => ['nullable', 'string'],
            'shipping_method' => ['nullable', 'string'],
            'seller_shipping_cost' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
