<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateSupportSubticketsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateSupportSubticketsAPIRequest;
use App\Http\Requests\Admin\CreateSupportSubticketsAPIRequest;
use App\Http\Requests\Admin\UpdateSupportSubticketsAPIRequest;
use App\Http\Resources\Admin\SupportSubticketsCollection;
use App\Http\Resources\Admin\SupportSubticketsResource;
use App\Repositories\SupportSubticketsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class SupportSubticketsController extends AppBaseController
{
    /**
     * @var SupportSubticketsRepository
     */
    private SupportSubticketsRepository $supportSubticketsRepository;

    /**
     * @param SupportSubticketsRepository $supportSubticketsRepository
     */
    public function __construct(SupportSubticketsRepository $supportSubticketsRepository)
    {
        $this->supportSubticketsRepository = $supportSubticketsRepository;
    }

    /**
     * SupportSubtickets's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return SupportSubticketsCollection
     */
    public function index(Request $request): SupportSubticketsCollection
    {
        $supportSubtickets = $this->supportSubticketsRepository->fetch($request);

        return new SupportSubticketsCollection($supportSubtickets);
    }

    /**
     * Create SupportSubtickets with given payload.
     *
     * @param CreateSupportSubticketsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return SupportSubticketsResource
     */
    public function store(CreateSupportSubticketsAPIRequest $request): SupportSubticketsResource
    {
        $input = $request->all();
        $supportSubtickets = $this->supportSubticketsRepository->create($input);

        return new SupportSubticketsResource($supportSubtickets);
    }

    /**
     * Get single SupportSubtickets record.
     *
     * @param int $id
     *
     * @return SupportSubticketsResource
     */
    public function show(int $id): SupportSubticketsResource
    {
        $supportSubtickets = $this->supportSubticketsRepository->findOrFail($id);

        return new SupportSubticketsResource($supportSubtickets);
    }

    /**
     * Update SupportSubtickets with given payload.
     *
     * @param UpdateSupportSubticketsAPIRequest $request
     * @param int                               $id
     *
     * @throws ValidatorException
     *
     * @return SupportSubticketsResource
     */
    public function update(UpdateSupportSubticketsAPIRequest $request, int $id): SupportSubticketsResource
    {
        $input = $request->all();
        $supportSubtickets = $this->supportSubticketsRepository->update($input, $id);

        return new SupportSubticketsResource($supportSubtickets);
    }

    /**
     * Delete given SupportSubtickets.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->supportSubticketsRepository->delete($id);

        return $this->successResponse('SupportSubtickets deleted successfully.');
    }

    /**
     * Bulk create SupportSubtickets's.
     *
     * @param BulkCreateSupportSubticketsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return SupportSubticketsCollection
     */
    public function bulkStore(BulkCreateSupportSubticketsAPIRequest $request): SupportSubticketsCollection
    {
        $supportSubtickets = collect();

        $input = $request->get('data');
        foreach ($input as $key => $supportSubticketsInput) {
            $supportSubtickets[$key] = $this->supportSubticketsRepository->create($supportSubticketsInput);
        }

        return new SupportSubticketsCollection($supportSubtickets);
    }

    /**
     * Bulk update SupportSubtickets's data.
     *
     * @param BulkUpdateSupportSubticketsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return SupportSubticketsCollection
     */
    public function bulkUpdate(BulkUpdateSupportSubticketsAPIRequest $request): SupportSubticketsCollection
    {
        $supportSubtickets = collect();

        $input = $request->get('data');
        foreach ($input as $key => $supportSubticketsInput) {
            $supportSubtickets[$key] = $this->supportSubticketsRepository->update($supportSubticketsInput, $supportSubticketsInput['id']);
        }

        return new SupportSubticketsCollection($supportSubtickets);
    }
}
