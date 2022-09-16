<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePagesAPIRequest extends FormRequest
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
            'description' => ['nullable', 'string'],
            'keywords' => ['nullable', 'string'],
            'page_content' => ['nullable'],
            'page_order' => ['nullable', 'integer'],
            'visibility' => ['nullable', 'integer'],
            'title_active' => ['nullable', 'integer'],
            'location' => ['nullable', 'string'],
            'is_custom' => ['nullable', 'integer'],
            'page_default_name' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
