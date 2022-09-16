<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdSpacesAPIRequest extends FormRequest
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
            'ad_space' => ['nullable'],
            'ad_code_728' => ['nullable'],
            'ad_code_468' => ['nullable'],
            'ad_code_300' => ['nullable'],
            'ad_code_250' => ['nullable'],
            'is_active' => ['boolean'],
        ];
    }
}
