<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateCategoriesLangAPIRequest;
use App\Http\Requests\Device\BulkUpdateCategoriesLangAPIRequest;
use App\Http\Requests\Device\CreateCategoriesLangAPIRequest;
use App\Http\Requests\Device\UpdateCategoriesLangAPIRequest;
use App\Http\Resources\Device\CategoriesLangCollection;
use App\Http\Resources\Device\CategoriesLangResource;
use App\Repositories\CategoriesLangRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class CategoriesLangController extends AppBaseController
{
    /**
     * @var CategoriesLangRepository
     */
    private CategoriesLangRepository $categoriesLangRepository;

    /**
     * @param CategoriesLangRepository $categoriesLangRepository
     */
    public function __construct(CategoriesLangRepository $categoriesLangRepository)
    {
        $this->categoriesLangRepository = $categoriesLangRepository;
    }

    /**
     * CategoriesLang's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return CategoriesLangCollection
     */
    public function index(Request $request): CategoriesLangCollection
    {
        $categoriesLangs = $this->categoriesLangRepository->fetch($request);

        return new CategoriesLangCollection($categoriesLangs);
    }

    /**
     * Create CategoriesLang with given payload.
     *
     * @param CreateCategoriesLangAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CategoriesLangResource
     */
    public function store(CreateCategoriesLangAPIRequest $request): CategoriesLangResource
    {
        $input = $request->all();
        $categoriesLang = $this->categoriesLangRepository->create($input);

        return new CategoriesLangResource($categoriesLang);
    }

    /**
     * Get single CategoriesLang record.
     *
     * @param int $id
     *
     * @return CategoriesLangResource
     */
    public function show(int $id): CategoriesLangResource
    {
        $categoriesLang = $this->categoriesLangRepository->findOrFail($id);

        return new CategoriesLangResource($categoriesLang);
    }

    /**
     * Update CategoriesLang with given payload.
     *
     * @param UpdateCategoriesLangAPIRequest $request
     * @param int                            $id
     *
     * @throws ValidatorException
     *
     * @return CategoriesLangResource
     */
    public function update(UpdateCategoriesLangAPIRequest $request, int $id): CategoriesLangResource
    {
        $input = $request->all();
        $categoriesLang = $this->categoriesLangRepository->update($input, $id);

        return new CategoriesLangResource($categoriesLang);
    }

    /**
     * Delete given CategoriesLang.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->categoriesLangRepository->delete($id);

        return $this->successResponse('CategoriesLang deleted successfully.');
    }

    /**
     * Bulk create CategoriesLang's.
     *
     * @param BulkCreateCategoriesLangAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CategoriesLangCollection
     */
    public function bulkStore(BulkCreateCategoriesLangAPIRequest $request): CategoriesLangCollection
    {
        $categoriesLangs = collect();

        $input = $request->get('data');
        foreach ($input as $key => $categoriesLangInput) {
            $categoriesLangs[$key] = $this->categoriesLangRepository->create($categoriesLangInput);
        }

        return new CategoriesLangCollection($categoriesLangs);
    }

    /**
     * Bulk update CategoriesLang's data.
     *
     * @param BulkUpdateCategoriesLangAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CategoriesLangCollection
     */
    public function bulkUpdate(BulkUpdateCategoriesLangAPIRequest $request): CategoriesLangCollection
    {
        $categoriesLangs = collect();

        $input = $request->get('data');
        foreach ($input as $key => $categoriesLangInput) {
            $categoriesLangs[$key] = $this->categoriesLangRepository->update($categoriesLangInput, $categoriesLangInput['id']);
        }

        return new CategoriesLangCollection($categoriesLangs);
    }
}
