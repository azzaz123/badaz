<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateProductLicenseKeysAPIRequest;
use App\Http\Requests\Device\BulkUpdateProductLicenseKeysAPIRequest;
use App\Http\Requests\Device\CreateProductLicenseKeysAPIRequest;
use App\Http\Requests\Device\UpdateProductLicenseKeysAPIRequest;
use App\Http\Resources\Device\ProductLicenseKeysCollection;
use App\Http\Resources\Device\ProductLicenseKeysResource;
use App\Repositories\ProductLicenseKeysRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ProductLicenseKeysController extends AppBaseController
{
    /**
     * @var ProductLicenseKeysRepository
     */
    private ProductLicenseKeysRepository $productLicenseKeysRepository;

    /**
     * @param ProductLicenseKeysRepository $productLicenseKeysRepository
     */
    public function __construct(ProductLicenseKeysRepository $productLicenseKeysRepository)
    {
        $this->productLicenseKeysRepository = $productLicenseKeysRepository;
    }

    /**
     * ProductLicenseKeys's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return ProductLicenseKeysCollection
     */
    public function index(Request $request): ProductLicenseKeysCollection
    {
        $productLicenseKeys = $this->productLicenseKeysRepository->fetch($request);

        return new ProductLicenseKeysCollection($productLicenseKeys);
    }

    /**
     * Create ProductLicenseKeys with given payload.
     *
     * @param CreateProductLicenseKeysAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ProductLicenseKeysResource
     */
    public function store(CreateProductLicenseKeysAPIRequest $request): ProductLicenseKeysResource
    {
        $input = $request->all();
        $productLicenseKeys = $this->productLicenseKeysRepository->create($input);

        return new ProductLicenseKeysResource($productLicenseKeys);
    }

    /**
     * Get single ProductLicenseKeys record.
     *
     * @param int $id
     *
     * @return ProductLicenseKeysResource
     */
    public function show(int $id): ProductLicenseKeysResource
    {
        $productLicenseKeys = $this->productLicenseKeysRepository->findOrFail($id);

        return new ProductLicenseKeysResource($productLicenseKeys);
    }

    /**
     * Update ProductLicenseKeys with given payload.
     *
     * @param UpdateProductLicenseKeysAPIRequest $request
     * @param int                                $id
     *
     * @throws ValidatorException
     *
     * @return ProductLicenseKeysResource
     */
    public function update(UpdateProductLicenseKeysAPIRequest $request, int $id): ProductLicenseKeysResource
    {
        $input = $request->all();
        $productLicenseKeys = $this->productLicenseKeysRepository->update($input, $id);

        return new ProductLicenseKeysResource($productLicenseKeys);
    }

    /**
     * Delete given ProductLicenseKeys.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->productLicenseKeysRepository->delete($id);

        return $this->successResponse('ProductLicenseKeys deleted successfully.');
    }

    /**
     * Bulk create ProductLicenseKeys's.
     *
     * @param BulkCreateProductLicenseKeysAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ProductLicenseKeysCollection
     */
    public function bulkStore(BulkCreateProductLicenseKeysAPIRequest $request): ProductLicenseKeysCollection
    {
        $productLicenseKeys = collect();

        $input = $request->get('data');
        foreach ($input as $key => $productLicenseKeysInput) {
            $productLicenseKeys[$key] = $this->productLicenseKeysRepository->create($productLicenseKeysInput);
        }

        return new ProductLicenseKeysCollection($productLicenseKeys);
    }

    /**
     * Bulk update ProductLicenseKeys's data.
     *
     * @param BulkUpdateProductLicenseKeysAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ProductLicenseKeysCollection
     */
    public function bulkUpdate(BulkUpdateProductLicenseKeysAPIRequest $request): ProductLicenseKeysCollection
    {
        $productLicenseKeys = collect();

        $input = $request->get('data');
        foreach ($input as $key => $productLicenseKeysInput) {
            $productLicenseKeys[$key] = $this->productLicenseKeysRepository->update($productLicenseKeysInput, $productLicenseKeysInput['id']);
        }

        return new ProductLicenseKeysCollection($productLicenseKeys);
    }
}
