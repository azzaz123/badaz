<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateRefundRequestsMessagesAPIRequest extends FormRequest
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
            'request_id' => ['nullable', 'integer'],
            'user_id' => ['nullable', 'integer'],
            'is_buyer' => ['nullable', 'integer'],
            'message' => ['nullable'],
            'is_active' => ['boolean'],
        ];
    }
}
