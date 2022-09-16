<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class SliderResource extends BaseAPIResource
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
            'lang_id' => $this->lang_id,
            'title' => $this->title,
            'description' => $this->description,
            'link' => $this->link,
            'item_order' => $this->item_order,
            'button_text' => $this->button_text,
            'animation_title' => $this->animation_title,
            'animation_description' => $this->animation_description,
            'animation_button' => $this->animation_button,
            'image' => $this->image,
            'image_mobile' => $this->image_mobile,
            'text_color' => $this->text_color,
            'button_color' => $this->button_color,
            'button_text_color' => $this->button_text_color,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
