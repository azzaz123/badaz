<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateAbuseReportsAPIRequest extends FormRequest
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
            'data.*.item_type' => ['nullable', 'string'],
            'data.*.item_id' => ['nullable', 'integer'],
            'data.*.report_user_id' => ['nullable', 'integer'],
            'data.*.description' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
