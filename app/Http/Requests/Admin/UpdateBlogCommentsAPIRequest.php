<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogCommentsAPIRequest extends FormRequest
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
            'user_id' => ['nullable', 'integer'],
            'email' => ['nullable', 'string'],
            'name' => ['nullable', 'string'],
            'comment' => ['nullable', 'string'],
            'ip_address' => ['nullable', 'string'],
            'status' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
