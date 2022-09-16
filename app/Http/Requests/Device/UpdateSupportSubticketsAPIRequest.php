<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupportSubticketsAPIRequest extends FormRequest
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
            'ticket_id' => ['nullable', 'integer'],
            'user_id' => ['nullable', 'integer'],
            'message' => ['nullable'],
            'attachments' => ['nullable'],
            'is_support_reply' => ['nullable', 'integer'],
            'storage' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
