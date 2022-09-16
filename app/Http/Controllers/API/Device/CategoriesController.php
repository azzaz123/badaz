<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateCategoriesAPIRequest;
use App\Http\Requests\Device\BulkUpdateCategoriesAPIRequest;
use App\Http\Requests\Device\CreateCategoriesAPIRequest;
use App\Http\Requests\Device\UpdateCategoriesAPIRequest;
use App\Http\Resources\Device\CategoriesCollection;
use App\Http\Resources\Device\CategoriesResource;
use App\Repositories\CategoriesRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class CategoriesController extends AppBaseController
{
    /**
     * @var CategoriesRepository
     */
    private CategoriesRepository $categoriesRepository;

    /**
     * @param CategoriesRepository $categoriesRepository
     */
    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    /**
     * Categories's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return CategoriesCollection
     */
    public function index(Request $request): CategoriesCollection
    {
        $categories = $this->categoriesRepository->fetch($request);

        return new CategoriesCollection($categories);
    }

    /**
     * Create Categories with given payload.
     *
     * @param CreateCategoriesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CategoriesResource
     */
    public function store(CreateCategoriesAPIRequest $request): CategoriesResource
    {
        $input = $request->all();
        $categories = $this->categoriesRepository->create($input);

        return new CategoriesResource($categories);
    }

    /**
     * Get single Categories record.
     *
     * @param int $id
     *
     * @return CategoriesResource
     */
    public function show(int $id): CategoriesResource
    {
        $categories = $this->categoriesRepository->findOrFail($id);

        return new CategoriesResource($categories);
    }

    /**
     * Update Categories with given payload.
     *
     * @param UpdateCategoriesAPIRequest $request
     * @param int                        $id
     *
     * @throws ValidatorException
     *
     * @return CategoriesResource
     */
    public function update(UpdateCategoriesAPIRequest $request, int $id): CategoriesResource
    {
        $input = $request->all();
        $categories = $this->categoriesRepository->update($input, $id);

        return new CategoriesResource($categories);
    }

    /**
     * Delete given Categories.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->categoriesRepository->delete($id);

        return $this->successResponse('Categories deleted successfully.');
    }

    /**
     * Bulk create Categories's.
     *
     * @param BulkCreateCategoriesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CategoriesCollection
     */
    public function bulkStore(BulkCreateCategoriesAPIRequest $request): CategoriesCollection
    {
        $categories = collect();

        $input = $request->get('data');
        foreach ($input as $key => $categoriesInput) {
            $categories[$key] = $this->categoriesRepository->create($categoriesInput);
        }

        return new CategoriesCollection($categories);
    }

    /**
     * Bulk update Categories's data.
     *
     * @param BulkUpdateCategoriesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CategoriesCollection
     */
    public function bulkUpdate(BulkUpdateCategoriesAPIRequest $request): CategoriesCollection
    {
        $categories = collect();

        $input = $request->get('data');
        foreach ($input as $key => $categoriesInput) {
            $categories[$key] = $this->categoriesRepository->update($categoriesInput, $categoriesInput['id']);
        }

        return new CategoriesCollection($categories);
    }
}
