<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomFieldsCategoryAPIRequest extends FormRequest
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
            'category_id' => ['nullable', 'integer'],
            'field_id' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
