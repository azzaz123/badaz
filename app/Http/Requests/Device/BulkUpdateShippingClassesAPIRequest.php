<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateShippingClassesAPIRequest extends FormRequest
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
            'data.*.name_array' => ['nullable'],
            'data.*.user_id' => ['nullable', 'integer'],
            'data.*.status' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
