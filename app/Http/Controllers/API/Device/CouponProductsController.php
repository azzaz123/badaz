<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateCouponProductsAPIRequest;
use App\Http\Requests\Device\BulkUpdateCouponProductsAPIRequest;
use App\Http\Requests\Device\CreateCouponProductsAPIRequest;
use App\Http\Requests\Device\UpdateCouponProductsAPIRequest;
use App\Http\Resources\Device\CouponProductsCollection;
use App\Http\Resources\Device\CouponProductsResource;
use App\Repositories\CouponProductsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class CouponProductsController extends AppBaseController
{
    /**
     * @var CouponProductsRepository
     */
    private CouponProductsRepository $couponProductsRepository;

    /**
     * @param CouponProductsRepository $couponProductsRepository
     */
    public function __construct(CouponProductsRepository $couponProductsRepository)
    {
        $this->couponProductsRepository = $couponProductsRepository;
    }

    /**
     * CouponProducts's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return CouponProductsCollection
     */
    public function index(Request $request): CouponProductsCollection
    {
        $couponProducts = $this->couponProductsRepository->fetch($request);

        return new CouponProductsCollection($couponProducts);
    }

    /**
     * Create CouponProducts with given payload.
     *
     * @param CreateCouponProductsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CouponProductsResource
     */
    public function store(CreateCouponProductsAPIRequest $request): CouponProductsResource
    {
        $input = $request->all();
        $couponProducts = $this->couponProductsRepository->create($input);

        return new CouponProductsResource($couponProducts);
    }

    /**
     * Get single CouponProducts record.
     *
     * @param int $id
     *
     * @return CouponProductsResource
     */
    public function show(int $id): CouponProductsResource
    {
        $couponProducts = $this->couponProductsRepository->findOrFail($id);

        return new CouponProductsResource($couponProducts);
    }

    /**
     * Update CouponProducts with given payload.
     *
     * @param UpdateCouponProductsAPIRequest $request
     * @param int                            $id
     *
     * @throws ValidatorException
     *
     * @return CouponProductsResource
     */
    public function update(UpdateCouponProductsAPIRequest $request, int $id): CouponProductsResource
    {
        $input = $request->all();
        $couponProducts = $this->couponProductsRepository->update($input, $id);

        return new CouponProductsResource($couponProducts);
    }

    /**
     * Delete given CouponProducts.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->couponProductsRepository->delete($id);

        return $this->successResponse('CouponProducts deleted successfully.');
    }

    /**
     * Bulk create CouponProducts's.
     *
     * @param BulkCreateCouponProductsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CouponProductsCollection
     */
    public function bulkStore(BulkCreateCouponProductsAPIRequest $request): CouponProductsCollection
    {
        $couponProducts = collect();

        $input = $request->get('data');
        foreach ($input as $key => $couponProductsInput) {
            $couponProducts[$key] = $this->couponProductsRepository->create($couponProductsInput);
        }

        return new CouponProductsCollection($couponProducts);
    }

    /**
     * Bulk update CouponProducts's data.
     *
     * @param BulkUpdateCouponProductsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CouponProductsCollection
     */
    public function bulkUpdate(BulkUpdateCouponProductsAPIRequest $request): CouponProductsCollection
    {
        $couponProducts = collect();

        $input = $request->get('data');
        foreach ($input as $key => $couponProductsInput) {
            $couponProducts[$key] = $this->couponProductsRepository->update($couponProductsInput, $couponProductsInput['id']);
        }

        return new CouponProductsCollection($couponProducts);
    }
}
