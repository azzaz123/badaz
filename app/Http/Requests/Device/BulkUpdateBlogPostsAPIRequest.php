<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateBlogPostsAPIRequest extends FormRequest
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
            'data.*.lang_id' => ['nullable', 'integer'],
            'data.*.title' => ['nullable', 'string'],
            'data.*.slug' => ['nullable', 'string'],
            'data.*.summary' => ['nullable', 'string'],
            'data.*.content' => ['nullable'],
            'data.*.keywords' => ['nullable', 'string'],
            'data.*.category_id' => ['nullable', 'integer'],
            'data.*.storage' => ['nullable', 'string'],
            'data.*.image_default' => ['nullable', 'string'],
            'data.*.image_small' => ['nullable', 'string'],
            'data.*.user_id' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
