<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateShippingClassesAPIRequest;
use App\Http\Requests\Admin\BulkUpdateShippingClassesAPIRequest;
use App\Http\Requests\Admin\CreateShippingClassesAPIRequest;
use App\Http\Requests\Admin\UpdateShippingClassesAPIRequest;
use App\Http\Resources\Admin\ShippingClassesCollection;
use App\Http\Resources\Admin\ShippingClassesResource;
use App\Repositories\ShippingClassesRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ShippingClassesController extends AppBaseController
{
    /**
     * @var ShippingClassesRepository
     */
    private ShippingClassesRepository $shippingClassesRepository;

    /**
     * @param ShippingClassesRepository $shippingClassesRepository
     */
    public function __construct(ShippingClassesRepository $shippingClassesRepository)
    {
        $this->shippingClassesRepository = $shippingClassesRepository;
    }

    /**
     * ShippingClasses's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return ShippingClassesCollection
     */
    public function index(Request $request): ShippingClassesCollection
    {
        $shippingClasses = $this->shippingClassesRepository->fetch($request);

        return new ShippingClassesCollection($shippingClasses);
    }

    /**
     * Create ShippingClasses with given payload.
     *
     * @param CreateShippingClassesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ShippingClassesResource
     */
    public function store(CreateShippingClassesAPIRequest $request): ShippingClassesResource
    {
        $input = $request->all();
        $shippingClasses = $this->shippingClassesRepository->create($input);

        return new ShippingClassesResource($shippingClasses);
    }

    /**
     * Get single ShippingClasses record.
     *
     * @param int $id
     *
     * @return ShippingClassesResource
     */
    public function show(int $id): ShippingClassesResource
    {
        $shippingClasses = $this->shippingClassesRepository->findOrFail($id);

        return new ShippingClassesResource($shippingClasses);
    }

    /**
     * Update ShippingClasses with given payload.
     *
     * @param UpdateShippingClassesAPIRequest $request
     * @param int                             $id
     *
     * @throws ValidatorException
     *
     * @return ShippingClassesResource
     */
    public function update(UpdateShippingClassesAPIRequest $request, int $id): ShippingClassesResource
    {
        $input = $request->all();
        $shippingClasses = $this->shippingClassesRepository->update($input, $id);

        return new ShippingClassesResource($shippingClasses);
    }

    /**
     * Delete given ShippingClasses.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->shippingClassesRepository->delete($id);

        return $this->successResponse('ShippingClasses deleted successfully.');
    }

    /**
     * Bulk create ShippingClasses's.
     *
     * @param BulkCreateShippingClassesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ShippingClassesCollection
     */
    public function bulkStore(BulkCreateShippingClassesAPIRequest $request): ShippingClassesCollection
    {
        $shippingClasses = collect();

        $input = $request->get('data');
        foreach ($input as $key => $shippingClassesInput) {
            $shippingClasses[$key] = $this->shippingClassesRepository->create($shippingClassesInput);
        }

        return new ShippingClassesCollection($shippingClasses);
    }

    /**
     * Bulk update ShippingClasses's data.
     *
     * @param BulkUpdateShippingClassesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ShippingClassesCollection
     */
    public function bulkUpdate(BulkUpdateShippingClassesAPIRequest $request): ShippingClassesCollection
    {
        $shippingClasses = collect();

        $input = $request->get('data');
        foreach ($input as $key => $shippingClassesInput) {
            $shippingClasses[$key] = $this->shippingClassesRepository->update($shippingClassesInput, $shippingClassesInput['id']);
        }

        return new ShippingClassesCollection($shippingClasses);
    }
}
