<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Media extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'media';

    /**
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'media_type',
        'file_name',
        'storage',
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
        'media_type' => 'string',
        'file_name' => 'string',
        'storage' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
