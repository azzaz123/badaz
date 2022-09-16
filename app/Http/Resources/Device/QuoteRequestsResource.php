<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class QuoteRequestsResource extends BaseAPIResource
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
            'product_id' => $this->product_id,
            'product_title' => $this->product_title,
            'product_quantity' => $this->product_quantity,
            'seller_id' => $this->seller_id,
            'buyer_id' => $this->buyer_id,
            'status' => $this->status,
            'price_offered' => $this->price_offered,
            'price_currency' => $this->price_currency,
            'is_buyer_deleted' => $this->is_buyer_deleted,
            'is_seller_deleted' => $this->is_seller_deleted,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'is_active' => $this->is_active,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
