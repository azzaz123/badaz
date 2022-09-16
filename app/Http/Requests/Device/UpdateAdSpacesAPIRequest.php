<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdSpacesAPIRequest extends FormRequest
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
