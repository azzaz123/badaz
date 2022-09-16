<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoutesAPIRequest extends FormRequest
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
            'route_key' => ['nullable', 'string'],
            'route' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
