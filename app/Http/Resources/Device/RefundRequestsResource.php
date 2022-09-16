<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class RefundRequestsResource extends BaseAPIResource
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
            'buyer_id' => $this->buyer_id,
            'seller_id' => $this->seller_id,
            'order_id' => $this->order_id,
            'order_number' => $this->order_number,
            'order_product_id' => $this->order_product_id,
            'status' => $this->status,
            'is_completed' => $this->is_completed,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'is_active' => $this->is_active,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
