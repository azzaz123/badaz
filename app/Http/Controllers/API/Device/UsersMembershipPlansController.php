<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateUsersMembershipPlansAPIRequest;
use App\Http\Requests\Device\BulkUpdateUsersMembershipPlansAPIRequest;
use App\Http\Requests\Device\CreateUsersMembershipPlansAPIRequest;
use App\Http\Requests\Device\UpdateUsersMembershipPlansAPIRequest;
use App\Http\Resources\Device\UsersMembershipPlansCollection;
use App\Http\Resources\Device\UsersMembershipPlansResource;
use App\Repositories\UsersMembershipPlansRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class UsersMembershipPlansController extends AppBaseController
{
    /**
     * @var UsersMembershipPlansRepository
     */
    private UsersMembershipPlansRepository $usersMembershipPlansRepository;

    /**
     * @param UsersMembershipPlansRepository $usersMembershipPlansRepository
     */
    public function __construct(UsersMembershipPlansRepository $usersMembershipPlansRepository)
    {
        $this->usersMembershipPlansRepository = $usersMembershipPlansRepository;
    }

    /**
     * UsersMembershipPlans's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return UsersMembershipPlansCollection
     */
    public function index(Request $request): UsersMembershipPlansCollection
    {
        $usersMembershipPlans = $this->usersMembershipPlansRepository->fetch($request);

        return new UsersMembershipPlansCollection($usersMembershipPlans);
    }

    /**
     * Create UsersMembershipPlans with given payload.
     *
     * @param CreateUsersMembershipPlansAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return UsersMembershipPlansResource
     */
    public function store(CreateUsersMembershipPlansAPIRequest $request): UsersMembershipPlansResource
    {
        $input = $request->all();
        $usersMembershipPlans = $this->usersMembershipPlansRepository->create($input);

        return new UsersMembershipPlansResource($usersMembershipPlans);
    }

    /**
     * Get single UsersMembershipPlans record.
     *
     * @param int $id
     *
     * @return UsersMembershipPlansResource
     */
    public function show(int $id): UsersMembershipPlansResource
    {
        $usersMembershipPlans = $this->usersMembershipPlansRepository->findOrFail($id);

        return new UsersMembershipPlansResource($usersMembershipPlans);
    }

    /**
     * Update UsersMembershipPlans with given payload.
     *
     * @param UpdateUsersMembershipPlansAPIRequest $request
     * @param int                                  $id
     *
     * @throws ValidatorException
     *
     * @return UsersMembershipPlansResource
     */
    public function update(UpdateUsersMembershipPlansAPIRequest $request, int $id): UsersMembershipPlansResource
    {
        $input = $request->all();
        $usersMembershipPlans = $this->usersMembershipPlansRepository->update($input, $id);

        return new UsersMembershipPlansResource($usersMembershipPlans);
    }

    /**
     * Delete given UsersMembershipPlans.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->usersMembershipPlansRepository->delete($id);

        return $this->successResponse('UsersMembershipPlans deleted successfully.');
    }

    /**
     * Bulk create UsersMembershipPlans's.
     *
     * @param BulkCreateUsersMembershipPlansAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return UsersMembershipPlansCollection
     */
    public function bulkStore(BulkCreateUsersMembershipPlansAPIRequest $request): UsersMembershipPlansCollection
    {
        $usersMembershipPlans = collect();

        $input = $request->get('data');
        foreach ($input as $key => $usersMembershipPlansInput) {
            $usersMembershipPlans[$key] = $this->usersMembershipPlansRepository->create($usersMembershipPlansInput);
        }

        return new UsersMembershipPlansCollection($usersMembershipPlans);
    }

    /**
     * Bulk update UsersMembershipPlans's data.
     *
     * @param BulkUpdateUsersMembershipPlansAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return UsersMembershipPlansCollection
     */
    public function bulkUpdate(BulkUpdateUsersMembershipPlansAPIRequest $request): UsersMembershipPlansCollection
    {
        $usersMembershipPlans = collect();

        $input = $request->get('data');
        foreach ($input as $key => $usersMembershipPlansInput) {
            $usersMembershipPlans[$key] = $this->usersMembershipPlansRepository->update($usersMembershipPlansInput, $usersMembershipPlansInput['id']);
        }

        return new UsersMembershipPlansCollection($usersMembershipPlans);
    }
}
