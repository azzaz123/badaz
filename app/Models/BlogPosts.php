<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class BlogPosts extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'blog_posts';

    /**
     * @var string[]
     */
    protected $fillable = [
        'lang_id',
        'title',
        'slug',
        'summary',
        'content',
        'keywords',
        'category_id',
        'storage',
        'image_default',
        'image_small',
        'user_id',
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
        'summary' => 'string',
        'content' => 'string',
        'keywords' => 'string',
        'category_id' => 'integer',
        'storage' => 'string',
        'image_default' => 'string',
        'image_small' => 'string',
        'user_id' => 'integer',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
