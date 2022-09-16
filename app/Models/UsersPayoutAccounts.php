<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class UsersPayoutAccounts extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'users_payout_accounts';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'payout_paypal_email',
        'payout_bitcoin_address',
        'iban_full_name',
        'iban_country_id',
        'iban_bank_name',
        'iban_number',
        'swift_full_name',
        'swift_address',
        'swift_state',
        'swift_city',
        'swift_postcode',
        'swift_country_id',
        'swift_bank_account_holder_name',
        'swift_iban',
        'swift_code',
        'swift_bank_name',
        'swift_bank_branch_city',
        'swift_bank_branch_country_id',
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
        'payout_paypal_email' => 'string',
        'payout_bitcoin_address' => 'string',
        'iban_full_name' => 'string',
        'iban_country_id' => 'string',
        'iban_bank_name' => 'string',
        'iban_number' => 'string',
        'swift_full_name' => 'string',
        'swift_address' => 'string',
        'swift_state' => 'string',
        'swift_city' => 'string',
        'swift_postcode' => 'string',
        'swift_country_id' => 'string',
        'swift_bank_account_holder_name' => 'string',
        'swift_iban' => 'string',
        'swift_code' => 'string',
        'swift_bank_name' => 'string',
        'swift_bank_branch_city' => 'string',
        'swift_bank_branch_country_id' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
