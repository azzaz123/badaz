<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateReviewsAPIRequest extends FormRequest
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
            'data.*.product_id' => ['nullable', 'integer'],
            'data.*.user_id' => ['nullable', 'integer'],
            'data.*.rating' => ['nullable', 'integer'],
            'data.*.review' => ['nullable', 'string'],
            'data.*.ip_address' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
