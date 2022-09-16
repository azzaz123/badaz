<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class CategoriesLang extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'categories_langs';

    /**
     * @var string[]
     */
    protected $fillable = [
        'category_id',
        'lang_id',
        'name',
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
        'lang_id' => 'integer',
        'name' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
