<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoicesAPIRequest extends FormRequest
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
            'order_id' => ['nullable', 'integer'],
            'order_number' => ['nullable', 'integer'],
            'client_username' => ['nullable', 'string'],
            'client_first_name' => ['nullable', 'string'],
            'client_last_name' => ['nullable', 'string'],
            'client_email' => ['nullable', 'string'],
            'client_phone_number' => ['nullable', 'string'],
            'client_address' => ['nullable', 'string'],
            'client_country' => ['nullable', 'string'],
            'client_state' => ['nullable', 'string'],
            'client_city' => ['nullable', 'string'],
            'invoice_items' => ['nullable'],
            'is_active' => ['boolean'],
        ];
    }
}
