<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class CustomFieldsProduct extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'custom_fields_products';

    /**
     * @var string[]
     */
    protected $fillable = [
        'field_id',
        'product_id',
        'product_filter_key',
        'field_value',
        'selected_option_id',
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
        'field_id' => 'integer',
        'product_id' => 'integer',
        'product_filter_key' => 'string',
        'field_value' => 'string',
        'selected_option_id' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
