<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class OrderShippingResource extends BaseAPIResource
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
            'shipping_first_name' => $this->shipping_first_name,
            'shipping_last_name' => $this->shipping_last_name,
            'shipping_email' => $this->shipping_email,
            'shipping_phone_number' => $this->shipping_phone_number,
            'shipping_address' => $this->shipping_address,
            'shipping_country' => $this->shipping_country,
            'shipping_state' => $this->shipping_state,
            'shipping_city' => $this->shipping_city,
            'shipping_zip_code' => $this->shipping_zip_code,
            'billing_first_name' => $this->billing_first_name,
            'billing_last_name' => $this->billing_last_name,
            'billing_email' => $this->billing_email,
            'billing_phone_number' => $this->billing_phone_number,
            'billing_address' => $this->billing_address,
            'billing_country' => $this->billing_country,
            'billing_state' => $this->billing_state,
            'billing_city' => $this->billing_city,
            'billing_zip_code' => $this->billing_zip_code,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
