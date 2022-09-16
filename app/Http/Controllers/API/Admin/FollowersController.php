<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateFollowersAPIRequest;
use App\Http\Requests\Admin\BulkUpdateFollowersAPIRequest;
use App\Http\Requests\Admin\CreateFollowersAPIRequest;
use App\Http\Requests\Admin\UpdateFollowersAPIRequest;
use App\Http\Resources\Admin\FollowersCollection;
use App\Http\Resources\Admin\FollowersResource;
use App\Repositories\FollowersRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class FollowersController extends AppBaseController
{
    /**
     * @var FollowersRepository
     */
    private FollowersRepository $followersRepository;

    /**
     * @param FollowersRepository $followersRepository
     */
    public function __construct(FollowersRepository $followersRepository)
    {
        $this->followersRepository = $followersRepository;
    }

    /**
     * Followers's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return FollowersCollection
     */
    public function index(Request $request): FollowersCollection
    {
        $followers = $this->followersRepository->fetch($request);

        return new FollowersCollection($followers);
    }

    /**
     * Create Followers with given payload.
     *
     * @param CreateFollowersAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return FollowersResource
     */
    public function store(CreateFollowersAPIRequest $request): FollowersResource
    {
        $input = $request->all();
        $followers = $this->followersRepository->create($input);

        return new FollowersResource($followers);
    }

    /**
     * Get single Followers record.
     *
     * @param int $id
     *
     * @return FollowersResource
     */
    public function show(int $id): FollowersResource
    {
        $followers = $this->followersRepository->findOrFail($id);

        return new FollowersResource($followers);
    }

    /**
     * Update Followers with given payload.
     *
     * @param UpdateFollowersAPIRequest $request
     * @param int                       $id
     *
     * @throws ValidatorException
     *
     * @return FollowersResource
     */
    public function update(UpdateFollowersAPIRequest $request, int $id): FollowersResource
    {
        $input = $request->all();
        $followers = $this->followersRepository->update($input, $id);

        return new FollowersResource($followers);
    }

    /**
     * Delete given Followers.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->followersRepository->delete($id);

        return $this->successResponse('Followers deleted successfully.');
    }

    /**
     * Bulk create Followers's.
     *
     * @param BulkCreateFollowersAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return FollowersCollection
     */
    public function bulkStore(BulkCreateFollowersAPIRequest $request): FollowersCollection
    {
        $followers = collect();

        $input = $request->get('data');
        foreach ($input as $key => $followersInput) {
            $followers[$key] = $this->followersRepository->create($followersInput);
        }

        return new FollowersCollection($followers);
    }

    /**
     * Bulk update Followers's data.
     *
     * @param BulkUpdateFollowersAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return FollowersCollection
     */
    public function bulkUpdate(BulkUpdateFollowersAPIRequest $request): FollowersCollection
    {
        $followers = collect();

        $input = $request->get('data');
        foreach ($input as $key => $followersInput) {
            $followers[$key] = $this->followersRepository->update($followersInput, $followersInput['id']);
        }

        return new FollowersCollection($followers);
    }
}
