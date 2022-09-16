<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class RolesPermissionsResource extends BaseAPIResource
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        $fieldsFilter = $request->get('fields');
        if (!empty($fieldsFilter) || $request->get('include')) {
            return $this->resource->toArray();
        }

        return [
            'id' => $this->id,
            'role_name' => $this->role_name,
            'permissions' => $this->permissions,
            'is_super_admin' => $this->is_super_admin,
            'is_default' => $this->is_default,
            'is_admin' => $this->is_admin,
            'is_vendor' => $this->is_vendor,
            'is_member' => $this->is_member,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
