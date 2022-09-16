<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateRoutesAPIRequest extends FormRequest
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
            'data.*.route_key' => ['nullable', 'string'],
            'data.*.route' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
