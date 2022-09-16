<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class AdSpaces extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'ad_spaces';

    /**
     * @var string[]
     */
    protected $fillable = [
        'ad_space',
        'ad_code_728',
        'ad_code_468',
        'ad_code_300',
        'ad_code_250',
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
        'ad_space' => 'string',
        'ad_code_728' => 'string',
        'ad_code_468' => 'string',
        'ad_code_300' => 'string',
        'ad_code_250' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
