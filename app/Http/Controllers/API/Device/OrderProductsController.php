<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateOrderProductsAPIRequest;
use App\Http\Requests\Device\BulkUpdateOrderProductsAPIRequest;
use App\Http\Requests\Device\CreateOrderProductsAPIRequest;
use App\Http\Requests\Device\UpdateOrderProductsAPIRequest;
use App\Http\Resources\Device\OrderProductsCollection;
use App\Http\Resources\Device\OrderProductsResource;
use App\Repositories\OrderProductsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class OrderProductsController extends AppBaseController
{
    /**
     * @var OrderProductsRepository
     */
    private OrderProductsRepository $orderProductsRepository;

    /**
     * @param OrderProductsRepository $orderProductsRepository
     */
    public function __construct(OrderProductsRepository $orderProductsRepository)
    {
        $this->orderProductsRepository = $orderProductsRepository;
    }

    /**
     * OrderProducts's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return OrderProductsCollection
     */
    public function index(Request $request): OrderProductsCollection
    {
        $orderProducts = $this->orderProductsRepository->fetch($request);

        return new OrderProductsCollection($orderProducts);
    }

    /**
     * Create OrderProducts with given payload.
     *
     * @param CreateOrderProductsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return OrderProductsResource
     */
    public function store(CreateOrderProductsAPIRequest $request): OrderProductsResource
    {
        $input = $request->all();
        $orderProducts = $this->orderProductsRepository->create($input);

        return new OrderProductsResource($orderProducts);
    }

    /**
     * Get single OrderProducts record.
     *
     * @param int $id
     *
     * @return OrderProductsResource
     */
    public function show(int $id): OrderProductsResource
    {
        $orderProducts = $this->orderProductsRepository->findOrFail($id);

        return new OrderProductsResource($orderProducts);
    }

    /**
     * Update OrderProducts with given payload.
     *
     * @param UpdateOrderProductsAPIRequest $request
     * @param int                           $id
     *
     * @throws ValidatorException
     *
     * @return OrderProductsResource
     */
    public function update(UpdateOrderProductsAPIRequest $request, int $id): OrderProductsResource
    {
        $input = $request->all();
        $orderProducts = $this->orderProductsRepository->update($input, $id);

        return new OrderProductsResource($orderProducts);
    }

    /**
     * Delete given OrderProducts.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->orderProductsRepository->delete($id);

        return $this->successResponse('OrderProducts deleted successfully.');
    }

    /**
     * Bulk create OrderProducts's.
     *
     * @param BulkCreateOrderProductsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return OrderProductsCollection
     */
    public function bulkStore(BulkCreateOrderProductsAPIRequest $request): OrderProductsCollection
    {
        $orderProducts = collect();

        $input = $request->get('data');
        foreach ($input as $key => $orderProductsInput) {
            $orderProducts[$key] = $this->orderProductsRepository->create($orderProductsInput);
        }

        return new OrderProductsCollection($orderProducts);
    }

    /**
     * Bulk update OrderProducts's data.
     *
     * @param BulkUpdateOrderProductsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return OrderProductsCollection
     */
    public function bulkUpdate(BulkUpdateOrderProductsAPIRequest $request): OrderProductsCollection
    {
        $orderProducts = collect();

        $input = $request->get('data');
        foreach ($input as $key => $orderProductsInput) {
            $orderProducts[$key] = $this->orderProductsRepository->update($orderProductsInput, $orderProductsInput['id']);
        }

        return new OrderProductsCollection($orderProducts);
    }
}
