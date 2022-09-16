<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class KnowledgeBase extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'knowledge_bases';

    /**
     * @var string[]
     */
    protected $fillable = [
        'lang_id',
        'title',
        'slug',
        'content',
        'category_id',
        'content_order',
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
        'content' => 'string',
        'category_id' => 'string',
        'content_order' => 'integer',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
