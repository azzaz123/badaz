<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class ProductLicenseKeys extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'product_license_keys';

    /**
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'license_key',
        'is_used',
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
        'product_id' => 'integer',
        'license_key' => 'string',
        'is_used' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
