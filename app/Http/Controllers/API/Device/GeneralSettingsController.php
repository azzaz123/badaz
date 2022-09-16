<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateGeneralSettingsAPIRequest;
use App\Http\Requests\Device\BulkUpdateGeneralSettingsAPIRequest;
use App\Http\Requests\Device\CreateGeneralSettingsAPIRequest;
use App\Http\Requests\Device\UpdateGeneralSettingsAPIRequest;
use App\Http\Resources\Device\GeneralSettingsCollection;
use App\Http\Resources\Device\GeneralSettingsResource;
use App\Repositories\GeneralSettingsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class GeneralSettingsController extends AppBaseController
{
    /**
     * @var GeneralSettingsRepository
     */
    private GeneralSettingsRepository $generalSettingsRepository;

    /**
     * @param GeneralSettingsRepository $generalSettingsRepository
     */
    public function __construct(GeneralSettingsRepository $generalSettingsRepository)
    {
        $this->generalSettingsRepository = $generalSettingsRepository;
    }

    /**
     * GeneralSettings's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return GeneralSettingsCollection
     */
    public function index(Request $request): GeneralSettingsCollection
    {
        $generalSettings = $this->generalSettingsRepository->fetch($request);

        return new GeneralSettingsCollection($generalSettings);
    }

    /**
     * Create GeneralSettings with given payload.
     *
     * @param CreateGeneralSettingsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return GeneralSettingsResource
     */
    public function store(CreateGeneralSettingsAPIRequest $request): GeneralSettingsResource
    {
        $input = $request->all();
        $generalSettings = $this->generalSettingsRepository->create($input);

        return new GeneralSettingsResource($generalSettings);
    }

    /**
     * Get single GeneralSettings record.
     *
     * @param int $id
     *
     * @return GeneralSettingsResource
     */
    public function show(int $id): GeneralSettingsResource
    {
        $generalSettings = $this->generalSettingsRepository->findOrFail($id);

        return new GeneralSettingsResource($generalSettings);
    }

    /**
     * Update GeneralSettings with given payload.
     *
     * @param UpdateGeneralSettingsAPIRequest $request
     * @param int                             $id
     *
     * @throws ValidatorException
     *
     * @return GeneralSettingsResource
     */
    public function update(UpdateGeneralSettingsAPIRequest $request, int $id): GeneralSettingsResource
    {
        $input = $request->all();
        $generalSettings = $this->generalSettingsRepository->update($input, $id);

        return new GeneralSettingsResource($generalSettings);
    }

    /**
     * Delete given GeneralSettings.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->generalSettingsRepository->delete($id);

        return $this->successResponse('GeneralSettings deleted successfully.');
    }

    /**
     * Bulk create GeneralSettings's.
     *
     * @param BulkCreateGeneralSettingsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return GeneralSettingsCollection
     */
    public function bulkStore(BulkCreateGeneralSettingsAPIRequest $request): GeneralSettingsCollection
    {
        $generalSettings = collect();

        $input = $request->get('data');
        foreach ($input as $key => $generalSettingsInput) {
            $generalSettings[$key] = $this->generalSettingsRepository->create($generalSettingsInput);
        }

        return new GeneralSettingsCollection($generalSettings);
    }

    /**
     * Bulk update GeneralSettings's data.
     *
     * @param BulkUpdateGeneralSettingsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return GeneralSettingsCollection
     */
    public function bulkUpdate(BulkUpdateGeneralSettingsAPIRequest $request): GeneralSettingsCollection
    {
        $generalSettings = collect();

        $input = $request->get('data');
        foreach ($input as $key => $generalSettingsInput) {
            $generalSettings[$key] = $this->generalSettingsRepository->update($generalSettingsInput, $generalSettingsInput['id']);
        }

        return new GeneralSettingsCollection($generalSettings);
    }
}
