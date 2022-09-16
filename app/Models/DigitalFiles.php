<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class DigitalFiles extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'digital_files';

    /**
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'user_id',
        'file_name',
        'storage',
        'created_at',
        'is_active',
        'updated_at',
        'added_by',
        'updated_by',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'product_id' => 'integer',
        'user_id' => 'integer',
        'file_name' => 'string',
        'storage' => 'string',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
