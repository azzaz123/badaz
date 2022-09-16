<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFollowersAPIRequest extends FormRequest
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
            'following_id' => ['nullable', 'integer'],
            'follower_id' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
