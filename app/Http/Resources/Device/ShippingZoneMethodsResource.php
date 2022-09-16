<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class ShippingZoneMethodsResource extends BaseAPIResource
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
            'name_array' => $this->name_array,
            'zone_id' => $this->zone_id,
            'user_id' => $this->user_id,
            'method_type' => $this->method_type,
            'flat_rate_cost_calculation_type' => $this->flat_rate_cost_calculation_type,
            'flat_rate_cost' => $this->flat_rate_cost,
            'flat_rate_class_costs_array' => $this->flat_rate_class_costs_array,
            'local_pickup_cost' => $this->local_pickup_cost,
            'free_shipping_min_amount' => $this->free_shipping_min_amount,
            'status' => $this->status,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
