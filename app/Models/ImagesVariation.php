<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class ImagesVariation extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'images_variations';

    /**
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'variation_option_id',
        'image_default',
        'image_big',
        'image_small',
        'is_main',
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
        'variation_option_id' => 'integer',
        'image_default' => 'string',
        'image_big' => 'string',
        'image_small' => 'string',
        'is_main' => 'integer',
        'storage' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
