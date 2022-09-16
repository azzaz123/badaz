<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateRolesPermissionsAPIRequest extends FormRequest
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
            'data.*.role_name' => ['nullable'],
            'data.*.permissions' => ['nullable'],
            'data.*.is_super_admin' => ['nullable', 'integer'],
            'data.*.is_default' => ['nullable', 'integer'],
            'data.*.is_admin' => ['nullable', 'integer'],
            'data.*.is_vendor' => ['nullable', 'integer'],
            'data.*.is_member' => ['nullable', 'integer'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
