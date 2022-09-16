<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class PaymentsResource extends BaseAPIResource
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
            'payment_method' => $this->payment_method,
            'payment_id' => $this->payment_id,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'currency' => $this->currency,
            'payment_amount' => $this->payment_amount,
            'payer_email' => $this->payer_email,
            'payment_status' => $this->payment_status,
            'purchased_plan' => $this->purchased_plan,
            'created_at' => $this->created_at,
            'is_active' => $this->is_active,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
