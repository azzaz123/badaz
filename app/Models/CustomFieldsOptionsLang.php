<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class CustomFieldsOptionsLang extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'custom_fields_options_langs';

    /**
     * @var string[]
     */
    protected $fillable = [
        'option_id',
        'lang_id',
        'option_name',
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
        'option_id' => 'integer',
        'lang_id' => 'integer',
        'option_name' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
