<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateShippingZoneMethodsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateShippingZoneMethodsAPIRequest;
use App\Http\Requests\Admin\CreateShippingZoneMethodsAPIRequest;
use App\Http\Requests\Admin\UpdateShippingZoneMethodsAPIRequest;
use App\Http\Resources\Admin\ShippingZoneMethodsCollection;
use App\Http\Resources\Admin\ShippingZoneMethodsResource;
use App\Repositories\ShippingZoneMethodsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ShippingZoneMethodsController extends AppBaseController
{
    /**
     * @var ShippingZoneMethodsRepository
     */
    private ShippingZoneMethodsRepository $shippingZoneMethodsRepository;

    /**
     * @param ShippingZoneMethodsRepository $shippingZoneMethodsRepository
     */
    public function __construct(ShippingZoneMethodsRepository $shippingZoneMethodsRepository)
    {
        $this->shippingZoneMethodsRepository = $shippingZoneMethodsRepository;
    }

    /**
     * ShippingZoneMethods's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return ShippingZoneMethodsCollection
     */
    public function index(Request $request): ShippingZoneMethodsCollection
    {
        $shippingZoneMethods = $this->shippingZoneMethodsRepository->fetch($request);

        return new ShippingZoneMethodsCollection($shippingZoneMethods);
    }

    /**
     * Create ShippingZoneMethods with given payload.
     *
     * @param CreateShippingZoneMethodsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ShippingZoneMethodsResource
     */
    public function store(CreateShippingZoneMethodsAPIRequest $request): ShippingZoneMethodsResource
    {
        $input = $request->all();
        $shippingZoneMethods = $this->shippingZoneMethodsRepository->create($input);

        return new ShippingZoneMethodsResource($shippingZoneMethods);
    }

    /**
     * Get single ShippingZoneMethods record.
     *
     * @param int $id
     *
     * @return ShippingZoneMethodsResource
     */
    public function show(int $id): ShippingZoneMethodsResource
    {
        $shippingZoneMethods = $this->shippingZoneMethodsRepository->findOrFail($id);

        return new ShippingZoneMethodsResource($shippingZoneMethods);
    }

    /**
     * Update ShippingZoneMethods with given payload.
     *
     * @param UpdateShippingZoneMethodsAPIRequest $request
     * @param int                                 $id
     *
     * @throws ValidatorException
     *
     * @return ShippingZoneMethodsResource
     */
    public function update(UpdateShippingZoneMethodsAPIRequest $request, int $id): ShippingZoneMethodsResource
    {
        $input = $request->all();
        $shippingZoneMethods = $this->shippingZoneMethodsRepository->update($input, $id);

        return new ShippingZoneMethodsResource($shippingZoneMethods);
    }

    /**
     * Delete given ShippingZoneMethods.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->shippingZoneMethodsRepository->delete($id);

        return $this->successResponse('ShippingZoneMethods deleted successfully.');
    }

    /**
     * Bulk create ShippingZoneMethods's.
     *
     * @param BulkCreateShippingZoneMethodsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ShippingZoneMethodsCollection
     */
    public function bulkStore(BulkCreateShippingZoneMethodsAPIRequest $request): ShippingZoneMethodsCollection
    {
        $shippingZoneMethods = collect();

        $input = $request->get('data');
        foreach ($input as $key => $shippingZoneMethodsInput) {
            $shippingZoneMethods[$key] = $this->shippingZoneMethodsRepository->create($shippingZoneMethodsInput);
        }

        return new ShippingZoneMethodsCollection($shippingZoneMethods);
    }

    /**
     * Bulk update ShippingZoneMethods's data.
     *
     * @param BulkUpdateShippingZoneMethodsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ShippingZoneMethodsCollection
     */
    public function bulkUpdate(BulkUpdateShippingZoneMethodsAPIRequest $request): ShippingZoneMethodsCollection
    {
        $shippingZoneMethods = collect();

        $input = $request->get('data');
        foreach ($input as $key => $shippingZoneMethodsInput) {
            $shippingZoneMethods[$key] = $this->shippingZoneMethodsRepository->update($shippingZoneMethodsInput, $shippingZoneMethodsInput['id']);
        }

        return new ShippingZoneMethodsCollection($shippingZoneMethods);
    }
}
