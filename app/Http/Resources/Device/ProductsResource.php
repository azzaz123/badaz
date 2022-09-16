<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class ProductsResource extends BaseAPIResource
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        $fieldsFilter = $request->get('fields');
        if (!empty($fieldsFilter) || $request->get('include')) {
            return $this->resource->toArray();
        }

        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'product_type' => $this->product_type,
            'listing_type' => $this->listing_type,
            'sku' => $this->sku,
            'category_id' => $this->category_id,
            'price' => $this->price,
            'currency' => $this->currency,
            'discount_rate' => $this->discount_rate,
            'vat_rate' => $this->vat_rate,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'is_promoted' => $this->is_promoted,
            'promote_start_date' => $this->promote_start_date,
            'promote_end_date' => $this->promote_end_date,
            'promote_plan' => $this->promote_plan,
            'promote_day' => $this->promote_day,
            'is_special_offer' => $this->is_special_offer,
            'special_offer_date' => $this->special_offer_date,
            'visibility' => $this->visibility,
            'rating' => $this->rating,
            'pageviews' => $this->pageviews,
            'demo_url' => $this->demo_url,
            'external_link' => $this->external_link,
            'files_included' => $this->files_included,
            'stock' => $this->stock,
            'shipping_class_id' => $this->shipping_class_id,
            'shipping_delivery_time_id' => $this->shipping_delivery_time_id,
            'multiple_sale' => $this->multiple_sale,
            'is_sold' => $this->is_sold,
            'is_deleted' => $this->is_deleted,
            'is_draft' => $this->is_draft,
            'is_free_product' => $this->is_free_product,
            'is_rejected' => $this->is_rejected,
            'reject_reason' => $this->reject_reason,
            'created_at' => $this->created_at,
            'is_active' => $this->is_active,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
