<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class LanguagesResource extends BaseAPIResource
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
            'name' => $this->name,
            'short_form' => $this->short_form,
            'language_code' => $this->language_code,
            'text_direction' => $this->text_direction,
            'status' => $this->status,
            'language_order' => $this->language_order,
            'text_editor_lang' => $this->text_editor_lang,
            'flag_path' => $this->flag_path,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
