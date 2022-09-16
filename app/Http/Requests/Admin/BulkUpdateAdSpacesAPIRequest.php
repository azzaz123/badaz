<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateAdSpacesAPIRequest extends FormRequest
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
            'data.*.ad_space' => ['nullable'],
            'data.*.ad_code_728' => ['nullable'],
            'data.*.ad_code_468' => ['nullable'],
            'data.*.ad_code_300' => ['nullable'],
            'data.*.ad_code_250' => ['nullable'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
