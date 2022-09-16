<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateBlogCommentsAPIRequest extends FormRequest
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
            'data.*.user_id' => ['nullable', 'integer'],
            'data.*.email' => ['nullable', 'string'],
            'data.*.name' => ['nullable', 'string'],
            'data.*.comment' => ['nullable', 'string'],
            'data.*.ip_address' => ['nullable', 'string'],
            'data.*.status' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
