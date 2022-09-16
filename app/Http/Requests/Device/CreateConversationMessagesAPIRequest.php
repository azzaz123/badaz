<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateConversationMessagesAPIRequest extends FormRequest
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
            'conversation_id' => ['nullable', 'integer'],
            'sender_id' => ['nullable', 'integer'],
            'receiver_id' => ['nullable', 'integer'],
            'message' => ['nullable', 'string'],
            'is_read' => ['nullable', 'integer'],
            'deleted_user_id' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
