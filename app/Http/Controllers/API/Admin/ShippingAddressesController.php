<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateShippingAddressesAPIRequest;
use App\Http\Requests\Admin\BulkUpdateShippingAddressesAPIRequest;
use App\Http\Requests\Admin\CreateShippingAddressesAPIRequest;
use App\Http\Requests\Admin\UpdateShippingAddressesAPIRequest;
use App\Http\Resources\Admin\ShippingAddressesCollection;
use App\Http\Resources\Admin\ShippingAddressesResource;
use App\Repositories\ShippingAddressesRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ShippingAddressesController extends AppBaseController
{
    /**
     * @var ShippingAddressesRepository
     */
    private ShippingAddressesRepository $shippingAddressesRepository;

    /**
     * @param ShippingAddressesRepository $shippingAddressesRepository
     */
    public function __construct(ShippingAddressesRepository $shippingAddressesRepository)
    {
        $this->shippingAddressesRepository = $shippingAddressesRepository;
    }

    /**
     * ShippingAddresses's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return ShippingAddressesCollection
     */
    public function index(Request $request): ShippingAddressesCollection
    {
        $shippingAddresses = $this->shippingAddressesRepository->fetch($request);

        return new ShippingAddressesCollection($shippingAddresses);
    }

    /**
     * Create ShippingAddresses with given payload.
     *
     * @param CreateShippingAddressesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ShippingAddressesResource
     */
    public function store(CreateShippingAddressesAPIRequest $request): ShippingAddressesResource
    {
        $input = $request->all();
        $shippingAddresses = $this->shippingAddressesRepository->create($input);

        return new ShippingAddressesResource($shippingAddresses);
    }

    /**
     * Get single ShippingAddresses record.
     *
     * @param int $id
     *
     * @return ShippingAddressesResource
     */
    public function show(int $id): ShippingAddressesResource
    {
        $shippingAddresses = $this->shippingAddressesRepository->findOrFail($id);

        return new ShippingAddressesResource($shippingAddresses);
    }

    /**
     * Update ShippingAddresses with given payload.
     *
     * @param UpdateShippingAddressesAPIRequest $request
     * @param int                               $id
     *
     * @throws ValidatorException
     *
     * @return ShippingAddressesResource
     */
    public function update(UpdateShippingAddressesAPIRequest $request, int $id): ShippingAddressesResource
    {
        $input = $request->all();
        $shippingAddresses = $this->shippingAddressesRepository->update($input, $id);

        return new ShippingAddressesResource($shippingAddresses);
    }

    /**
     * Delete given ShippingAddresses.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->shippingAddressesRepository->delete($id);

        return $this->successResponse('ShippingAddresses deleted successfully.');
    }

    /**
     * Bulk create ShippingAddresses's.
     *
     * @param BulkCreateShippingAddressesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ShippingAddressesCollection
     */
    public function bulkStore(BulkCreateShippingAddressesAPIRequest $request): ShippingAddressesCollection
    {
        $shippingAddresses = collect();

        $input = $request->get('data');
        foreach ($input as $key => $shippingAddressesInput) {
            $shippingAddresses[$key] = $this->shippingAddressesRepository->create($shippingAddressesInput);
        }

        return new ShippingAddressesCollection($shippingAddresses);
    }

    /**
     * Bulk update ShippingAddresses's data.
     *
     * @param BulkUpdateShippingAddressesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ShippingAddressesCollection
     */
    public function bulkUpdate(BulkUpdateShippingAddressesAPIRequest $request): ShippingAddressesCollection
    {
        $shippingAddresses = collect();

        $input = $request->get('data');
        foreach ($input as $key => $shippingAddressesInput) {
            $shippingAddresses[$key] = $this->shippingAddressesRepository->update($shippingAddressesInput, $shippingAddressesInput['id']);
        }

        return new ShippingAddressesCollection($shippingAddresses);
    }
}
