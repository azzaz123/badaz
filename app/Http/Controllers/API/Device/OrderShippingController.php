<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateOrderShippingAPIRequest;
use App\Http\Requests\Device\BulkUpdateOrderShippingAPIRequest;
use App\Http\Requests\Device\CreateOrderShippingAPIRequest;
use App\Http\Requests\Device\UpdateOrderShippingAPIRequest;
use App\Http\Resources\Device\OrderShippingCollection;
use App\Http\Resources\Device\OrderShippingResource;
use App\Repositories\OrderShippingRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class OrderShippingController extends AppBaseController
{
    /**
     * @var OrderShippingRepository
     */
    private OrderShippingRepository $orderShippingRepository;

    /**
     * @param OrderShippingRepository $orderShippingRepository
     */
    public function __construct(OrderShippingRepository $orderShippingRepository)
    {
        $this->orderShippingRepository = $orderShippingRepository;
    }

    /**
     * OrderShipping's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return OrderShippingCollection
     */
    public function index(Request $request): OrderShippingCollection
    {
        $orderShippings = $this->orderShippingRepository->fetch($request);

        return new OrderShippingCollection($orderShippings);
    }

    /**
     * Create OrderShipping with given payload.
     *
     * @param CreateOrderShippingAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return OrderShippingResource
     */
    public function store(CreateOrderShippingAPIRequest $request): OrderShippingResource
    {
        $input = $request->all();
        $orderShipping = $this->orderShippingRepository->create($input);

        return new OrderShippingResource($orderShipping);
    }

    /**
     * Get single OrderShipping record.
     *
     * @param int $id
     *
     * @return OrderShippingResource
     */
    public function show(int $id): OrderShippingResource
    {
        $orderShipping = $this->orderShippingRepository->findOrFail($id);

        return new OrderShippingResource($orderShipping);
    }

    /**
     * Update OrderShipping with given payload.
     *
     * @param UpdateOrderShippingAPIRequest $request
     * @param int                           $id
     *
     * @throws ValidatorException
     *
     * @return OrderShippingResource
     */
    public function update(UpdateOrderShippingAPIRequest $request, int $id): OrderShippingResource
    {
        $input = $request->all();
        $orderShipping = $this->orderShippingRepository->update($input, $id);

        return new OrderShippingResource($orderShipping);
    }

    /**
     * Delete given OrderShipping.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->orderShippingRepository->delete($id);

        return $this->successResponse('OrderShipping deleted successfully.');
    }

    /**
     * Bulk create OrderShipping's.
     *
     * @param BulkCreateOrderShippingAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return OrderShippingCollection
     */
    public function bulkStore(BulkCreateOrderShippingAPIRequest $request): OrderShippingCollection
    {
        $orderShippings = collect();

        $input = $request->get('data');
        foreach ($input as $key => $orderShippingInput) {
            $orderShippings[$key] = $this->orderShippingRepository->create($orderShippingInput);
        }

        return new OrderShippingCollection($orderShippings);
    }

    /**
     * Bulk update OrderShipping's data.
     *
     * @param BulkUpdateOrderShippingAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return OrderShippingCollection
     */
    public function bulkUpdate(BulkUpdateOrderShippingAPIRequest $request): OrderShippingCollection
    {
        $orderShippings = collect();

        $input = $request->get('data');
        foreach ($input as $key => $orderShippingInput) {
            $orderShippings[$key] = $this->orderShippingRepository->update($orderShippingInput, $orderShippingInput['id']);
        }

        return new OrderShippingCollection($orderShippings);
    }
}
