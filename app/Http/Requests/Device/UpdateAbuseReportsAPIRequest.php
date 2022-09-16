<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAbuseReportsAPIRequest extends FormRequest
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
            'item_type' => ['nullable', 'string'],
            'item_id' => ['nullable', 'integer'],
            'report_user_id' => ['nullable', 'integer'],
            'description' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
