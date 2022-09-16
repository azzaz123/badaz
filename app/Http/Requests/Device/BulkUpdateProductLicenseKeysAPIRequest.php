<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateProductLicenseKeysAPIRequest extends FormRequest
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
            'data.*.product_id' => ['nullable', 'integer'],
            'data.*.license_key' => ['nullable', 'string'],
            'data.*.is_used' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
