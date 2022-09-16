<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductLicenseKeysAPIRequest extends FormRequest
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
            'product_id' => ['nullable', 'integer'],
            'license_key' => ['nullable', 'string'],
            'is_used' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
