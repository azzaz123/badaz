<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class BlogTags extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'blog_tags';

    /**
     * @var string[]
     */
    protected $fillable = [
        'post_id',
        'tag',
        'tag_slug',
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
        'post_id' => 'integer',
        'tag' => 'string',
        'tag_slug' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
