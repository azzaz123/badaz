<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class PagesResource extends BaseAPIResource
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
            'slug' => $this->slug,
            'description' => $this->description,
            'keywords' => $this->keywords,
            'page_content' => $this->page_content,
            'page_order' => $this->page_order,
            'visibility' => $this->visibility,
            'title_active' => $this->title_active,
            'location' => $this->location,
            'is_custom' => $this->is_custom,
            'page_default_name' => $this->page_default_name,
            'created_at' => $this->created_at,
            'is_active' => $this->is_active,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
