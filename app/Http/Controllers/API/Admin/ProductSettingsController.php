<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateProductSettingsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateProductSettingsAPIRequest;
use App\Http\Requests\Admin\CreateProductSettingsAPIRequest;
use App\Http\Requests\Admin\UpdateProductSettingsAPIRequest;
use App\Http\Resources\Admin\ProductSettingsCollection;
use App\Http\Resources\Admin\ProductSettingsResource;
use App\Repositories\ProductSettingsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ProductSettingsController extends AppBaseController
{
    /**
     * @var ProductSettingsRepository
     */
    private ProductSettingsRepository $productSettingsRepository;

    /**
     * @param ProductSettingsRepository $productSettingsRepository
     */
    public function __construct(ProductSettingsRepository $productSettingsRepository)
    {
        $this->productSettingsRepository = $productSettingsRepository;
    }

    /**
     * ProductSettings's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return ProductSettingsCollection
     */
    public function index(Request $request): ProductSettingsCollection
    {
        $productSettings = $this->productSettingsRepository->fetch($request);

        return new ProductSettingsCollection($productSettings);
    }

    /**
     * Create ProductSettings with given payload.
     *
     * @param CreateProductSettingsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ProductSettingsResource
     */
    public function store(CreateProductSettingsAPIRequest $request): ProductSettingsResource
    {
        $input = $request->all();
        $productSettings = $this->productSettingsRepository->create($input);

        return new ProductSettingsResource($productSettings);
    }

    /**
     * Get single ProductSettings record.
     *
     * @param int $id
     *
     * @return ProductSettingsResource
     */
    public function show(int $id): ProductSettingsResource
    {
        $productSettings = $this->productSettingsRepository->findOrFail($id);

        return new ProductSettingsResource($productSettings);
    }

    /**
     * Update ProductSettings with given payload.
     *
     * @param UpdateProductSettingsAPIRequest $request
     * @param int                             $id
     *
     * @throws ValidatorException
     *
     * @return ProductSettingsResource
     */
    public function update(UpdateProductSettingsAPIRequest $request, int $id): ProductSettingsResource
    {
        $input = $request->all();
        $productSettings = $this->productSettingsRepository->update($input, $id);

        return new ProductSettingsResource($productSettings);
    }

    /**
     * Delete given ProductSettings.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->productSettingsRepository->delete($id);

        return $this->successResponse('ProductSettings deleted successfully.');
    }

    /**
     * Bulk create ProductSettings's.
     *
     * @param BulkCreateProductSettingsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ProductSettingsCollection
     */
    public function bulkStore(BulkCreateProductSettingsAPIRequest $request): ProductSettingsCollection
    {
        $productSettings = collect();

        $input = $request->get('data');
        foreach ($input as $key => $productSettingsInput) {
            $productSettings[$key] = $this->productSettingsRepository->create($productSettingsInput);
        }

        return new ProductSettingsCollection($productSettings);
    }

    /**
     * Bulk update ProductSettings's data.
     *
     * @param BulkUpdateProductSettingsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ProductSettingsCollection
     */
    public function bulkUpdate(BulkUpdateProductSettingsAPIRequest $request): ProductSettingsCollection
    {
        $productSettings = collect();

        $input = $request->get('data');
        foreach ($input as $key => $productSettingsInput) {
            $productSettings[$key] = $this->productSettingsRepository->update($productSettingsInput, $productSettingsInput['id']);
        }

        return new ProductSettingsCollection($productSettings);
    }
}
