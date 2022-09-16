<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateCustomFieldsOptionsAPIRequest;
use App\Http\Requests\Device\BulkUpdateCustomFieldsOptionsAPIRequest;
use App\Http\Requests\Device\CreateCustomFieldsOptionsAPIRequest;
use App\Http\Requests\Device\UpdateCustomFieldsOptionsAPIRequest;
use App\Http\Resources\Device\CustomFieldsOptionsCollection;
use App\Http\Resources\Device\CustomFieldsOptionsResource;
use App\Repositories\CustomFieldsOptionsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class CustomFieldsOptionsController extends AppBaseController
{
    /**
     * @var CustomFieldsOptionsRepository
     */
    private CustomFieldsOptionsRepository $customFieldsOptionsRepository;

    /**
     * @param CustomFieldsOptionsRepository $customFieldsOptionsRepository
     */
    public function __construct(CustomFieldsOptionsRepository $customFieldsOptionsRepository)
    {
        $this->customFieldsOptionsRepository = $customFieldsOptionsRepository;
    }

    /**
     * CustomFieldsOptions's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return CustomFieldsOptionsCollection
     */
    public function index(Request $request): CustomFieldsOptionsCollection
    {
        $customFieldsOptions = $this->customFieldsOptionsRepository->fetch($request);

        return new CustomFieldsOptionsCollection($customFieldsOptions);
    }

    /**
     * Create CustomFieldsOptions with given payload.
     *
     * @param CreateCustomFieldsOptionsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CustomFieldsOptionsResource
     */
    public function store(CreateCustomFieldsOptionsAPIRequest $request): CustomFieldsOptionsResource
    {
        $input = $request->all();
        $customFieldsOptions = $this->customFieldsOptionsRepository->create($input);

        return new CustomFieldsOptionsResource($customFieldsOptions);
    }

    /**
     * Get single CustomFieldsOptions record.
     *
     * @param int $id
     *
     * @return CustomFieldsOptionsResource
     */
    public function show(int $id): CustomFieldsOptionsResource
    {
        $customFieldsOptions = $this->customFieldsOptionsRepository->findOrFail($id);

        return new CustomFieldsOptionsResource($customFieldsOptions);
    }

    /**
     * Update CustomFieldsOptions with given payload.
     *
     * @param UpdateCustomFieldsOptionsAPIRequest $request
     * @param int                                 $id
     *
     * @throws ValidatorException
     *
     * @return CustomFieldsOptionsResource
     */
    public function update(UpdateCustomFieldsOptionsAPIRequest $request, int $id): CustomFieldsOptionsResource
    {
        $input = $request->all();
        $customFieldsOptions = $this->customFieldsOptionsRepository->update($input, $id);

        return new CustomFieldsOptionsResource($customFieldsOptions);
    }

    /**
     * Delete given CustomFieldsOptions.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->customFieldsOptionsRepository->delete($id);

        return $this->successResponse('CustomFieldsOptions deleted successfully.');
    }

    /**
     * Bulk create CustomFieldsOptions's.
     *
     * @param BulkCreateCustomFieldsOptionsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CustomFieldsOptionsCollection
     */
    public function bulkStore(BulkCreateCustomFieldsOptionsAPIRequest $request): CustomFieldsOptionsCollection
    {
        $customFieldsOptions = collect();

        $input = $request->get('data');
        foreach ($input as $key => $customFieldsOptionsInput) {
            $customFieldsOptions[$key] = $this->customFieldsOptionsRepository->create($customFieldsOptionsInput);
        }

        return new CustomFieldsOptionsCollection($customFieldsOptions);
    }

    /**
     * Bulk update CustomFieldsOptions's data.
     *
     * @param BulkUpdateCustomFieldsOptionsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CustomFieldsOptionsCollection
     */
    public function bulkUpdate(BulkUpdateCustomFieldsOptionsAPIRequest $request): CustomFieldsOptionsCollection
    {
        $customFieldsOptions = collect();

        $input = $request->get('data');
        foreach ($input as $key => $customFieldsOptionsInput) {
            $customFieldsOptions[$key] = $this->customFieldsOptionsRepository->update($customFieldsOptionsInput, $customFieldsOptionsInput['id']);
        }

        return new CustomFieldsOptionsCollection($customFieldsOptions);
    }
}
