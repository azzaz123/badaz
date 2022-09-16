<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Languages extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'languages';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'short_form',
        'language_code',
        'text_direction',
        'status',
        'language_order',
        'text_editor_lang',
        'flag_path',
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
        'name' => 'string',
        'short_form' => 'string',
        'language_code' => 'string',
        'text_direction' => 'string',
        'status' => 'integer',
        'language_order' => 'integer',
        'text_editor_lang' => 'string',
        'flag_path' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
