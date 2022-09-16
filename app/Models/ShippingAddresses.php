<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class ShippingAddresses extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'shipping_addresses';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'title',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'country_id',
        'state_id',
        'city',
        'zip_code',
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
        'user_id' => 'integer',
        'title' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'phone_number' => 'string',
        'address' => 'string',
        'country_id' => 'string',
        'state_id' => 'integer',
        'city' => 'string',
        'zip_code' => 'string',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
