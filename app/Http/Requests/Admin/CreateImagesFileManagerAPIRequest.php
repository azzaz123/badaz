<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateImagesFileManagerAPIRequest extends FormRequest
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
            'image_path' => ['nullable', 'string'],
            'storage' => ['nullable', 'string'],
            'user_id' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
