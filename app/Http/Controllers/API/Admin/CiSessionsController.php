<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateCiSessionsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateCiSessionsAPIRequest;
use App\Http\Requests\Admin\CreateCiSessionsAPIRequest;
use App\Http\Requests\Admin\UpdateCiSessionsAPIRequest;
use App\Http\Resources\Admin\CiSessionsCollection;
use App\Http\Resources\Admin\CiSessionsResource;
use App\Repositories\CiSessionsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class CiSessionsController extends AppBaseController
{
    /**
     * @var CiSessionsRepository
     */
    private CiSessionsRepository $ciSessionsRepository;

    /**
     * @param CiSessionsRepository $ciSessionsRepository
     */
    public function __construct(CiSessionsRepository $ciSessionsRepository)
    {
        $this->ciSessionsRepository = $ciSessionsRepository;
    }

    /**
     * CiSessions's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return CiSessionsCollection
     */
    public function index(Request $request): CiSessionsCollection
    {
        $ciSessions = $this->ciSessionsRepository->fetch($request);

        return new CiSessionsCollection($ciSessions);
    }

    /**
     * Create CiSessions with given payload.
     *
     * @param CreateCiSessionsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CiSessionsResource
     */
    public function store(CreateCiSessionsAPIRequest $request): CiSessionsResource
    {
        $input = $request->all();
        $ciSessions = $this->ciSessionsRepository->create($input);

        return new CiSessionsResource($ciSessions);
    }

    /**
     * Get single CiSessions record.
     *
     * @param int $id
     *
     * @return CiSessionsResource
     */
    public function show(int $id): CiSessionsResource
    {
        $ciSessions = $this->ciSessionsRepository->findOrFail($id);

        return new CiSessionsResource($ciSessions);
    }

    /**
     * Update CiSessions with given payload.
     *
     * @param UpdateCiSessionsAPIRequest $request
     * @param int                        $id
     *
     * @throws ValidatorException
     *
     * @return CiSessionsResource
     */
    public function update(UpdateCiSessionsAPIRequest $request, int $id): CiSessionsResource
    {
        $input = $request->all();
        $ciSessions = $this->ciSessionsRepository->update($input, $id);

        return new CiSessionsResource($ciSessions);
    }

    /**
     * Delete given CiSessions.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->ciSessionsRepository->delete($id);

        return $this->successResponse('CiSessions deleted successfully.');
    }

    /**
     * Bulk create CiSessions's.
     *
     * @param BulkCreateCiSessionsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CiSessionsCollection
     */
    public function bulkStore(BulkCreateCiSessionsAPIRequest $request): CiSessionsCollection
    {
        $ciSessions = collect();

        $input = $request->get('data');
        foreach ($input as $key => $ciSessionsInput) {
            $ciSessions[$key] = $this->ciSessionsRepository->create($ciSessionsInput);
        }

        return new CiSessionsCollection($ciSessions);
    }

    /**
     * Bulk update CiSessions's data.
     *
     * @param BulkUpdateCiSessionsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CiSessionsCollection
     */
    public function bulkUpdate(BulkUpdateCiSessionsAPIRequest $request): CiSessionsCollection
    {
        $ciSessions = collect();

        $input = $request->get('data');
        foreach ($input as $key => $ciSessionsInput) {
            $ciSessions[$key] = $this->ciSessionsRepository->update($ciSessionsInput, $ciSessionsInput['id']);
        }

        return new CiSessionsCollection($ciSessions);
    }
}
