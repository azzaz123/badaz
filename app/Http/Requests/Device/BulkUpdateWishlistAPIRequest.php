<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateWishlistAPIRequest extends FormRequest
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
            'data.*.is_active' => ['boolean'],
        ];
    }
}
