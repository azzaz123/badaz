<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateLocationCountriesAPIRequest;
use App\Http\Requests\Admin\BulkUpdateLocationCountriesAPIRequest;
use App\Http\Requests\Admin\CreateLocationCountriesAPIRequest;
use App\Http\Requests\Admin\UpdateLocationCountriesAPIRequest;
use App\Http\Resources\Admin\LocationCountriesCollection;
use App\Http\Resources\Admin\LocationCountriesResource;
use App\Repositories\LocationCountriesRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class LocationCountriesController extends AppBaseController
{
    /**
     * @var LocationCountriesRepository
     */
    private LocationCountriesRepository $locationCountriesRepository;

    /**
     * @param LocationCountriesRepository $locationCountriesRepository
     */
    public function __construct(LocationCountriesRepository $locationCountriesRepository)
    {
        $this->locationCountriesRepository = $locationCountriesRepository;
    }

    /**
     * LocationCountries's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return LocationCountriesCollection
     */
    public function index(Request $request): LocationCountriesCollection
    {
        $locationCountries = $this->locationCountriesRepository->fetch($request);

        return new LocationCountriesCollection($locationCountries);
    }

    /**
     * Create LocationCountries with given payload.
     *
     * @param CreateLocationCountriesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return LocationCountriesResource
     */
    public function store(CreateLocationCountriesAPIRequest $request): LocationCountriesResource
    {
        $input = $request->all();
        $locationCountries = $this->locationCountriesRepository->create($input);

        return new LocationCountriesResource($locationCountries);
    }

    /**
     * Get single LocationCountries record.
     *
     * @param int $id
     *
     * @return LocationCountriesResource
     */
    public function show(int $id): LocationCountriesResource
    {
        $locationCountries = $this->locationCountriesRepository->findOrFail($id);

        return new LocationCountriesResource($locationCountries);
    }

    /**
     * Update LocationCountries with given payload.
     *
     * @param UpdateLocationCountriesAPIRequest $request
     * @param int                               $id
     *
     * @throws ValidatorException
     *
     * @return LocationCountriesResource
     */
    public function update(UpdateLocationCountriesAPIRequest $request, int $id): LocationCountriesResource
    {
        $input = $request->all();
        $locationCountries = $this->locationCountriesRepository->update($input, $id);

        return new LocationCountriesResource($locationCountries);
    }

    /**
     * Delete given LocationCountries.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->locationCountriesRepository->delete($id);

        return $this->successResponse('LocationCountries deleted successfully.');
    }

    /**
     * Bulk create LocationCountries's.
     *
     * @param BulkCreateLocationCountriesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return LocationCountriesCollection
     */
    public function bulkStore(BulkCreateLocationCountriesAPIRequest $request): LocationCountriesCollection
    {
        $locationCountries = collect();

        $input = $request->get('data');
        foreach ($input as $key => $locationCountriesInput) {
            $locationCountries[$key] = $this->locationCountriesRepository->create($locationCountriesInput);
        }

        return new LocationCountriesCollection($locationCountries);
    }

    /**
     * Bulk update LocationCountries's data.
     *
     * @param BulkUpdateLocationCountriesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return LocationCountriesCollection
     */
    public function bulkUpdate(BulkUpdateLocationCountriesAPIRequest $request): LocationCountriesCollection
    {
        $locationCountries = collect();

        $input = $request->get('data');
        foreach ($input as $key => $locationCountriesInput) {
            $locationCountries[$key] = $this->locationCountriesRepository->update($locationCountriesInput, $locationCountriesInput['id']);
        }

        return new LocationCountriesCollection($locationCountries);
    }
}
