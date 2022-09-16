<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class PaymentSettingsResource extends BaseAPIResource
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
            'default_currency' => $this->default_currency,
            'allow_all_currencies_for_classied' => $this->allow_all_currencies_for_classied,
            'currency_converter' => $this->currency_converter,
            'auto_update_exchange_rates' => $this->auto_update_exchange_rates,
            'currency_converter_api' => $this->currency_converter_api,
            'currency_converter_api_key' => $this->currency_converter_api_key,
            'bank_transfer_enabled' => $this->bank_transfer_enabled,
            'bank_transfer_accounts' => $this->bank_transfer_accounts,
            'cash_on_delivery_enabled' => $this->cash_on_delivery_enabled,
            'price_per_day' => $this->price_per_day,
            'price_per_month' => $this->price_per_month,
            'free_product_promotion' => $this->free_product_promotion,
            'payout_paypal_enabled' => $this->payout_paypal_enabled,
            'payout_bitcoin_enabled' => $this->payout_bitcoin_enabled,
            'payout_iban_enabled' => $this->payout_iban_enabled,
            'payout_swift_enabled' => $this->payout_swift_enabled,
            'min_payout_paypal' => $this->min_payout_paypal,
            'min_payout_bitcoin' => $this->min_payout_bitcoin,
            'min_payout_iban' => $this->min_payout_iban,
            'min_payout_swift' => $this->min_payout_swift,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
