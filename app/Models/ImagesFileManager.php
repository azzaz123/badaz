<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class ImagesFileManager extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'images_file_managers';

    /**
     * @var string[]
     */
    protected $fillable = [
        'image_path',
        'storage',
        'user_id',
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
        'image_path' => 'string',
        'storage' => 'string',
        'user_id' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
