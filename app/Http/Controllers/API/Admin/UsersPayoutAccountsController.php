<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateUsersPayoutAccountsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateUsersPayoutAccountsAPIRequest;
use App\Http\Requests\Admin\CreateUsersPayoutAccountsAPIRequest;
use App\Http\Requests\Admin\UpdateUsersPayoutAccountsAPIRequest;
use App\Http\Resources\Admin\UsersPayoutAccountsCollection;
use App\Http\Resources\Admin\UsersPayoutAccountsResource;
use App\Repositories\UsersPayoutAccountsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class UsersPayoutAccountsController extends AppBaseController
{
    /**
     * @var UsersPayoutAccountsRepository
     */
    private UsersPayoutAccountsRepository $usersPayoutAccountsRepository;

    /**
     * @param UsersPayoutAccountsRepository $usersPayoutAccountsRepository
     */
    public function __construct(UsersPayoutAccountsRepository $usersPayoutAccountsRepository)
    {
        $this->usersPayoutAccountsRepository = $usersPayoutAccountsRepository;
    }

    /**
     * UsersPayoutAccounts's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return UsersPayoutAccountsCollection
     */
    public function index(Request $request): UsersPayoutAccountsCollection
    {
        $usersPayoutAccounts = $this->usersPayoutAccountsRepository->fetch($request);

        return new UsersPayoutAccountsCollection($usersPayoutAccounts);
    }

    /**
     * Create UsersPayoutAccounts with given payload.
     *
     * @param CreateUsersPayoutAccountsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return UsersPayoutAccountsResource
     */
    public function store(CreateUsersPayoutAccountsAPIRequest $request): UsersPayoutAccountsResource
    {
        $input = $request->all();
        $usersPayoutAccounts = $this->usersPayoutAccountsRepository->create($input);

        return new UsersPayoutAccountsResource($usersPayoutAccounts);
    }

    /**
     * Get single UsersPayoutAccounts record.
     *
     * @param int $id
     *
     * @return UsersPayoutAccountsResource
     */
    public function show(int $id): UsersPayoutAccountsResource
    {
        $usersPayoutAccounts = $this->usersPayoutAccountsRepository->findOrFail($id);

        return new UsersPayoutAccountsResource($usersPayoutAccounts);
    }

    /**
     * Update UsersPayoutAccounts with given payload.
     *
     * @param UpdateUsersPayoutAccountsAPIRequest $request
     * @param int                                 $id
     *
     * @throws ValidatorException
     *
     * @return UsersPayoutAccountsResource
     */
    public function update(UpdateUsersPayoutAccountsAPIRequest $request, int $id): UsersPayoutAccountsResource
    {
        $input = $request->all();
        $usersPayoutAccounts = $this->usersPayoutAccountsRepository->update($input, $id);

        return new UsersPayoutAccountsResource($usersPayoutAccounts);
    }

    /**
     * Delete given UsersPayoutAccounts.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->usersPayoutAccountsRepository->delete($id);

        return $this->successResponse('UsersPayoutAccounts deleted successfully.');
    }

    /**
     * Bulk create UsersPayoutAccounts's.
     *
     * @param BulkCreateUsersPayoutAccountsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return UsersPayoutAccountsCollection
     */
    public function bulkStore(BulkCreateUsersPayoutAccountsAPIRequest $request): UsersPayoutAccountsCollection
    {
        $usersPayoutAccounts = collect();

        $input = $request->get('data');
        foreach ($input as $key => $usersPayoutAccountsInput) {
            $usersPayoutAccounts[$key] = $this->usersPayoutAccountsRepository->create($usersPayoutAccountsInput);
        }

        return new UsersPayoutAccountsCollection($usersPayoutAccounts);
    }

    /**
     * Bulk update UsersPayoutAccounts's data.
     *
     * @param BulkUpdateUsersPayoutAccountsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return UsersPayoutAccountsCollection
     */
    public function bulkUpdate(BulkUpdateUsersPayoutAccountsAPIRequest $request): UsersPayoutAccountsCollection
    {
        $usersPayoutAccounts = collect();

        $input = $request->get('data');
        foreach ($input as $key => $usersPayoutAccountsInput) {
            $usersPayoutAccounts[$key] = $this->usersPayoutAccountsRepository->update($usersPayoutAccountsInput, $usersPayoutAccountsInput['id']);
        }

        return new UsersPayoutAccountsCollection($usersPayoutAccounts);
    }
}
