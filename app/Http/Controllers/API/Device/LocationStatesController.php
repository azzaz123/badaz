<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateLocationStatesAPIRequest;
use App\Http\Requests\Device\BulkUpdateLocationStatesAPIRequest;
use App\Http\Requests\Device\CreateLocationStatesAPIRequest;
use App\Http\Requests\Device\UpdateLocationStatesAPIRequest;
use App\Http\Resources\Device\LocationStatesCollection;
use App\Http\Resources\Device\LocationStatesResource;
use App\Repositories\LocationStatesRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class LocationStatesController extends AppBaseController
{
    /**
     * @var LocationStatesRepository
     */
    private LocationStatesRepository $locationStatesRepository;

    /**
     * @param LocationStatesRepository $locationStatesRepository
     */
    public function __construct(LocationStatesRepository $locationStatesRepository)
    {
        $this->locationStatesRepository = $locationStatesRepository;
    }

    /**
     * LocationStates's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return LocationStatesCollection
     */
    public function index(Request $request): LocationStatesCollection
    {
        $locationStates = $this->locationStatesRepository->fetch($request);

        return new LocationStatesCollection($locationStates);
    }

    /**
     * Create LocationStates with given payload.
     *
     * @param CreateLocationStatesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return LocationStatesResource
     */
    public function store(CreateLocationStatesAPIRequest $request): LocationStatesResource
    {
        $input = $request->all();
        $locationStates = $this->locationStatesRepository->create($input);

        return new LocationStatesResource($locationStates);
    }

    /**
     * Get single LocationStates record.
     *
     * @param int $id
     *
     * @return LocationStatesResource
     */
    public function show(int $id): LocationStatesResource
    {
        $locationStates = $this->locationStatesRepository->findOrFail($id);

        return new LocationStatesResource($locationStates);
    }

    /**
     * Update LocationStates with given payload.
     *
     * @param UpdateLocationStatesAPIRequest $request
     * @param int                            $id
     *
     * @throws ValidatorException
     *
     * @return LocationStatesResource
     */
    public function update(UpdateLocationStatesAPIRequest $request, int $id): LocationStatesResource
    {
        $input = $request->all();
        $locationStates = $this->locationStatesRepository->update($input, $id);

        return new LocationStatesResource($locationStates);
    }

    /**
     * Delete given LocationStates.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->locationStatesRepository->delete($id);

        return $this->successResponse('LocationStates deleted successfully.');
    }

    /**
     * Bulk create LocationStates's.
     *
     * @param BulkCreateLocationStatesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return LocationStatesCollection
     */
    public function bulkStore(BulkCreateLocationStatesAPIRequest $request): LocationStatesCollection
    {
        $locationStates = collect();

        $input = $request->get('data');
        foreach ($input as $key => $locationStatesInput) {
            $locationStates[$key] = $this->locationStatesRepository->create($locationStatesInput);
        }

        return new LocationStatesCollection($locationStates);
    }

    /**
     * Bulk update LocationStates's data.
     *
     * @param BulkUpdateLocationStatesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return LocationStatesCollection
     */
    public function bulkUpdate(BulkUpdateLocationStatesAPIRequest $request): LocationStatesCollection
    {
        $locationStates = collect();

        $input = $request->get('data');
        foreach ($input as $key => $locationStatesInput) {
            $locationStates[$key] = $this->locationStatesRepository->update($locationStatesInput, $locationStatesInput['id']);
        }

        return new LocationStatesCollection($locationStates);
    }
}
