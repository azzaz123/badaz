<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateCurrenciesAPIRequest extends FormRequest
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
            'code' => ['nullable', 'string'],
            'name' => ['nullable', 'string'],
            'symbol' => ['nullable', 'string'],
            'currency_format' => ['nullable', 'string'],
            'symbol_direction' => ['nullable', 'string'],
            'space_money_symbol' => ['nullable', 'integer'],
            'exchange_rate' => ['nullable', 'integer'],
            'status' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
