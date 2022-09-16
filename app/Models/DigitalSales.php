<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class DigitalSales extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'digital_sales';

    /**
     * @var string[]
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'product_title',
        'seller_id',
        'buyer_id',
        'license_key',
        'purchase_code',
        'currency',
        'price',
        'purchase_date',
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
        'product_id' => 'integer',
        'product_title' => 'string',
        'seller_id' => 'integer',
        'buyer_id' => 'integer',
        'license_key' => 'string',
        'purchase_code' => 'string',
        'currency' => 'string',
        'price' => 'integer',
        'purchase_date' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
