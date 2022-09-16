<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogImagesAPIRequest extends FormRequest
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
            'image_path_thumb' => ['nullable', 'string'],
            'storage' => ['nullable', 'string'],
            'user_id' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
