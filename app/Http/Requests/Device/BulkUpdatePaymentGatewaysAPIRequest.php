<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdatePaymentGatewaysAPIRequest extends FormRequest
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
            'data.*.name' => ['nullable', 'string'],
            'data.*.name_key' => ['nullable', 'string'],
            'data.*.public_key' => ['nullable', 'string'],
            'data.*.secret_key' => ['nullable', 'string'],
            'data.*.environment' => ['nullable', 'string'],
            'data.*.locale' => ['nullable', 'string'],
            'data.*.base_currency' => ['nullable', 'string'],
            'data.*.status' => ['nullable', 'integer'],
            'data.*.logos' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
