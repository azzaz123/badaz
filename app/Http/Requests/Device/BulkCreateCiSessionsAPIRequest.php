<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateCiSessionsAPIRequest extends FormRequest
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
            'data.*.ip_address' => ['nullable', 'string'],
            'data.*.timestamp' => ['nullable', 'integer'],
            'data.*.data' => ['nullable'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
