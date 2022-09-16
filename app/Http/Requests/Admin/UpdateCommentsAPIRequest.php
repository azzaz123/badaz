<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentsAPIRequest extends FormRequest
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
            'parent_id' => ['nullable', 'integer'],
            'product_id' => ['nullable', 'integer'],
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
