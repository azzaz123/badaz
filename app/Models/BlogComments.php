<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class BlogComments extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'blog_comments';

    /**
     * @var string[]
     */
    protected $fillable = [
        'post_id',
        'user_id',
        'email',
        'name',
        'comment',
        'ip_address',
        'status',
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
        'post_id' => 'integer',
        'user_id' => 'integer',
        'email' => 'string',
        'name' => 'string',
        'comment' => 'string',
        'ip_address' => 'string',
        'status' => 'integer',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
