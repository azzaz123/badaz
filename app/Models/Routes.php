<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Routes extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'routes';

    /**
     * @var string[]
     */
    protected $fillable = [
        'route_key',
        'route',
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
        'route_key' => 'string',
        'route' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
