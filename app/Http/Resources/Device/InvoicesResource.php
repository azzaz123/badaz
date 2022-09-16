<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class InvoicesResource extends BaseAPIResource
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
            'order_id' => $this->order_id,
            'order_number' => $this->order_number,
            'client_username' => $this->client_username,
            'client_first_name' => $this->client_first_name,
            'client_last_name' => $this->client_last_name,
            'client_email' => $this->client_email,
            'client_phone_number' => $this->client_phone_number,
            'client_address' => $this->client_address,
            'client_country' => $this->client_country,
            'client_state' => $this->client_state,
            'client_city' => $this->client_city,
            'invoice_items' => $this->invoice_items,
            'created_at' => $this->created_at,
            'is_active' => $this->is_active,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
