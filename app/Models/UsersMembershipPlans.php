<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class UsersMembershipPlans extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'users_membership_plans';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'plan_id',
        'plan_title',
        'number_of_ads',
        'number_of_days',
        'price',
        'currency',
        'is_free',
        'is_unlimited_number_of_ads',
        'is_unlimited_time',
        'payment_method',
        'payment_status',
        'plan_status',
        'plan_start_date',
        'plan_end_date',
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
        'user_id' => 'integer',
        'plan_id' => 'integer',
        'plan_title' => 'string',
        'number_of_ads' => 'integer',
        'number_of_days' => 'integer',
        'price' => 'integer',
        'currency' => 'string',
        'is_free' => 'integer',
        'is_unlimited_number_of_ads' => 'integer',
        'is_unlimited_time' => 'integer',
        'payment_method' => 'string',
        'payment_status' => 'string',
        'plan_status' => 'integer',
        'plan_start_date' => 'datetime',
        'plan_end_date' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
