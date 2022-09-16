<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateSubscribersAPIRequest extends FormRequest
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
            'data.*.email' => ['nullable', 'string'],
            'data.*.token' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
