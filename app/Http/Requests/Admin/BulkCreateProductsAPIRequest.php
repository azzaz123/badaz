<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateProductsAPIRequest extends FormRequest
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
            'data.*.slug' => ['nullable', 'string'],
            'data.*.product_type' => ['nullable', 'string'],
            'data.*.listing_type' => ['nullable', 'string'],
            'data.*.sku' => ['nullable', 'string'],
            'data.*.category_id' => ['nullable', 'integer'],
            'data.*.price' => ['nullable', 'integer'],
            'data.*.currency' => ['nullable', 'string'],
            'data.*.discount_rate' => ['nullable', 'integer'],
            'data.*.vat_rate' => ['nullable', 'integer'],
            'data.*.user_id' => ['nullable', 'integer'],
            'data.*.status' => ['nullable', 'integer'],
            'data.*.is_promoted' => ['nullable', 'integer'],
            'data.*.promote_start_date' => ['nullable'],
            'data.*.promote_end_date' => ['nullable'],
            'data.*.promote_plan' => ['nullable', 'string'],
            'data.*.promote_day' => ['nullable', 'integer'],
            'data.*.is_special_offer' => ['nullable', 'integer'],
            'data.*.special_offer_date' => ['nullable'],
            'data.*.visibility' => ['nullable', 'integer'],
            'data.*.rating' => ['nullable', 'string'],
            'data.*.pageviews' => ['nullable', 'integer'],
            'data.*.demo_url' => ['nullable', 'string'],
            'data.*.external_link' => ['nullable', 'string'],
            'data.*.files_included' => ['nullable', 'string'],
            'data.*.stock' => ['nullable', 'integer'],
            'data.*.shipping_class_id' => ['nullable', 'integer'],
            'data.*.shipping_delivery_time_id' => ['nullable', 'integer'],
            'data.*.multiple_sale' => ['nullable', 'integer'],
            'data.*.is_sold' => ['nullable', 'integer'],
            'data.*.is_deleted' => ['nullable', 'integer'],
            'data.*.is_draft' => ['nullable', 'integer'],
            'data.*.is_free_product' => ['nullable', 'integer'],
            'data.*.is_rejected' => ['nullable', 'integer'],
            'data.*.reject_reason' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
