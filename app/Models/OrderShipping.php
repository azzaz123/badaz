<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class OrderShipping extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'order_shippings';

    /**
     * @var string[]
     */
    protected $fillable = [
        'order_id',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_email',
        'shipping_phone_number',
        'shipping_address',
        'shipping_country',
        'shipping_state',
        'shipping_city',
        'shipping_zip_code',
        'billing_first_name',
        'billing_last_name',
        'billing_email',
        'billing_phone_number',
        'billing_address',
        'billing_country',
        'billing_state',
        'billing_city',
        'billing_zip_code',
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
        'order_id' => 'integer',
        'shipping_first_name' => 'string',
        'shipping_last_name' => 'string',
        'shipping_email' => 'string',
        'shipping_phone_number' => 'string',
        'shipping_address' => 'string',
        'shipping_country' => 'string',
        'shipping_state' => 'string',
        'shipping_city' => 'string',
        'shipping_zip_code' => 'string',
        'billing_first_name' => 'string',
        'billing_last_name' => 'string',
        'billing_email' => 'string',
        'billing_phone_number' => 'string',
        'billing_address' => 'string',
        'billing_country' => 'string',
        'billing_state' => 'string',
        'billing_city' => 'string',
        'billing_zip_code' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
