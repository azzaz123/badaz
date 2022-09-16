<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class CustomFieldsOptions extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'custom_fields_options';

    /**
     * @var string[]
     */
    protected $fillable = [
        'field_id',
        'option_key',
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
        'option_key' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
