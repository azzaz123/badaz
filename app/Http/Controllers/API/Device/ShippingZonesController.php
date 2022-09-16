<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateShippingZonesAPIRequest;
use App\Http\Requests\Device\BulkUpdateShippingZonesAPIRequest;
use App\Http\Requests\Device\CreateShippingZonesAPIRequest;
use App\Http\Requests\Device\UpdateShippingZonesAPIRequest;
use App\Http\Resources\Device\ShippingZonesCollection;
use App\Http\Resources\Device\ShippingZonesResource;
use App\Repositories\ShippingZonesRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ShippingZonesController extends AppBaseController
{
    /**
     * @var ShippingZonesRepository
     */
    private ShippingZonesRepository $shippingZonesRepository;

    /**
     * @param ShippingZonesRepository $shippingZonesRepository
     */
    public function __construct(ShippingZonesRepository $shippingZonesRepository)
    {
        $this->shippingZonesRepository = $shippingZonesRepository;
    }

    /**
     * ShippingZones's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return ShippingZonesCollection
     */
    public function index(Request $request): ShippingZonesCollection
    {
        $shippingZones = $this->shippingZonesRepository->fetch($request);

        return new ShippingZonesCollection($shippingZones);
    }

    /**
     * Create ShippingZones with given payload.
     *
     * @param CreateShippingZonesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ShippingZonesResource
     */
    public function store(CreateShippingZonesAPIRequest $request): ShippingZonesResource
    {
        $input = $request->all();
        $shippingZones = $this->shippingZonesRepository->create($input);

        return new ShippingZonesResource($shippingZones);
    }

    /**
     * Get single ShippingZones record.
     *
     * @param int $id
     *
     * @return ShippingZonesResource
     */
    public function show(int $id): ShippingZonesResource
    {
        $shippingZones = $this->shippingZonesRepository->findOrFail($id);

        return new ShippingZonesResource($shippingZones);
    }

    /**
     * Update ShippingZones with given payload.
     *
     * @param UpdateShippingZonesAPIRequest $request
     * @param int                           $id
     *
     * @throws ValidatorException
     *
     * @return ShippingZonesResource
     */
    public function update(UpdateShippingZonesAPIRequest $request, int $id): ShippingZonesResource
    {
        $input = $request->all();
        $shippingZones = $this->shippingZonesRepository->update($input, $id);

        return new ShippingZonesResource($shippingZones);
    }

    /**
     * Delete given ShippingZones.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->shippingZonesRepository->delete($id);

        return $this->successResponse('ShippingZones deleted successfully.');
    }

    /**
     * Bulk create ShippingZones's.
     *
     * @param BulkCreateShippingZonesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ShippingZonesCollection
     */
    public function bulkStore(BulkCreateShippingZonesAPIRequest $request): ShippingZonesCollection
    {
        $shippingZones = collect();

        $input = $request->get('data');
        foreach ($input as $key => $shippingZonesInput) {
            $shippingZones[$key] = $this->shippingZonesRepository->create($shippingZonesInput);
        }

        return new ShippingZonesCollection($shippingZones);
    }

    /**
     * Bulk update ShippingZones's data.
     *
     * @param BulkUpdateShippingZonesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ShippingZonesCollection
     */
    public function bulkUpdate(BulkUpdateShippingZonesAPIRequest $request): ShippingZonesCollection
    {
        $shippingZones = collect();

        $input = $request->get('data');
        foreach ($input as $key => $shippingZonesInput) {
            $shippingZones[$key] = $this->shippingZonesRepository->update($shippingZonesInput, $shippingZonesInput['id']);
        }

        return new ShippingZonesCollection($shippingZones);
    }
}
