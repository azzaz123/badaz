<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateCiSessionsAPIRequest extends FormRequest
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
            'ip_address' => ['nullable', 'string'],
            'timestamp' => ['nullable', 'integer'],
            'data' => ['nullable'],
            'is_active' => ['boolean'],
        ];
    }
}
