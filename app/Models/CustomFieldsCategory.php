<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class CustomFieldsCategory extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'custom_fields_categories';

    /**
     * @var string[]
     */
    protected $fillable = [
        'category_id',
        'field_id',
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
        'category_id' => 'integer',
        'field_id' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
