<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateShippingDeliveryTimesAPIRequest;
use App\Http\Requests\Device\BulkUpdateShippingDeliveryTimesAPIRequest;
use App\Http\Requests\Device\CreateShippingDeliveryTimesAPIRequest;
use App\Http\Requests\Device\UpdateShippingDeliveryTimesAPIRequest;
use App\Http\Resources\Device\ShippingDeliveryTimesCollection;
use App\Http\Resources\Device\ShippingDeliveryTimesResource;
use App\Repositories\ShippingDeliveryTimesRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ShippingDeliveryTimesController extends AppBaseController
{
    /**
     * @var ShippingDeliveryTimesRepository
     */
    private ShippingDeliveryTimesRepository $shippingDeliveryTimesRepository;

    /**
     * @param ShippingDeliveryTimesRepository $shippingDeliveryTimesRepository
     */
    public function __construct(ShippingDeliveryTimesRepository $shippingDeliveryTimesRepository)
    {
        $this->shippingDeliveryTimesRepository = $shippingDeliveryTimesRepository;
    }

    /**
     * ShippingDeliveryTimes's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return ShippingDeliveryTimesCollection
     */
    public function index(Request $request): ShippingDeliveryTimesCollection
    {
        $shippingDeliveryTimes = $this->shippingDeliveryTimesRepository->fetch($request);

        return new ShippingDeliveryTimesCollection($shippingDeliveryTimes);
    }

    /**
     * Create ShippingDeliveryTimes with given payload.
     *
     * @param CreateShippingDeliveryTimesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ShippingDeliveryTimesResource
     */
    public function store(CreateShippingDeliveryTimesAPIRequest $request): ShippingDeliveryTimesResource
    {
        $input = $request->all();
        $shippingDeliveryTimes = $this->shippingDeliveryTimesRepository->create($input);

        return new ShippingDeliveryTimesResource($shippingDeliveryTimes);
    }

    /**
     * Get single ShippingDeliveryTimes record.
     *
     * @param int $id
     *
     * @return ShippingDeliveryTimesResource
     */
    public function show(int $id): ShippingDeliveryTimesResource
    {
        $shippingDeliveryTimes = $this->shippingDeliveryTimesRepository->findOrFail($id);

        return new ShippingDeliveryTimesResource($shippingDeliveryTimes);
    }

    /**
     * Update ShippingDeliveryTimes with given payload.
     *
     * @param UpdateShippingDeliveryTimesAPIRequest $request
     * @param int                                   $id
     *
     * @throws ValidatorException
     *
     * @return ShippingDeliveryTimesResource
     */
    public function update(UpdateShippingDeliveryTimesAPIRequest $request, int $id): ShippingDeliveryTimesResource
    {
        $input = $request->all();
        $shippingDeliveryTimes = $this->shippingDeliveryTimesRepository->update($input, $id);

        return new ShippingDeliveryTimesResource($shippingDeliveryTimes);
    }

    /**
     * Delete given ShippingDeliveryTimes.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->shippingDeliveryTimesRepository->delete($id);

        return $this->successResponse('ShippingDeliveryTimes deleted successfully.');
    }

    /**
     * Bulk create ShippingDeliveryTimes's.
     *
     * @param BulkCreateShippingDeliveryTimesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ShippingDeliveryTimesCollection
     */
    public function bulkStore(BulkCreateShippingDeliveryTimesAPIRequest $request): ShippingDeliveryTimesCollection
    {
        $shippingDeliveryTimes = collect();

        $input = $request->get('data');
        foreach ($input as $key => $shippingDeliveryTimesInput) {
            $shippingDeliveryTimes[$key] = $this->shippingDeliveryTimesRepository->create($shippingDeliveryTimesInput);
        }

        return new ShippingDeliveryTimesCollection($shippingDeliveryTimes);
    }

    /**
     * Bulk update ShippingDeliveryTimes's data.
     *
     * @param BulkUpdateShippingDeliveryTimesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ShippingDeliveryTimesCollection
     */
    public function bulkUpdate(BulkUpdateShippingDeliveryTimesAPIRequest $request): ShippingDeliveryTimesCollection
    {
        $shippingDeliveryTimes = collect();

        $input = $request->get('data');
        foreach ($input as $key => $shippingDeliveryTimesInput) {
            $shippingDeliveryTimes[$key] = $this->shippingDeliveryTimesRepository->update($shippingDeliveryTimesInput, $shippingDeliveryTimesInput['id']);
        }

        return new ShippingDeliveryTimesCollection($shippingDeliveryTimes);
    }
}
