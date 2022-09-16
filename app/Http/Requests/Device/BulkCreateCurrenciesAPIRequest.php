<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateCurrenciesAPIRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'data.*.code' => ['nullable', 'string'],
            'data.*.name' => ['nullable', 'string'],
            'data.*.symbol' => ['nullable', 'string'],
            'data.*.currency_format' => ['nullable', 'string'],
            'data.*.symbol_direction' => ['nullable', 'string'],
            'data.*.space_money_symbol' => ['nullable', 'integer'],
            'data.*.exchange_rate' => ['nullable', 'integer'],
            'data.*.status' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
