<?php

namespace App\Repositories;

use App\Models\UsersPayoutAccounts;

class UsersPayoutAccountsRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
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
     * @return string[]
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
     * @return string
     */
    public function model(): string
    {
        return UsersPayoutAccounts::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
