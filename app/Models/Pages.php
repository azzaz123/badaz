<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Pages extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'pages';

    /**
     * @var string[]
     */
    protected $fillable = [
        'lang_id',
        'title',
        'slug',
        'description',
        'keywords',
        'page_content',
        'page_order',
        'visibility',
        'title_active',
        'location',
        'is_custom',
        'page_default_name',
        'created_at',
        'is_active',
        'updated_at',
        'added_by',
        'updated_by',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'lang_id' => 'integer',
        'title' => 'string',
        'slug' => 'string',
        'description' => 'string',
        'keywords' => 'string',
        'page_content' => 'string',
        'page_order' => 'integer',
        'visibility' => 'integer',
        'title_active' => 'integer',
        'location' => 'string',
        'is_custom' => 'integer',
        'page_default_name' => 'string',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
