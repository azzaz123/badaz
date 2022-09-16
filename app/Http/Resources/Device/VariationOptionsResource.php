<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class VariationOptionsResource extends BaseAPIResource
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
            'variation_id' => $this->variation_id,
            'parent_id' => $this->parent_id,
            'option_names' => $this->option_names,
            'stock' => $this->stock,
            'color' => $this->color,
            'price' => $this->price,
            'discount_rate' => $this->discount_rate,
            'is_default' => $this->is_default,
            'use_default_price' => $this->use_default_price,
            'no_discount' => $this->no_discount,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
