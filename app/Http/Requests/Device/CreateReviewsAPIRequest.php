<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateReviewsAPIRequest extends FormRequest
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
            'product_id' => ['nullable', 'integer'],
            'user_id' => ['nullable', 'integer'],
            'rating' => ['nullable', 'integer'],
            'review' => ['nullable', 'string'],
            'ip_address' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}
