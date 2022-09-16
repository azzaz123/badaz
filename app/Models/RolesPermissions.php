<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class RolesPermissions extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'roles_permissions';

    /**
     * @var string[]
     */
    protected $fillable = [
        'role_name',
        'permissions',
        'is_super_admin',
        'is_default',
        'is_admin',
        'is_vendor',
        'is_member',
        'is_active',
        'created_at',
        'updated_at',
        'added_by',
        'updated_by',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'role_name' => 'string',
        'permissions' => 'string',
        'is_super_admin' => 'integer',
        'is_default' => 'integer',
        'is_admin' => 'integer',
        'is_vendor' => 'integer',
        'is_member' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
