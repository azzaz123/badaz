<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogTagsAPIRequest extends FormRequest
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
            'post_id' => ['nullable', 'integer'],
            'tag' => ['nullable', 'string'],
            'tag_slug' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
