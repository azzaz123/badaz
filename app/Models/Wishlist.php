<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Wishlist extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'wishlists';

    /**
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'user_id',
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
        'product_id' => 'integer',
        'user_id' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
