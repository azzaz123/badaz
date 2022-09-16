<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class CustomFieldsResource extends BaseAPIResource
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
            'field_type' => $this->field_type,
            'row_width' => $this->row_width,
            'is_required' => $this->is_required,
            'status' => $this->status,
            'field_order' => $this->field_order,
            'is_product_filter' => $this->is_product_filter,
            'product_filter_key' => $this->product_filter_key,
            'sort_options' => $this->sort_options,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
