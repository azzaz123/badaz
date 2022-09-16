<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Variations extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'variations';

    /**
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'user_id',
        'parent_id',
        'label_names',
        'variation_type',
        'insert_type',
        'option_display_type',
        'show_images_on_slider',
        'use_different_price',
        'is_visible',
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
        'user_id' => 'integer',
        'parent_id' => 'integer',
        'label_names' => 'string',
        'variation_type' => 'string',
        'insert_type' => 'string',
        'option_display_type' => 'string',
        'show_images_on_slider' => 'integer',
        'use_different_price' => 'integer',
        'is_visible' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
