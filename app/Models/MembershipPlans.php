<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class MembershipPlans extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'membership_plans';

    /**
     * @var string[]
     */
    protected $fillable = [
        'title_array',
        'number_of_ads',
        'number_of_days',
        'price',
        'is_free',
        'is_unlimited_number_of_ads',
        'is_unlimited_time',
        'features_array',
        'plan_order',
        'is_popular',
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
        'title_array' => 'string',
        'number_of_ads' => 'integer',
        'number_of_days' => 'integer',
        'price' => 'integer',
        'is_free' => 'integer',
        'is_unlimited_number_of_ads' => 'integer',
        'is_unlimited_time' => 'integer',
        'features_array' => 'string',
        'plan_order' => 'integer',
        'is_popular' => 'integer',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
