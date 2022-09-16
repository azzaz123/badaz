<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateKnowledgeBaseCategoriesAPIRequest;
use App\Http\Requests\Device\BulkUpdateKnowledgeBaseCategoriesAPIRequest;
use App\Http\Requests\Device\CreateKnowledgeBaseCategoriesAPIRequest;
use App\Http\Requests\Device\UpdateKnowledgeBaseCategoriesAPIRequest;
use App\Http\Resources\Device\KnowledgeBaseCategoriesCollection;
use App\Http\Resources\Device\KnowledgeBaseCategoriesResource;
use App\Repositories\KnowledgeBaseCategoriesRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class KnowledgeBaseCategoriesController extends AppBaseController
{
    /**
     * @var KnowledgeBaseCategoriesRepository
     */
    private KnowledgeBaseCategoriesRepository $knowledgeBaseCategoriesRepository;

    /**
     * @param KnowledgeBaseCategoriesRepository $knowledgeBaseCategoriesRepository
     */
    public function __construct(KnowledgeBaseCategoriesRepository $knowledgeBaseCategoriesRepository)
    {
        $this->knowledgeBaseCategoriesRepository = $knowledgeBaseCategoriesRepository;
    }

    /**
     * KnowledgeBaseCategories's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return KnowledgeBaseCategoriesCollection
     */
    public function index(Request $request): KnowledgeBaseCategoriesCollection
    {
        $knowledgeBaseCategories = $this->knowledgeBaseCategoriesRepository->fetch($request);

        return new KnowledgeBaseCategoriesCollection($knowledgeBaseCategories);
    }

    /**
     * Create KnowledgeBaseCategories with given payload.
     *
     * @param CreateKnowledgeBaseCategoriesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return KnowledgeBaseCategoriesResource
     */
    public function store(CreateKnowledgeBaseCategoriesAPIRequest $request): KnowledgeBaseCategoriesResource
    {
        $input = $request->all();
        $knowledgeBaseCategories = $this->knowledgeBaseCategoriesRepository->create($input);

        return new KnowledgeBaseCategoriesResource($knowledgeBaseCategories);
    }

    /**
     * Get single KnowledgeBaseCategories record.
     *
     * @param int $id
     *
     * @return KnowledgeBaseCategoriesResource
     */
    public function show(int $id): KnowledgeBaseCategoriesResource
    {
        $knowledgeBaseCategories = $this->knowledgeBaseCategoriesRepository->findOrFail($id);

        return new KnowledgeBaseCategoriesResource($knowledgeBaseCategories);
    }

    /**
     * Update KnowledgeBaseCategories with given payload.
     *
     * @param UpdateKnowledgeBaseCategoriesAPIRequest $request
     * @param int                                     $id
     *
     * @throws ValidatorException
     *
     * @return KnowledgeBaseCategoriesResource
     */
    public function update(UpdateKnowledgeBaseCategoriesAPIRequest $request, int $id): KnowledgeBaseCategoriesResource
    {
        $input = $request->all();
        $knowledgeBaseCategories = $this->knowledgeBaseCategoriesRepository->update($input, $id);

        return new KnowledgeBaseCategoriesResource($knowledgeBaseCategories);
    }

    /**
     * Delete given KnowledgeBaseCategories.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->knowledgeBaseCategoriesRepository->delete($id);

        return $this->successResponse('KnowledgeBaseCategories deleted successfully.');
    }

    /**
     * Bulk create KnowledgeBaseCategories's.
     *
     * @param BulkCreateKnowledgeBaseCategoriesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return KnowledgeBaseCategoriesCollection
     */
    public function bulkStore(BulkCreateKnowledgeBaseCategoriesAPIRequest $request): KnowledgeBaseCategoriesCollection
    {
        $knowledgeBaseCategories = collect();

        $input = $request->get('data');
        foreach ($input as $key => $knowledgeBaseCategoriesInput) {
            $knowledgeBaseCategories[$key] = $this->knowledgeBaseCategoriesRepository->create($knowledgeBaseCategoriesInput);
        }

        return new KnowledgeBaseCategoriesCollection($knowledgeBaseCategories);
    }

    /**
     * Bulk update KnowledgeBaseCategories's data.
     *
     * @param BulkUpdateKnowledgeBaseCategoriesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return KnowledgeBaseCategoriesCollection
     */
    public function bulkUpdate(BulkUpdateKnowledgeBaseCategoriesAPIRequest $request): KnowledgeBaseCategoriesCollection
    {
        $knowledgeBaseCategories = collect();

        $input = $request->get('data');
        foreach ($input as $key => $knowledgeBaseCategoriesInput) {
            $knowledgeBaseCategories[$key] = $this->knowledgeBaseCategoriesRepository->update($knowledgeBaseCategoriesInput, $knowledgeBaseCategoriesInput['id']);
        }

        return new KnowledgeBaseCategoriesCollection($knowledgeBaseCategories);
    }
}
