<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateCustomFieldsCategoryAPIRequest;
use App\Http\Requests\Admin\BulkUpdateCustomFieldsCategoryAPIRequest;
use App\Http\Requests\Admin\CreateCustomFieldsCategoryAPIRequest;
use App\Http\Requests\Admin\UpdateCustomFieldsCategoryAPIRequest;
use App\Http\Resources\Admin\CustomFieldsCategoryCollection;
use App\Http\Resources\Admin\CustomFieldsCategoryResource;
use App\Repositories\CustomFieldsCategoryRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class CustomFieldsCategoryController extends AppBaseController
{
    /**
     * @var CustomFieldsCategoryRepository
     */
    private CustomFieldsCategoryRepository $customFieldsCategoryRepository;

    /**
     * @param CustomFieldsCategoryRepository $customFieldsCategoryRepository
     */
    public function __construct(CustomFieldsCategoryRepository $customFieldsCategoryRepository)
    {
        $this->customFieldsCategoryRepository = $customFieldsCategoryRepository;
    }

    /**
     * CustomFieldsCategory's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return CustomFieldsCategoryCollection
     */
    public function index(Request $request): CustomFieldsCategoryCollection
    {
        $customFieldsCategories = $this->customFieldsCategoryRepository->fetch($request);

        return new CustomFieldsCategoryCollection($customFieldsCategories);
    }

    /**
     * Create CustomFieldsCategory with given payload.
     *
     * @param CreateCustomFieldsCategoryAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CustomFieldsCategoryResource
     */
    public function store(CreateCustomFieldsCategoryAPIRequest $request): CustomFieldsCategoryResource
    {
        $input = $request->all();
        $customFieldsCategory = $this->customFieldsCategoryRepository->create($input);

        return new CustomFieldsCategoryResource($customFieldsCategory);
    }

    /**
     * Get single CustomFieldsCategory record.
     *
     * @param int $id
     *
     * @return CustomFieldsCategoryResource
     */
    public function show(int $id): CustomFieldsCategoryResource
    {
        $customFieldsCategory = $this->customFieldsCategoryRepository->findOrFail($id);

        return new CustomFieldsCategoryResource($customFieldsCategory);
    }

    /**
     * Update CustomFieldsCategory with given payload.
     *
     * @param UpdateCustomFieldsCategoryAPIRequest $request
     * @param int                                  $id
     *
     * @throws ValidatorException
     *
     * @return CustomFieldsCategoryResource
     */
    public function update(UpdateCustomFieldsCategoryAPIRequest $request, int $id): CustomFieldsCategoryResource
    {
        $input = $request->all();
        $customFieldsCategory = $this->customFieldsCategoryRepository->update($input, $id);

        return new CustomFieldsCategoryResource($customFieldsCategory);
    }

    /**
     * Delete given CustomFieldsCategory.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->customFieldsCategoryRepository->delete($id);

        return $this->successResponse('CustomFieldsCategory deleted successfully.');
    }

    /**
     * Bulk create CustomFieldsCategory's.
     *
     * @param BulkCreateCustomFieldsCategoryAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CustomFieldsCategoryCollection
     */
    public function bulkStore(BulkCreateCustomFieldsCategoryAPIRequest $request): CustomFieldsCategoryCollection
    {
        $customFieldsCategories = collect();

        $input = $request->get('data');
        foreach ($input as $key => $customFieldsCategoryInput) {
            $customFieldsCategories[$key] = $this->customFieldsCategoryRepository->create($customFieldsCategoryInput);
        }

        return new CustomFieldsCategoryCollection($customFieldsCategories);
    }

    /**
     * Bulk update CustomFieldsCategory's data.
     *
     * @param BulkUpdateCustomFieldsCategoryAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CustomFieldsCategoryCollection
     */
    public function bulkUpdate(BulkUpdateCustomFieldsCategoryAPIRequest $request): CustomFieldsCategoryCollection
    {
        $customFieldsCategories = collect();

        $input = $request->get('data');
        foreach ($input as $key => $customFieldsCategoryInput) {
            $customFieldsCategories[$key] = $this->customFieldsCategoryRepository->update($customFieldsCategoryInput, $customFieldsCategoryInput['id']);
        }

        return new CustomFieldsCategoryCollection($customFieldsCategories);
    }
}
