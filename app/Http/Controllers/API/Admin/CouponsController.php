<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateCouponsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateCouponsAPIRequest;
use App\Http\Requests\Admin\CreateCouponsAPIRequest;
use App\Http\Requests\Admin\UpdateCouponsAPIRequest;
use App\Http\Resources\Admin\CouponsCollection;
use App\Http\Resources\Admin\CouponsResource;
use App\Repositories\CouponsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class CouponsController extends AppBaseController
{
    /**
     * @var CouponsRepository
     */
    private CouponsRepository $couponsRepository;

    /**
     * @param CouponsRepository $couponsRepository
     */
    public function __construct(CouponsRepository $couponsRepository)
    {
        $this->couponsRepository = $couponsRepository;
    }

    /**
     * Coupons's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return CouponsCollection
     */
    public function index(Request $request): CouponsCollection
    {
        $coupons = $this->couponsRepository->fetch($request);

        return new CouponsCollection($coupons);
    }

    /**
     * Create Coupons with given payload.
     *
     * @param CreateCouponsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CouponsResource
     */
    public function store(CreateCouponsAPIRequest $request): CouponsResource
    {
        $input = $request->all();
        $coupons = $this->couponsRepository->create($input);

        return new CouponsResource($coupons);
    }

    /**
     * Get single Coupons record.
     *
     * @param int $id
     *
     * @return CouponsResource
     */
    public function show(int $id): CouponsResource
    {
        $coupons = $this->couponsRepository->findOrFail($id);

        return new CouponsResource($coupons);
    }

    /**
     * Update Coupons with given payload.
     *
     * @param UpdateCouponsAPIRequest $request
     * @param int                     $id
     *
     * @throws ValidatorException
     *
     * @return CouponsResource
     */
    public function update(UpdateCouponsAPIRequest $request, int $id): CouponsResource
    {
        $input = $request->all();
        $coupons = $this->couponsRepository->update($input, $id);

        return new CouponsResource($coupons);
    }

    /**
     * Delete given Coupons.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->couponsRepository->delete($id);

        return $this->successResponse('Coupons deleted successfully.');
    }

    /**
     * Bulk create Coupons's.
     *
     * @param BulkCreateCouponsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CouponsCollection
     */
    public function bulkStore(BulkCreateCouponsAPIRequest $request): CouponsCollection
    {
        $coupons = collect();

        $input = $request->get('data');
        foreach ($input as $key => $couponsInput) {
            $coupons[$key] = $this->couponsRepository->create($couponsInput);
        }

        return new CouponsCollection($coupons);
    }

    /**
     * Bulk update Coupons's data.
     *
     * @param BulkUpdateCouponsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CouponsCollection
     */
    public function bulkUpdate(BulkUpdateCouponsAPIRequest $request): CouponsCollection
    {
        $coupons = collect();

        $input = $request->get('data');
        foreach ($input as $key => $couponsInput) {
            $coupons[$key] = $this->couponsRepository->update($couponsInput, $couponsInput['id']);
        }

        return new CouponsCollection($coupons);
    }
}
