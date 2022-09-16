<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateBlogTagsAPIRequest extends FormRequest
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
            'data.*.post_id' => ['nullable', 'integer'],
            'data.*.tag' => ['nullable', 'string'],
            'data.*.tag_slug' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
