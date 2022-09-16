<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Followers extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'followers';

    /**
     * @var string[]
     */
    protected $fillable = [
        'following_id',
        'follower_id',
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
        'following_id' => 'integer',
        'follower_id' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
