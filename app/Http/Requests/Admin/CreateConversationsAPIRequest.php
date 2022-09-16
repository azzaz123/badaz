<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateConversationsAPIRequest extends FormRequest
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
            'sender_id' => ['nullable', 'integer'],
            'receiver_id' => ['nullable', 'integer'],
            'subject' => ['nullable', 'string'],
            'product_id' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
