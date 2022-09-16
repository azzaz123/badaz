<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImagesAPIRequest extends FormRequest
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
            'image_default' => ['nullable', 'string'],
            'image_big' => ['nullable', 'string'],
            'image_small' => ['nullable', 'string'],
            'is_main' => ['nullable', 'integer'],
            'storage' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
