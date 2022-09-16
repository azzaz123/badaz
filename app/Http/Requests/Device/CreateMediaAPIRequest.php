<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateMediaAPIRequest extends FormRequest
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
            'media_type' => ['nullable', 'string'],
            'file_name' => ['nullable', 'string'],
            'storage' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
