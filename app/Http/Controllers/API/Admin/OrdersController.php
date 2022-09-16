<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateOrdersAPIRequest;
use App\Http\Requests\Admin\BulkUpdateOrdersAPIRequest;
use App\Http\Requests\Admin\CreateOrdersAPIRequest;
use App\Http\Requests\Admin\UpdateOrdersAPIRequest;
use App\Http\Resources\Admin\OrdersCollection;
use App\Http\Resources\Admin\OrdersResource;
use App\Repositories\OrdersRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class OrdersController extends AppBaseController
{
    /**
     * @var OrdersRepository
     */
    private OrdersRepository $ordersRepository;

    /**
     * @param OrdersRepository $ordersRepository
     */
    public function __construct(OrdersRepository $ordersRepository)
    {
        $this->ordersRepository = $ordersRepository;
    }

    /**
     * Orders's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return OrdersCollection
     */
    public function index(Request $request): OrdersCollection
    {
        $orders = $this->ordersRepository->fetch($request);

        return new OrdersCollection($orders);
    }

    /**
     * Create Orders with given payload.
     *
     * @param CreateOrdersAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return OrdersResource
     */
    public function store(CreateOrdersAPIRequest $request): OrdersResource
    {
        $input = $request->all();
        $orders = $this->ordersRepository->create($input);

        return new OrdersResource($orders);
    }

    /**
     * Get single Orders record.
     *
     * @param int $id
     *
     * @return OrdersResource
     */
    public function show(int $id): OrdersResource
    {
        $orders = $this->ordersRepository->findOrFail($id);

        return new OrdersResource($orders);
    }

    /**
     * Update Orders with given payload.
     *
     * @param UpdateOrdersAPIRequest $request
     * @param int                    $id
     *
     * @throws ValidatorException
     *
     * @return OrdersResource
     */
    public function update(UpdateOrdersAPIRequest $request, int $id): OrdersResource
    {
        $input = $request->all();
        $orders = $this->ordersRepository->update($input, $id);

        return new OrdersResource($orders);
    }

    /**
     * Delete given Orders.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->ordersRepository->delete($id);

        return $this->successResponse('Orders deleted successfully.');
    }

    /**
     * Bulk create Orders's.
     *
     * @param BulkCreateOrdersAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return OrdersCollection
     */
    public function bulkStore(BulkCreateOrdersAPIRequest $request): OrdersCollection
    {
        $orders = collect();

        $input = $request->get('data');
        foreach ($input as $key => $ordersInput) {
            $orders[$key] = $this->ordersRepository->create($ordersInput);
        }

        return new OrdersCollection($orders);
    }

    /**
     * Bulk update Orders's data.
     *
     * @param BulkUpdateOrdersAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return OrdersCollection
     */
    public function bulkUpdate(BulkUpdateOrdersAPIRequest $request): OrdersCollection
    {
        $orders = collect();

        $input = $request->get('data');
        foreach ($input as $key => $ordersInput) {
            $orders[$key] = $this->ordersRepository->update($ordersInput, $ordersInput['id']);
        }

        return new OrdersCollection($orders);
    }
}
