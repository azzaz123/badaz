<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShippingDeliveryTimesAPIRequest extends FormRequest
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
            'user_id' => ['nullable', 'integer'],
            'option_array' => ['nullable'],
            'is_active' => ['boolean'],
        ];
    }
}
