<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class AbuseReportsResource extends BaseAPIResource
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
            'item_type' => $this->item_type,
            'item_id' => $this->item_id,
            'report_user_id' => $this->report_user_id,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'is_active' => $this->is_active,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
