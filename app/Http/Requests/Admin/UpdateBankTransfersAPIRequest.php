<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBankTransfersAPIRequest extends FormRequest
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
            'order_number' => ['nullable', 'integer'],
            'payment_note' => ['nullable', 'string'],
            'receipt_path' => ['nullable', 'string'],
            'user_id' => ['nullable', 'integer'],
            'user_type' => ['nullable', 'string'],
            'status' => ['nullable', 'string'],
            'ip_address' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
