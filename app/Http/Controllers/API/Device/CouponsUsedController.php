<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateCouponsUsedAPIRequest;
use App\Http\Requests\Device\BulkUpdateCouponsUsedAPIRequest;
use App\Http\Requests\Device\CreateCouponsUsedAPIRequest;
use App\Http\Requests\Device\UpdateCouponsUsedAPIRequest;
use App\Http\Resources\Device\CouponsUsedCollection;
use App\Http\Resources\Device\CouponsUsedResource;
use App\Repositories\CouponsUsedRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class CouponsUsedController extends AppBaseController
{
    /**
     * @var CouponsUsedRepository
     */
    private CouponsUsedRepository $couponsUsedRepository;

    /**
     * @param CouponsUsedRepository $couponsUsedRepository
     */
    public function __construct(CouponsUsedRepository $couponsUsedRepository)
    {
        $this->couponsUsedRepository = $couponsUsedRepository;
    }

    /**
     * CouponsUsed's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return CouponsUsedCollection
     */
    public function index(Request $request): CouponsUsedCollection
    {
        $couponsUseds = $this->couponsUsedRepository->fetch($request);

        return new CouponsUsedCollection($couponsUseds);
    }

    /**
     * Create CouponsUsed with given payload.
     *
     * @param CreateCouponsUsedAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CouponsUsedResource
     */
    public function store(CreateCouponsUsedAPIRequest $request): CouponsUsedResource
    {
        $input = $request->all();
        $couponsUsed = $this->couponsUsedRepository->create($input);

        return new CouponsUsedResource($couponsUsed);
    }

    /**
     * Get single CouponsUsed record.
     *
     * @param int $id
     *
     * @return CouponsUsedResource
     */
    public function show(int $id): CouponsUsedResource
    {
        $couponsUsed = $this->couponsUsedRepository->findOrFail($id);

        return new CouponsUsedResource($couponsUsed);
    }

    /**
     * Update CouponsUsed with given payload.
     *
     * @param UpdateCouponsUsedAPIRequest $request
     * @param int                         $id
     *
     * @throws ValidatorException
     *
     * @return CouponsUsedResource
     */
    public function update(UpdateCouponsUsedAPIRequest $request, int $id): CouponsUsedResource
    {
        $input = $request->all();
        $couponsUsed = $this->couponsUsedRepository->update($input, $id);

        return new CouponsUsedResource($couponsUsed);
    }

    /**
     * Delete given CouponsUsed.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->couponsUsedRepository->delete($id);

        return $this->successResponse('CouponsUsed deleted successfully.');
    }

    /**
     * Bulk create CouponsUsed's.
     *
     * @param BulkCreateCouponsUsedAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CouponsUsedCollection
     */
    public function bulkStore(BulkCreateCouponsUsedAPIRequest $request): CouponsUsedCollection
    {
        $couponsUseds = collect();

        $input = $request->get('data');
        foreach ($input as $key => $couponsUsedInput) {
            $couponsUseds[$key] = $this->couponsUsedRepository->create($couponsUsedInput);
        }

        return new CouponsUsedCollection($couponsUseds);
    }

    /**
     * Bulk update CouponsUsed's data.
     *
     * @param BulkUpdateCouponsUsedAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CouponsUsedCollection
     */
    public function bulkUpdate(BulkUpdateCouponsUsedAPIRequest $request): CouponsUsedCollection
    {
        $couponsUseds = collect();

        $input = $request->get('data');
        foreach ($input as $key => $couponsUsedInput) {
            $couponsUseds[$key] = $this->couponsUsedRepository->update($couponsUsedInput, $couponsUsedInput['id']);
        }

        return new CouponsUsedCollection($couponsUseds);
    }
}
