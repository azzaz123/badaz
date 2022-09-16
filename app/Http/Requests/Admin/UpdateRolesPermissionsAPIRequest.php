<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRolesPermissionsAPIRequest extends FormRequest
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
            'role_name' => ['nullable'],
            'permissions' => ['nullable'],
            'is_super_admin' => ['nullable', 'integer'],
            'is_default' => ['nullable', 'integer'],
            'is_admin' => ['nullable', 'integer'],
            'is_vendor' => ['nullable', 'integer'],
            'is_member' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ];
    }
}
