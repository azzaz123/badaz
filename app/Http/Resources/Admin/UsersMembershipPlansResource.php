<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class UsersMembershipPlansResource extends BaseAPIResource
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
            'user_id' => $this->user_id,
            'plan_id' => $this->plan_id,
            'plan_title' => $this->plan_title,
            'number_of_ads' => $this->number_of_ads,
            'number_of_days' => $this->number_of_days,
            'price' => $this->price,
            'currency' => $this->currency,
            'is_free' => $this->is_free,
            'is_unlimited_number_of_ads' => $this->is_unlimited_number_of_ads,
            'is_unlimited_time' => $this->is_unlimited_time,
            'payment_method' => $this->payment_method,
            'payment_status' => $this->payment_status,
            'plan_status' => $this->plan_status,
            'plan_start_date' => $this->plan_start_date,
            'plan_end_date' => $this->plan_end_date,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
