<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateStorageSettingsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateStorageSettingsAPIRequest;
use App\Http\Requests\Admin\CreateStorageSettingsAPIRequest;
use App\Http\Requests\Admin\UpdateStorageSettingsAPIRequest;
use App\Http\Resources\Admin\StorageSettingsCollection;
use App\Http\Resources\Admin\StorageSettingsResource;
use App\Repositories\StorageSettingsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class StorageSettingsController extends AppBaseController
{
    /**
     * @var StorageSettingsRepository
     */
    private StorageSettingsRepository $storageSettingsRepository;

    /**
     * @param StorageSettingsRepository $storageSettingsRepository
     */
    public function __construct(StorageSettingsRepository $storageSettingsRepository)
    {
        $this->storageSettingsRepository = $storageSettingsRepository;
    }

    /**
     * StorageSettings's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return StorageSettingsCollection
     */
    public function index(Request $request): StorageSettingsCollection
    {
        $storageSettings = $this->storageSettingsRepository->fetch($request);

        return new StorageSettingsCollection($storageSettings);
    }

    /**
     * Create StorageSettings with given payload.
     *
     * @param CreateStorageSettingsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return StorageSettingsResource
     */
    public function store(CreateStorageSettingsAPIRequest $request): StorageSettingsResource
    {
        $input = $request->all();
        $storageSettings = $this->storageSettingsRepository->create($input);

        return new StorageSettingsResource($storageSettings);
    }

    /**
     * Get single StorageSettings record.
     *
     * @param int $id
     *
     * @return StorageSettingsResource
     */
    public function show(int $id): StorageSettingsResource
    {
        $storageSettings = $this->storageSettingsRepository->findOrFail($id);

        return new StorageSettingsResource($storageSettings);
    }

    /**
     * Update StorageSettings with given payload.
     *
     * @param UpdateStorageSettingsAPIRequest $request
     * @param int                             $id
     *
     * @throws ValidatorException
     *
     * @return StorageSettingsResource
     */
    public function update(UpdateStorageSettingsAPIRequest $request, int $id): StorageSettingsResource
    {
        $input = $request->all();
        $storageSettings = $this->storageSettingsRepository->update($input, $id);

        return new StorageSettingsResource($storageSettings);
    }

    /**
     * Delete given StorageSettings.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->storageSettingsRepository->delete($id);

        return $this->successResponse('StorageSettings deleted successfully.');
    }

    /**
     * Bulk create StorageSettings's.
     *
     * @param BulkCreateStorageSettingsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return StorageSettingsCollection
     */
    public function bulkStore(BulkCreateStorageSettingsAPIRequest $request): StorageSettingsCollection
    {
        $storageSettings = collect();

        $input = $request->get('data');
        foreach ($input as $key => $storageSettingsInput) {
            $storageSettings[$key] = $this->storageSettingsRepository->create($storageSettingsInput);
        }

        return new StorageSettingsCollection($storageSettings);
    }

    /**
     * Bulk update StorageSettings's data.
     *
     * @param BulkUpdateStorageSettingsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return StorageSettingsCollection
     */
    public function bulkUpdate(BulkUpdateStorageSettingsAPIRequest $request): StorageSettingsCollection
    {
        $storageSettings = collect();

        $input = $request->get('data');
        foreach ($input as $key => $storageSettingsInput) {
            $storageSettings[$key] = $this->storageSettingsRepository->update($storageSettingsInput, $storageSettingsInput['id']);
        }

        return new StorageSettingsCollection($storageSettings);
    }
}
