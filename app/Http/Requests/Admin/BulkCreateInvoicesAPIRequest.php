<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateInvoicesAPIRequest extends FormRequest
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
            'data.*.order_id' => ['nullable', 'integer'],
            'data.*.order_number' => ['nullable', 'integer'],
            'data.*.client_username' => ['nullable', 'string'],
            'data.*.client_first_name' => ['nullable', 'string'],
            'data.*.client_last_name' => ['nullable', 'string'],
            'data.*.client_email' => ['nullable', 'string'],
            'data.*.client_phone_number' => ['nullable', 'string'],
            'data.*.client_address' => ['nullable', 'string'],
            'data.*.client_country' => ['nullable', 'string'],
            'data.*.client_state' => ['nullable', 'string'],
            'data.*.client_city' => ['nullable', 'string'],
            'data.*.invoice_items' => ['nullable'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
