<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class LanguageTranslations extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'language_translations';

    /**
     * @var string[]
     */
    protected $fillable = [
        'lang_id',
        'label',
        'translation',
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
        'lang_id' => 'integer',
        'label' => 'string',
        'translation' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
