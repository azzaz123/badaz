<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class VariationOptions extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'variation_options';

    /**
     * @var string[]
     */
    protected $fillable = [
        'variation_id',
        'parent_id',
        'option_names',
        'stock',
        'color',
        'price',
        'discount_rate',
        'is_default',
        'use_default_price',
        'no_discount',
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
        'variation_id' => 'integer',
        'parent_id' => 'integer',
        'option_names' => 'string',
        'stock' => 'integer',
        'color' => 'string',
        'price' => 'integer',
        'discount_rate' => 'integer',
        'is_default' => 'integer',
        'use_default_price' => 'integer',
        'no_discount' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
