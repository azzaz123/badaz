<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Fonts extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'fonts';

    /**
     * @var string[]
     */
    protected $fillable = [
        'font_name',
        'font_url',
        'font_family',
        'is_default',
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
        'font_name' => 'string',
        'font_url' => 'string',
        'font_family' => 'string',
        'is_default' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
