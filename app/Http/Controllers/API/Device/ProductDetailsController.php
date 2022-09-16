<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateProductDetailsAPIRequest;
use App\Http\Requests\Device\BulkUpdateProductDetailsAPIRequest;
use App\Http\Requests\Device\CreateProductDetailsAPIRequest;
use App\Http\Requests\Device\UpdateProductDetailsAPIRequest;
use App\Http\Resources\Device\ProductDetailsCollection;
use App\Http\Resources\Device\ProductDetailsResource;
use App\Repositories\ProductDetailsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ProductDetailsController extends AppBaseController
{
    /**
     * @var ProductDetailsRepository
     */
    private ProductDetailsRepository $productDetailsRepository;

    /**
     * @param ProductDetailsRepository $productDetailsRepository
     */
    public function __construct(ProductDetailsRepository $productDetailsRepository)
    {
        $this->productDetailsRepository = $productDetailsRepository;
    }

    /**
     * ProductDetails's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return ProductDetailsCollection
     */
    public function index(Request $request): ProductDetailsCollection
    {
        $productDetails = $this->productDetailsRepository->fetch($request);

        return new ProductDetailsCollection($productDetails);
    }

    /**
     * Create ProductDetails with given payload.
     *
     * @param CreateProductDetailsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ProductDetailsResource
     */
    public function store(CreateProductDetailsAPIRequest $request): ProductDetailsResource
    {
        $input = $request->all();
        $productDetails = $this->productDetailsRepository->create($input);

        return new ProductDetailsResource($productDetails);
    }

    /**
     * Get single ProductDetails record.
     *
     * @param int $id
     *
     * @return ProductDetailsResource
     */
    public function show(int $id): ProductDetailsResource
    {
        $productDetails = $this->productDetailsRepository->findOrFail($id);

        return new ProductDetailsResource($productDetails);
    }

    /**
     * Update ProductDetails with given payload.
     *
     * @param UpdateProductDetailsAPIRequest $request
     * @param int                            $id
     *
     * @throws ValidatorException
     *
     * @return ProductDetailsResource
     */
    public function update(UpdateProductDetailsAPIRequest $request, int $id): ProductDetailsResource
    {
        $input = $request->all();
        $productDetails = $this->productDetailsRepository->update($input, $id);

        return new ProductDetailsResource($productDetails);
    }

    /**
     * Delete given ProductDetails.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->productDetailsRepository->delete($id);

        return $this->successResponse('ProductDetails deleted successfully.');
    }

    /**
     * Bulk create ProductDetails's.
     *
     * @param BulkCreateProductDetailsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ProductDetailsCollection
     */
    public function bulkStore(BulkCreateProductDetailsAPIRequest $request): ProductDetailsCollection
    {
        $productDetails = collect();

        $input = $request->get('data');
        foreach ($input as $key => $productDetailsInput) {
            $productDetails[$key] = $this->productDetailsRepository->create($productDetailsInput);
        }

        return new ProductDetailsCollection($productDetails);
    }

    /**
     * Bulk update ProductDetails's data.
     *
     * @param BulkUpdateProductDetailsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ProductDetailsCollection
     */
    public function bulkUpdate(BulkUpdateProductDetailsAPIRequest $request): ProductDetailsCollection
    {
        $productDetails = collect();

        $input = $request->get('data');
        foreach ($input as $key => $productDetailsInput) {
            $productDetails[$key] = $this->productDetailsRepository->update($productDetailsInput, $productDetailsInput['id']);
        }

        return new ProductDetailsCollection($productDetails);
    }
}
