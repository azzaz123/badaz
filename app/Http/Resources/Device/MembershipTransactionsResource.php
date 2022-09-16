<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class MembershipTransactionsResource extends BaseAPIResource
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
            'payment_method' => $this->payment_method,
            'payment_id' => $this->payment_id,
            'payment_amount' => $this->payment_amount,
            'currency' => $this->currency,
            'payment_status' => $this->payment_status,
            'ip_address' => $this->ip_address,
            'created_at' => $this->created_at,
            'is_active' => $this->is_active,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
