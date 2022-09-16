<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class OrderProductsResource extends BaseAPIResource
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
            'order_id' => $this->order_id,
            'seller_id' => $this->seller_id,
            'buyer_id' => $this->buyer_id,
            'buyer_type' => $this->buyer_type,
            'product_id' => $this->product_id,
            'product_type' => $this->product_type,
            'listing_type' => $this->listing_type,
            'product_title' => $this->product_title,
            'product_slug' => $this->product_slug,
            'product_unit_price' => $this->product_unit_price,
            'product_quantity' => $this->product_quantity,
            'product_currency' => $this->product_currency,
            'product_vat_rate' => $this->product_vat_rate,
            'product_vat' => $this->product_vat,
            'product_total_price' => $this->product_total_price,
            'variation_option_ids' => $this->variation_option_ids,
            'commission_rate' => $this->commission_rate,
            'order_status' => $this->order_status,
            'is_approved' => $this->is_approved,
            'shipping_tracking_number' => $this->shipping_tracking_number,
            'shipping_tracking_url' => $this->shipping_tracking_url,
            'shipping_method' => $this->shipping_method,
            'seller_shipping_cost' => $this->seller_shipping_cost,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'is_active' => $this->is_active,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
