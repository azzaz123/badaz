<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class StorageSettings extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'storage_settings';

    /**
     * @var string[]
     */
    protected $fillable = [
        'storage',
        'aws_key',
        'aws_secret',
        'aws_bucket',
        'aws_region',
        'aws_base_url',
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
        'storage' => 'string',
        'aws_key' => 'string',
        'aws_secret' => 'string',
        'aws_bucket' => 'string',
        'aws_region' => 'string',
        'aws_base_url' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
