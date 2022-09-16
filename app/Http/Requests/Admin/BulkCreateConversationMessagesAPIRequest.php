<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateConversationMessagesAPIRequest extends FormRequest
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
            'data.*.conversation_id' => ['nullable', 'integer'],
            'data.*.sender_id' => ['nullable', 'integer'],
            'data.*.receiver_id' => ['nullable', 'integer'],
            'data.*.message' => ['nullable', 'string'],
            'data.*.is_read' => ['nullable', 'integer'],
            'data.*.deleted_user_id' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
