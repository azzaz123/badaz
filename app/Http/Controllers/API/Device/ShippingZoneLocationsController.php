<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateShippingZoneLocationsAPIRequest;
use App\Http\Requests\Device\BulkUpdateShippingZoneLocationsAPIRequest;
use App\Http\Requests\Device\CreateShippingZoneLocationsAPIRequest;
use App\Http\Requests\Device\UpdateShippingZoneLocationsAPIRequest;
use App\Http\Resources\Device\ShippingZoneLocationsCollection;
use App\Http\Resources\Device\ShippingZoneLocationsResource;
use App\Repositories\ShippingZoneLocationsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ShippingZoneLocationsController extends AppBaseController
{
    /**
     * @var ShippingZoneLocationsRepository
     */
    private ShippingZoneLocationsRepository $shippingZoneLocationsRepository;

    /**
     * @param ShippingZoneLocationsRepository $shippingZoneLocationsRepository
     */
    public function __construct(ShippingZoneLocationsRepository $shippingZoneLocationsRepository)
    {
        $this->shippingZoneLocationsRepository = $shippingZoneLocationsRepository;
    }

    /**
     * ShippingZoneLocations's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return ShippingZoneLocationsCollection
     */
    public function index(Request $request): ShippingZoneLocationsCollection
    {
        $shippingZoneLocations = $this->shippingZoneLocationsRepository->fetch($request);

        return new ShippingZoneLocationsCollection($shippingZoneLocations);
    }

    /**
     * Create ShippingZoneLocations with given payload.
     *
     * @param CreateShippingZoneLocationsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ShippingZoneLocationsResource
     */
    public function store(CreateShippingZoneLocationsAPIRequest $request): ShippingZoneLocationsResource
    {
        $input = $request->all();
        $shippingZoneLocations = $this->shippingZoneLocationsRepository->create($input);

        return new ShippingZoneLocationsResource($shippingZoneLocations);
    }

    /**
     * Get single ShippingZoneLocations record.
     *
     * @param int $id
     *
     * @return ShippingZoneLocationsResource
     */
    public function show(int $id): ShippingZoneLocationsResource
    {
        $shippingZoneLocations = $this->shippingZoneLocationsRepository->findOrFail($id);

        return new ShippingZoneLocationsResource($shippingZoneLocations);
    }

    /**
     * Update ShippingZoneLocations with given payload.
     *
     * @param UpdateShippingZoneLocationsAPIRequest $request
     * @param int                                   $id
     *
     * @throws ValidatorException
     *
     * @return ShippingZoneLocationsResource
     */
    public function update(UpdateShippingZoneLocationsAPIRequest $request, int $id): ShippingZoneLocationsResource
    {
        $input = $request->all();
        $shippingZoneLocations = $this->shippingZoneLocationsRepository->update($input, $id);

        return new ShippingZoneLocationsResource($shippingZoneLocations);
    }

    /**
     * Delete given ShippingZoneLocations.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->shippingZoneLocationsRepository->delete($id);

        return $this->successResponse('ShippingZoneLocations deleted successfully.');
    }

    /**
     * Bulk create ShippingZoneLocations's.
     *
     * @param BulkCreateShippingZoneLocationsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ShippingZoneLocationsCollection
     */
    public function bulkStore(BulkCreateShippingZoneLocationsAPIRequest $request): ShippingZoneLocationsCollection
    {
        $shippingZoneLocations = collect();

        $input = $request->get('data');
        foreach ($input as $key => $shippingZoneLocationsInput) {
            $shippingZoneLocations[$key] = $this->shippingZoneLocationsRepository->create($shippingZoneLocationsInput);
        }

        return new ShippingZoneLocationsCollection($shippingZoneLocations);
    }

    /**
     * Bulk update ShippingZoneLocations's data.
     *
     * @param BulkUpdateShippingZoneLocationsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ShippingZoneLocationsCollection
     */
    public function bulkUpdate(BulkUpdateShippingZoneLocationsAPIRequest $request): ShippingZoneLocationsCollection
    {
        $shippingZoneLocations = collect();

        $input = $request->get('data');
        foreach ($input as $key => $shippingZoneLocationsInput) {
            $shippingZoneLocations[$key] = $this->shippingZoneLocationsRepository->update($shippingZoneLocationsInput, $shippingZoneLocationsInput['id']);
        }

        return new ShippingZoneLocationsCollection($shippingZoneLocations);
    }
}
