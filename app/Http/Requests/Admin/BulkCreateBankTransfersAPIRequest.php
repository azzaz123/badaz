<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateBankTransfersAPIRequest extends FormRequest
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
            'data.*.order_number' => ['nullable', 'integer'],
            'data.*.payment_note' => ['nullable', 'string'],
            'data.*.receipt_path' => ['nullable', 'string'],
            'data.*.user_id' => ['nullable', 'integer'],
            'data.*.user_type' => ['nullable', 'string'],
            'data.*.status' => ['nullable', 'string'],
            'data.*.ip_address' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
