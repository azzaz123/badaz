<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateRefundRequestsMessagesAPIRequest extends FormRequest
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
            'data.*.request_id' => ['nullable', 'integer'],
            'data.*.user_id' => ['nullable', 'integer'],
            'data.*.is_buyer' => ['nullable', 'integer'],
            'data.*.message' => ['nullable'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
