<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateCustomFieldsProductAPIRequest;
use App\Http\Requests\Admin\BulkUpdateCustomFieldsProductAPIRequest;
use App\Http\Requests\Admin\CreateCustomFieldsProductAPIRequest;
use App\Http\Requests\Admin\UpdateCustomFieldsProductAPIRequest;
use App\Http\Resources\Admin\CustomFieldsProductCollection;
use App\Http\Resources\Admin\CustomFieldsProductResource;
use App\Repositories\CustomFieldsProductRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class CustomFieldsProductController extends AppBaseController
{
    /**
     * @var CustomFieldsProductRepository
     */
    private CustomFieldsProductRepository $customFieldsProductRepository;

    /**
     * @param CustomFieldsProductRepository $customFieldsProductRepository
     */
    public function __construct(CustomFieldsProductRepository $customFieldsProductRepository)
    {
        $this->customFieldsProductRepository = $customFieldsProductRepository;
    }

    /**
     * CustomFieldsProduct's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return CustomFieldsProductCollection
     */
    public function index(Request $request): CustomFieldsProductCollection
    {
        $customFieldsProducts = $this->customFieldsProductRepository->fetch($request);

        return new CustomFieldsProductCollection($customFieldsProducts);
    }

    /**
     * Create CustomFieldsProduct with given payload.
     *
     * @param CreateCustomFieldsProductAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CustomFieldsProductResource
     */
    public function store(CreateCustomFieldsProductAPIRequest $request): CustomFieldsProductResource
    {
        $input = $request->all();
        $customFieldsProduct = $this->customFieldsProductRepository->create($input);

        return new CustomFieldsProductResource($customFieldsProduct);
    }

    /**
     * Get single CustomFieldsProduct record.
     *
     * @param int $id
     *
     * @return CustomFieldsProductResource
     */
    public function show(int $id): CustomFieldsProductResource
    {
        $customFieldsProduct = $this->customFieldsProductRepository->findOrFail($id);

        return new CustomFieldsProductResource($customFieldsProduct);
    }

    /**
     * Update CustomFieldsProduct with given payload.
     *
     * @param UpdateCustomFieldsProductAPIRequest $request
     * @param int                                 $id
     *
     * @throws ValidatorException
     *
     * @return CustomFieldsProductResource
     */
    public function update(UpdateCustomFieldsProductAPIRequest $request, int $id): CustomFieldsProductResource
    {
        $input = $request->all();
        $customFieldsProduct = $this->customFieldsProductRepository->update($input, $id);

        return new CustomFieldsProductResource($customFieldsProduct);
    }

    /**
     * Delete given CustomFieldsProduct.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->customFieldsProductRepository->delete($id);

        return $this->successResponse('CustomFieldsProduct deleted successfully.');
    }

    /**
     * Bulk create CustomFieldsProduct's.
     *
     * @param BulkCreateCustomFieldsProductAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CustomFieldsProductCollection
     */
    public function bulkStore(BulkCreateCustomFieldsProductAPIRequest $request): CustomFieldsProductCollection
    {
        $customFieldsProducts = collect();

        $input = $request->get('data');
        foreach ($input as $key => $customFieldsProductInput) {
            $customFieldsProducts[$key] = $this->customFieldsProductRepository->create($customFieldsProductInput);
        }

        return new CustomFieldsProductCollection($customFieldsProducts);
    }

    /**
     * Bulk update CustomFieldsProduct's data.
     *
     * @param BulkUpdateCustomFieldsProductAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CustomFieldsProductCollection
     */
    public function bulkUpdate(BulkUpdateCustomFieldsProductAPIRequest $request): CustomFieldsProductCollection
    {
        $customFieldsProducts = collect();

        $input = $request->get('data');
        foreach ($input as $key => $customFieldsProductInput) {
            $customFieldsProducts[$key] = $this->customFieldsProductRepository->update($customFieldsProductInput, $customFieldsProductInput['id']);
        }

        return new CustomFieldsProductCollection($customFieldsProducts);
    }
}
