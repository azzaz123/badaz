<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateMembershipTransactionsAPIRequest;
use App\Http\Requests\Device\BulkUpdateMembershipTransactionsAPIRequest;
use App\Http\Requests\Device\CreateMembershipTransactionsAPIRequest;
use App\Http\Requests\Device\UpdateMembershipTransactionsAPIRequest;
use App\Http\Resources\Device\MembershipTransactionsCollection;
use App\Http\Resources\Device\MembershipTransactionsResource;
use App\Repositories\MembershipTransactionsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class MembershipTransactionsController extends AppBaseController
{
    /**
     * @var MembershipTransactionsRepository
     */
    private MembershipTransactionsRepository $membershipTransactionsRepository;

    /**
     * @param MembershipTransactionsRepository $membershipTransactionsRepository
     */
    public function __construct(MembershipTransactionsRepository $membershipTransactionsRepository)
    {
        $this->membershipTransactionsRepository = $membershipTransactionsRepository;
    }

    /**
     * MembershipTransactions's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return MembershipTransactionsCollection
     */
    public function index(Request $request): MembershipTransactionsCollection
    {
        $membershipTransactions = $this->membershipTransactionsRepository->fetch($request);

        return new MembershipTransactionsCollection($membershipTransactions);
    }

    /**
     * Create MembershipTransactions with given payload.
     *
     * @param CreateMembershipTransactionsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MembershipTransactionsResource
     */
    public function store(CreateMembershipTransactionsAPIRequest $request): MembershipTransactionsResource
    {
        $input = $request->all();
        $membershipTransactions = $this->membershipTransactionsRepository->create($input);

        return new MembershipTransactionsResource($membershipTransactions);
    }

    /**
     * Get single MembershipTransactions record.
     *
     * @param int $id
     *
     * @return MembershipTransactionsResource
     */
    public function show(int $id): MembershipTransactionsResource
    {
        $membershipTransactions = $this->membershipTransactionsRepository->findOrFail($id);

        return new MembershipTransactionsResource($membershipTransactions);
    }

    /**
     * Update MembershipTransactions with given payload.
     *
     * @param UpdateMembershipTransactionsAPIRequest $request
     * @param int                                    $id
     *
     * @throws ValidatorException
     *
     * @return MembershipTransactionsResource
     */
    public function update(UpdateMembershipTransactionsAPIRequest $request, int $id): MembershipTransactionsResource
    {
        $input = $request->all();
        $membershipTransactions = $this->membershipTransactionsRepository->update($input, $id);

        return new MembershipTransactionsResource($membershipTransactions);
    }

    /**
     * Delete given MembershipTransactions.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->membershipTransactionsRepository->delete($id);

        return $this->successResponse('MembershipTransactions deleted successfully.');
    }

    /**
     * Bulk create MembershipTransactions's.
     *
     * @param BulkCreateMembershipTransactionsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MembershipTransactionsCollection
     */
    public function bulkStore(BulkCreateMembershipTransactionsAPIRequest $request): MembershipTransactionsCollection
    {
        $membershipTransactions = collect();

        $input = $request->get('data');
        foreach ($input as $key => $membershipTransactionsInput) {
            $membershipTransactions[$key] = $this->membershipTransactionsRepository->create($membershipTransactionsInput);
        }

        return new MembershipTransactionsCollection($membershipTransactions);
    }

    /**
     * Bulk update MembershipTransactions's data.
     *
     * @param BulkUpdateMembershipTransactionsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MembershipTransactionsCollection
     */
    public function bulkUpdate(BulkUpdateMembershipTransactionsAPIRequest $request): MembershipTransactionsCollection
    {
        $membershipTransactions = collect();

        $input = $request->get('data');
        foreach ($input as $key => $membershipTransactionsInput) {
            $membershipTransactions[$key] = $this->membershipTransactionsRepository->update($membershipTransactionsInput, $membershipTransactionsInput['id']);
        }

        return new MembershipTransactionsCollection($membershipTransactions);
    }
}
