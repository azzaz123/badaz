<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class KnowledgeBaseCategories extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'knowledge_base_categories';

    /**
     * @var string[]
     */
    protected $fillable = [
        'lang_id',
        'name',
        'slug',
        'category_order',
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
        'name' => 'string',
        'slug' => 'string',
        'category_order' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
