<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateCustomFieldsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateCustomFieldsAPIRequest;
use App\Http\Requests\Admin\CreateCustomFieldsAPIRequest;
use App\Http\Requests\Admin\UpdateCustomFieldsAPIRequest;
use App\Http\Resources\Admin\CustomFieldsCollection;
use App\Http\Resources\Admin\CustomFieldsResource;
use App\Repositories\CustomFieldsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class CustomFieldsController extends AppBaseController
{
    /**
     * @var CustomFieldsRepository
     */
    private CustomFieldsRepository $customFieldsRepository;

    /**
     * @param CustomFieldsRepository $customFieldsRepository
     */
    public function __construct(CustomFieldsRepository $customFieldsRepository)
    {
        $this->customFieldsRepository = $customFieldsRepository;
    }

    /**
     * CustomFields's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return CustomFieldsCollection
     */
    public function index(Request $request): CustomFieldsCollection
    {
        $customFields = $this->customFieldsRepository->fetch($request);

        return new CustomFieldsCollection($customFields);
    }

    /**
     * Create CustomFields with given payload.
     *
     * @param CreateCustomFieldsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CustomFieldsResource
     */
    public function store(CreateCustomFieldsAPIRequest $request): CustomFieldsResource
    {
        $input = $request->all();
        $customFields = $this->customFieldsRepository->create($input);

        return new CustomFieldsResource($customFields);
    }

    /**
     * Get single CustomFields record.
     *
     * @param int $id
     *
     * @return CustomFieldsResource
     */
    public function show(int $id): CustomFieldsResource
    {
        $customFields = $this->customFieldsRepository->findOrFail($id);

        return new CustomFieldsResource($customFields);
    }

    /**
     * Update CustomFields with given payload.
     *
     * @param UpdateCustomFieldsAPIRequest $request
     * @param int                          $id
     *
     * @throws ValidatorException
     *
     * @return CustomFieldsResource
     */
    public function update(UpdateCustomFieldsAPIRequest $request, int $id): CustomFieldsResource
    {
        $input = $request->all();
        $customFields = $this->customFieldsRepository->update($input, $id);

        return new CustomFieldsResource($customFields);
    }

    /**
     * Delete given CustomFields.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->customFieldsRepository->delete($id);

        return $this->successResponse('CustomFields deleted successfully.');
    }

    /**
     * Bulk create CustomFields's.
     *
     * @param BulkCreateCustomFieldsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CustomFieldsCollection
     */
    public function bulkStore(BulkCreateCustomFieldsAPIRequest $request): CustomFieldsCollection
    {
        $customFields = collect();

        $input = $request->get('data');
        foreach ($input as $key => $customFieldsInput) {
            $customFields[$key] = $this->customFieldsRepository->create($customFieldsInput);
        }

        return new CustomFieldsCollection($customFields);
    }

    /**
     * Bulk update CustomFields's data.
     *
     * @param BulkUpdateCustomFieldsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CustomFieldsCollection
     */
    public function bulkUpdate(BulkUpdateCustomFieldsAPIRequest $request): CustomFieldsCollection
    {
        $customFields = collect();

        $input = $request->get('data');
        foreach ($input as $key => $customFieldsInput) {
            $customFields[$key] = $this->customFieldsRepository->update($customFieldsInput, $customFieldsInput['id']);
        }

        return new CustomFieldsCollection($customFields);
    }
}
