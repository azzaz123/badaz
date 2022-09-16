<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateProductsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateProductsAPIRequest;
use App\Http\Requests\Admin\CreateProductsAPIRequest;
use App\Http\Requests\Admin\UpdateProductsAPIRequest;
use App\Http\Resources\Admin\ProductsCollection;
use App\Http\Resources\Admin\ProductsResource;
use App\Repositories\ProductsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ProductsController extends AppBaseController
{
    /**
     * @var ProductsRepository
     */
    private ProductsRepository $productsRepository;

    /**
     * @param ProductsRepository $productsRepository
     */
    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    /**
     * Products's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return ProductsCollection
     */
    public function index(Request $request): ProductsCollection
    {
        $products = $this->productsRepository->fetch($request);

        return new ProductsCollection($products);
    }

    /**
     * Create Products with given payload.
     *
     * @param CreateProductsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ProductsResource
     */
    public function store(CreateProductsAPIRequest $request): ProductsResource
    {
        $input = $request->all();
        $products = $this->productsRepository->create($input);

        return new ProductsResource($products);
    }

    /**
     * Get single Products record.
     *
     * @param int $id
     *
     * @return ProductsResource
     */
    public function show(int $id): ProductsResource
    {
        $products = $this->productsRepository->findOrFail($id);

        return new ProductsResource($products);
    }

    /**
     * Update Products with given payload.
     *
     * @param UpdateProductsAPIRequest $request
     * @param int                      $id
     *
     * @throws ValidatorException
     *
     * @return ProductsResource
     */
    public function update(UpdateProductsAPIRequest $request, int $id): ProductsResource
    {
        $input = $request->all();
        $products = $this->productsRepository->update($input, $id);

        return new ProductsResource($products);
    }

    /**
     * Delete given Products.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->productsRepository->delete($id);

        return $this->successResponse('Products deleted successfully.');
    }

    /**
     * Bulk create Products's.
     *
     * @param BulkCreateProductsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ProductsCollection
     */
    public function bulkStore(BulkCreateProductsAPIRequest $request): ProductsCollection
    {
        $products = collect();

        $input = $request->get('data');
        foreach ($input as $key => $productsInput) {
            $products[$key] = $this->productsRepository->create($productsInput);
        }

        return new ProductsCollection($products);
    }

    /**
     * Bulk update Products's data.
     *
     * @param BulkUpdateProductsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ProductsCollection
     */
    public function bulkUpdate(BulkUpdateProductsAPIRequest $request): ProductsCollection
    {
        $products = collect();

        $input = $request->get('data');
        foreach ($input as $key => $productsInput) {
            $products[$key] = $this->productsRepository->update($productsInput, $productsInput['id']);
        }

        return new ProductsCollection($products);
    }
}
