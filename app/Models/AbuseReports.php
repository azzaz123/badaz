<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class AbuseReports extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'abuse_reports';

    /**
     * @var string[]
     */
    protected $fillable = [
        'item_type',
        'item_id',
        'report_user_id',
        'description',
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
        'item_type' => 'string',
        'item_id' => 'integer',
        'report_user_id' => 'integer',
        'description' => 'string',
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
