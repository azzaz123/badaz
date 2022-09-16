<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductsAPIRequest extends FormRequest
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
            'slug' => ['nullable', 'string'],
            'product_type' => ['nullable', 'string'],
            'listing_type' => ['nullable', 'string'],
            'sku' => ['nullable', 'string'],
            'category_id' => ['nullable', 'integer'],
            'price' => ['nullable', 'integer'],
            'currency' => ['nullable', 'string'],
            'discount_rate' => ['nullable', 'integer'],
            'vat_rate' => ['nullable', 'integer'],
            'user_id' => ['nullable', 'integer'],
            'status' => ['nullable', 'integer'],
            'is_promoted' => ['nullable', 'integer'],
            'promote_start_date' => ['nullable'],
            'promote_end_date' => ['nullable'],
            'promote_plan' => ['nullable', 'string'],
            'promote_day' => ['nullable', 'integer'],
            'is_special_offer' => ['nullable', 'integer'],
            'special_offer_date' => ['nullable'],
            'visibility' => ['nullable', 'integer'],
            'rating' => ['nullable', 'string'],
            'pageviews' => ['nullable', 'integer'],
            'demo_url' => ['nullable', 'string'],
            'external_link' => ['nullable', 'string'],
            'files_included' => ['nullable', 'string'],
            'stock' => ['nullable', 'integer'],
            'shipping_class_id' => ['nullable', 'integer'],
            'shipping_delivery_time_id' => ['nullable', 'integer'],
            'multiple_sale' => ['nullable', 'integer'],
            'is_sold' => ['nullable', 'integer'],
            'is_deleted' => ['nullable', 'integer'],
            'is_draft' => ['nullable', 'integer'],
            'is_free_product' => ['nullable', 'integer'],
            'is_rejected' => ['nullable', 'integer'],
            'reject_reason' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
