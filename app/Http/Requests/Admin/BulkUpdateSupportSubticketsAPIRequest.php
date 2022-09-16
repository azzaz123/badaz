<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateSupportSubticketsAPIRequest extends FormRequest
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
            'data.*.ticket_id' => ['nullable', 'integer'],
            'data.*.user_id' => ['nullable', 'integer'],
            'data.*.message' => ['nullable'],
            'data.*.attachments' => ['nullable'],
            'data.*.is_support_reply' => ['nullable', 'integer'],
            'data.*.storage' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
