<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Invoices extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'invoices';

    /**
     * @var string[]
     */
    protected $fillable = [
        'order_id',
        'order_number',
        'client_username',
        'client_first_name',
        'client_last_name',
        'client_email',
        'client_phone_number',
        'client_address',
        'client_country',
        'client_state',
        'client_city',
        'invoice_items',
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
        'order_id' => 'integer',
        'order_number' => 'integer',
        'client_username' => 'string',
        'client_first_name' => 'string',
        'client_last_name' => 'string',
        'client_email' => 'string',
        'client_phone_number' => 'string',
        'client_address' => 'string',
        'client_country' => 'string',
        'client_state' => 'string',
        'client_city' => 'string',
        'invoice_items' => 'string',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
