<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreatePaymentGatewaysAPIRequest extends FormRequest
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
            'name' => ['nullable', 'string'],
            'name_key' => ['nullable', 'string'],
            'public_key' => ['nullable', 'string'],
            'secret_key' => ['nullable', 'string'],
            'environment' => ['nullable', 'string'],
            'locale' => ['nullable', 'string'],
            'base_currency' => ['nullable', 'string'],
            'status' => ['nullable', 'integer'],
            'logos' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
