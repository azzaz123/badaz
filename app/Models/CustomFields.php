<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class CustomFields extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'custom_fields';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name_array',
        'field_type',
        'row_width',
        'is_required',
        'status',
        'field_order',
        'is_product_filter',
        'product_filter_key',
        'sort_options',
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
        'name_array' => 'string',
        'field_type' => 'string',
        'row_width' => 'string',
        'is_required' => 'integer',
        'status' => 'integer',
        'field_order' => 'integer',
        'is_product_filter' => 'integer',
        'product_filter_key' => 'string',
        'sort_options' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
