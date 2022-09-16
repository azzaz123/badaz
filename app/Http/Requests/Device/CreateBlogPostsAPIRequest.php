<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlogPostsAPIRequest extends FormRequest
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
            'lang_id' => ['nullable', 'integer'],
            'title' => ['nullable', 'string'],
            'slug' => ['nullable', 'string'],
            'summary' => ['nullable', 'string'],
            'content' => ['nullable'],
            'keywords' => ['nullable', 'string'],
            'category_id' => ['nullable', 'integer'],
            'storage' => ['nullable', 'string'],
            'image_default' => ['nullable', 'string'],
            'image_small' => ['nullable', 'string'],
            'user_id' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
