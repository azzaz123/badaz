<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class EarningsResource extends BaseAPIResource
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
            'order_product_id' => $this->order_product_id,
            'user_id' => $this->user_id,
            'price' => $this->price,
            'commission_rate' => $this->commission_rate,
            'shipping_cost' => $this->shipping_cost,
            'earned_amount' => $this->earned_amount,
            'currency' => $this->currency,
            'exchange_rate' => $this->exchange_rate,
            'is_refunded' => $this->is_refunded,
            'created_at' => $this->created_at,
            'is_active' => $this->is_active,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
