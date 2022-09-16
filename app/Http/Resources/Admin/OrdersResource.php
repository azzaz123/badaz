<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class OrdersResource extends BaseAPIResource
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
            'order_number' => $this->order_number,
            'buyer_id' => $this->buyer_id,
            'buyer_type' => $this->buyer_type,
            'price_subtotal' => $this->price_subtotal,
            'price_vat' => $this->price_vat,
            'price_shipping' => $this->price_shipping,
            'price_total' => $this->price_total,
            'price_currency' => $this->price_currency,
            'coupon_code' => $this->coupon_code,
            'coupon_discount' => $this->coupon_discount,
            'coupon_discount_rate' => $this->coupon_discount_rate,
            'coupon_seller_id' => $this->coupon_seller_id,
            'status' => $this->status,
            'payment_method' => $this->payment_method,
            'payment_status' => $this->payment_status,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'is_active' => $this->is_active,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
