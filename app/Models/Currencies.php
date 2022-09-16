<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Currencies extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'currencies';

    /**
     * @var string[]
     */
    protected $fillable = [
        'code',
        'name',
        'symbol',
        'currency_format',
        'symbol_direction',
        'space_money_symbol',
        'exchange_rate',
        'status',
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
        'code' => 'string',
        'name' => 'string',
        'symbol' => 'string',
        'currency_format' => 'string',
        'symbol_direction' => 'string',
        'space_money_symbol' => 'integer',
        'exchange_rate' => 'double',
        'status' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
