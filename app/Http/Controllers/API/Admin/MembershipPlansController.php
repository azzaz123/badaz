<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateMembershipPlansAPIRequest;
use App\Http\Requests\Admin\BulkUpdateMembershipPlansAPIRequest;
use App\Http\Requests\Admin\CreateMembershipPlansAPIRequest;
use App\Http\Requests\Admin\UpdateMembershipPlansAPIRequest;
use App\Http\Resources\Admin\MembershipPlansCollection;
use App\Http\Resources\Admin\MembershipPlansResource;
use App\Repositories\MembershipPlansRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class MembershipPlansController extends AppBaseController
{
    /**
     * @var MembershipPlansRepository
     */
    private MembershipPlansRepository $membershipPlansRepository;

    /**
     * @param MembershipPlansRepository $membershipPlansRepository
     */
    public function __construct(MembershipPlansRepository $membershipPlansRepository)
    {
        $this->membershipPlansRepository = $membershipPlansRepository;
    }

    /**
     * MembershipPlans's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return MembershipPlansCollection
     */
    public function index(Request $request): MembershipPlansCollection
    {
        $membershipPlans = $this->membershipPlansRepository->fetch($request);

        return new MembershipPlansCollection($membershipPlans);
    }

    /**
     * Create MembershipPlans with given payload.
     *
     * @param CreateMembershipPlansAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MembershipPlansResource
     */
    public function store(CreateMembershipPlansAPIRequest $request): MembershipPlansResource
    {
        $input = $request->all();
        $membershipPlans = $this->membershipPlansRepository->create($input);

        return new MembershipPlansResource($membershipPlans);
    }

    /**
     * Get single MembershipPlans record.
     *
     * @param int $id
     *
     * @return MembershipPlansResource
     */
    public function show(int $id): MembershipPlansResource
    {
        $membershipPlans = $this->membershipPlansRepository->findOrFail($id);

        return new MembershipPlansResource($membershipPlans);
    }

    /**
     * Update MembershipPlans with given payload.
     *
     * @param UpdateMembershipPlansAPIRequest $request
     * @param int                             $id
     *
     * @throws ValidatorException
     *
     * @return MembershipPlansResource
     */
    public function update(UpdateMembershipPlansAPIRequest $request, int $id): MembershipPlansResource
    {
        $input = $request->all();
        $membershipPlans = $this->membershipPlansRepository->update($input, $id);

        return new MembershipPlansResource($membershipPlans);
    }

    /**
     * Delete given MembershipPlans.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->membershipPlansRepository->delete($id);

        return $this->successResponse('MembershipPlans deleted successfully.');
    }

    /**
     * Bulk create MembershipPlans's.
     *
     * @param BulkCreateMembershipPlansAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MembershipPlansCollection
     */
    public function bulkStore(BulkCreateMembershipPlansAPIRequest $request): MembershipPlansCollection
    {
        $membershipPlans = collect();

        $input = $request->get('data');
        foreach ($input as $key => $membershipPlansInput) {
            $membershipPlans[$key] = $this->membershipPlansRepository->create($membershipPlansInput);
        }

        return new MembershipPlansCollection($membershipPlans);
    }

    /**
     * Bulk update MembershipPlans's data.
     *
     * @param BulkUpdateMembershipPlansAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MembershipPlansCollection
     */
    public function bulkUpdate(BulkUpdateMembershipPlansAPIRequest $request): MembershipPlansCollection
    {
        $membershipPlans = collect();

        $input = $request->get('data');
        foreach ($input as $key => $membershipPlansInput) {
            $membershipPlans[$key] = $this->membershipPlansRepository->update($membershipPlansInput, $membershipPlansInput['id']);
        }

        return new MembershipPlansCollection($membershipPlans);
    }
}
