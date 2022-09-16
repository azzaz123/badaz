<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class VariationsResource extends BaseAPIResource
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
            'user_id' => $this->user_id,
            'parent_id' => $this->parent_id,
            'label_names' => $this->label_names,
            'variation_type' => $this->variation_type,
            'insert_type' => $this->insert_type,
            'option_display_type' => $this->option_display_type,
            'show_images_on_slider' => $this->show_images_on_slider,
            'use_different_price' => $this->use_different_price,
            'is_visible' => $this->is_visible,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
