<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class MembershipPlansResource extends BaseAPIResource
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
            'title_array' => $this->title_array,
            'number_of_ads' => $this->number_of_ads,
            'number_of_days' => $this->number_of_days,
            'price' => $this->price,
            'is_free' => $this->is_free,
            'is_unlimited_number_of_ads' => $this->is_unlimited_number_of_ads,
            'is_unlimited_time' => $this->is_unlimited_time,
            'features_array' => $this->features_array,
            'plan_order' => $this->plan_order,
            'is_popular' => $this->is_popular,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
