<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class UsersPayoutAccountsResource extends BaseAPIResource
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
            'payout_paypal_email' => $this->payout_paypal_email,
            'payout_bitcoin_address' => $this->payout_bitcoin_address,
            'iban_full_name' => $this->iban_full_name,
            'iban_country_id' => $this->iban_country_id,
            'iban_bank_name' => $this->iban_bank_name,
            'iban_number' => $this->iban_number,
            'swift_full_name' => $this->swift_full_name,
            'swift_address' => $this->swift_address,
            'swift_state' => $this->swift_state,
            'swift_city' => $this->swift_city,
            'swift_postcode' => $this->swift_postcode,
            'swift_country_id' => $this->swift_country_id,
            'swift_bank_account_holder_name' => $this->swift_bank_account_holder_name,
            'swift_iban' => $this->swift_iban,
            'swift_code' => $this->swift_code,
            'swift_bank_name' => $this->swift_bank_name,
            'swift_bank_branch_city' => $this->swift_bank_branch_city,
            'swift_bank_branch_country_id' => $this->swift_bank_branch_country_id,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
