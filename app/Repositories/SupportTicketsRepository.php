<?php

namespace App\Repositories;

use App\Models\SupportTickets;

class SupportTicketsRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'user_id',
        'name',
        'email',
        'subject',
        'is_guest',
        'status',
        'updated_at',
        'created_at',
        'is_active',
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
        return SupportTickets::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
