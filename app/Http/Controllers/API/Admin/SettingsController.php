<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateSettingsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateSettingsAPIRequest;
use App\Http\Requests\Admin\CreateSettingsAPIRequest;
use App\Http\Requests\Admin\UpdateSettingsAPIRequest;
use App\Http\Resources\Admin\SettingsCollection;
use App\Http\Resources\Admin\SettingsResource;
use App\Repositories\SettingsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class SettingsController extends AppBaseController
{
    /**
     * @var SettingsRepository
     */
    private SettingsRepository $settingsRepository;

    /**
     * @param SettingsRepository $settingsRepository
     */
    public function __construct(SettingsRepository $settingsRepository)
    {
        $this->settingsRepository = $settingsRepository;
    }

    /**
     * Settings's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return SettingsCollection
     */
    public function index(Request $request): SettingsCollection
    {
        $settings = $this->settingsRepository->fetch($request);

        return new SettingsCollection($settings);
    }

    /**
     * Create Settings with given payload.
     *
     * @param CreateSettingsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return SettingsResource
     */
    public function store(CreateSettingsAPIRequest $request): SettingsResource
    {
        $input = $request->all();
        $settings = $this->settingsRepository->create($input);

        return new SettingsResource($settings);
    }

    /**
     * Get single Settings record.
     *
     * @param int $id
     *
     * @return SettingsResource
     */
    public function show(int $id): SettingsResource
    {
        $settings = $this->settingsRepository->findOrFail($id);

        return new SettingsResource($settings);
    }

    /**
     * Update Settings with given payload.
     *
     * @param UpdateSettingsAPIRequest $request
     * @param int                      $id
     *
     * @throws ValidatorException
     *
     * @return SettingsResource
     */
    public function update(UpdateSettingsAPIRequest $request, int $id): SettingsResource
    {
        $input = $request->all();
        $settings = $this->settingsRepository->update($input, $id);

        return new SettingsResource($settings);
    }

    /**
     * Delete given Settings.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->settingsRepository->delete($id);

        return $this->successResponse('Settings deleted successfully.');
    }

    /**
     * Bulk create Settings's.
     *
     * @param BulkCreateSettingsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return SettingsCollection
     */
    public function bulkStore(BulkCreateSettingsAPIRequest $request): SettingsCollection
    {
        $settings = collect();

        $input = $request->get('data');
        foreach ($input as $key => $settingsInput) {
            $settings[$key] = $this->settingsRepository->create($settingsInput);
        }

        return new SettingsCollection($settings);
    }

    /**
     * Bulk update Settings's data.
     *
     * @param BulkUpdateSettingsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return SettingsCollection
     */
    public function bulkUpdate(BulkUpdateSettingsAPIRequest $request): SettingsCollection
    {
        $settings = collect();

        $input = $request->get('data');
        foreach ($input as $key => $settingsInput) {
            $settings[$key] = $this->settingsRepository->update($settingsInput, $settingsInput['id']);
        }

        return new SettingsCollection($settings);
    }
}
