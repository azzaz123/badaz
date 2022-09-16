<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateAdSpacesAPIRequest;
use App\Http\Requests\Device\BulkUpdateAdSpacesAPIRequest;
use App\Http\Requests\Device\CreateAdSpacesAPIRequest;
use App\Http\Requests\Device\UpdateAdSpacesAPIRequest;
use App\Http\Resources\Device\AdSpacesCollection;
use App\Http\Resources\Device\AdSpacesResource;
use App\Repositories\AdSpacesRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class AdSpacesController extends AppBaseController
{
    /**
     * @var AdSpacesRepository
     */
    private AdSpacesRepository $adSpacesRepository;

    /**
     * @param AdSpacesRepository $adSpacesRepository
     */
    public function __construct(AdSpacesRepository $adSpacesRepository)
    {
        $this->adSpacesRepository = $adSpacesRepository;
    }

    /**
     * AdSpaces's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return AdSpacesCollection
     */
    public function index(Request $request): AdSpacesCollection
    {
        $adSpaces = $this->adSpacesRepository->fetch($request);

        return new AdSpacesCollection($adSpaces);
    }

    /**
     * Create AdSpaces with given payload.
     *
     * @param CreateAdSpacesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return AdSpacesResource
     */
    public function store(CreateAdSpacesAPIRequest $request): AdSpacesResource
    {
        $input = $request->all();
        $adSpaces = $this->adSpacesRepository->create($input);

        return new AdSpacesResource($adSpaces);
    }

    /**
     * Get single AdSpaces record.
     *
     * @param int $id
     *
     * @return AdSpacesResource
     */
    public function show(int $id): AdSpacesResource
    {
        $adSpaces = $this->adSpacesRepository->findOrFail($id);

        return new AdSpacesResource($adSpaces);
    }

    /**
     * Update AdSpaces with given payload.
     *
     * @param UpdateAdSpacesAPIRequest $request
     * @param int                      $id
     *
     * @throws ValidatorException
     *
     * @return AdSpacesResource
     */
    public function update(UpdateAdSpacesAPIRequest $request, int $id): AdSpacesResource
    {
        $input = $request->all();
        $adSpaces = $this->adSpacesRepository->update($input, $id);

        return new AdSpacesResource($adSpaces);
    }

    /**
     * Delete given AdSpaces.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->adSpacesRepository->delete($id);

        return $this->successResponse('AdSpaces deleted successfully.');
    }

    /**
     * Bulk create AdSpaces's.
     *
     * @param BulkCreateAdSpacesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return AdSpacesCollection
     */
    public function bulkStore(BulkCreateAdSpacesAPIRequest $request): AdSpacesCollection
    {
        $adSpaces = collect();

        $input = $request->get('data');
        foreach ($input as $key => $adSpacesInput) {
            $adSpaces[$key] = $this->adSpacesRepository->create($adSpacesInput);
        }

        return new AdSpacesCollection($adSpaces);
    }

    /**
     * Bulk update AdSpaces's data.
     *
     * @param BulkUpdateAdSpacesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return AdSpacesCollection
     */
    public function bulkUpdate(BulkUpdateAdSpacesAPIRequest $request): AdSpacesCollection
    {
        $adSpaces = collect();

        $input = $request->get('data');
        foreach ($input as $key => $adSpacesInput) {
            $adSpaces[$key] = $this->adSpacesRepository->update($adSpacesInput, $adSpacesInput['id']);
        }

        return new AdSpacesCollection($adSpaces);
    }
}
