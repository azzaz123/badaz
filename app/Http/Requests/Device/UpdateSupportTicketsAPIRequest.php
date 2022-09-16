<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupportTicketsAPIRequest extends FormRequest
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
            'user_id' => ['nullable', 'integer'],
            'name' => ['nullable', 'string'],
            'email' => ['nullable', 'string'],
            'subject' => ['nullable', 'string'],
            'is_guest' => ['nullable', 'integer'],
            'status' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
