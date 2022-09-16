<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class PaymentGateways extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'payment_gateways';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'name_key',
        'public_key',
        'secret_key',
        'environment',
        'locale',
        'base_currency',
        'status',
        'logos',
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
        'name' => 'string',
        'name_key' => 'string',
        'public_key' => 'string',
        'secret_key' => 'string',
        'environment' => 'string',
        'locale' => 'string',
        'base_currency' => 'string',
        'status' => 'integer',
        'logos' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
