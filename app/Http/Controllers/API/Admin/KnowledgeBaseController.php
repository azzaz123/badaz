<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateKnowledgeBaseAPIRequest;
use App\Http\Requests\Admin\BulkUpdateKnowledgeBaseAPIRequest;
use App\Http\Requests\Admin\CreateKnowledgeBaseAPIRequest;
use App\Http\Requests\Admin\UpdateKnowledgeBaseAPIRequest;
use App\Http\Resources\Admin\KnowledgeBaseCollection;
use App\Http\Resources\Admin\KnowledgeBaseResource;
use App\Repositories\KnowledgeBaseRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class KnowledgeBaseController extends AppBaseController
{
    /**
     * @var KnowledgeBaseRepository
     */
    private KnowledgeBaseRepository $knowledgeBaseRepository;

    /**
     * @param KnowledgeBaseRepository $knowledgeBaseRepository
     */
    public function __construct(KnowledgeBaseRepository $knowledgeBaseRepository)
    {
        $this->knowledgeBaseRepository = $knowledgeBaseRepository;
    }

    /**
     * KnowledgeBase's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return KnowledgeBaseCollection
     */
    public function index(Request $request): KnowledgeBaseCollection
    {
        $knowledgeBases = $this->knowledgeBaseRepository->fetch($request);

        return new KnowledgeBaseCollection($knowledgeBases);
    }

    /**
     * Create KnowledgeBase with given payload.
     *
     * @param CreateKnowledgeBaseAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return KnowledgeBaseResource
     */
    public function store(CreateKnowledgeBaseAPIRequest $request): KnowledgeBaseResource
    {
        $input = $request->all();
        $knowledgeBase = $this->knowledgeBaseRepository->create($input);

        return new KnowledgeBaseResource($knowledgeBase);
    }

    /**
     * Get single KnowledgeBase record.
     *
     * @param int $id
     *
     * @return KnowledgeBaseResource
     */
    public function show(int $id): KnowledgeBaseResource
    {
        $knowledgeBase = $this->knowledgeBaseRepository->findOrFail($id);

        return new KnowledgeBaseResource($knowledgeBase);
    }

    /**
     * Update KnowledgeBase with given payload.
     *
     * @param UpdateKnowledgeBaseAPIRequest $request
     * @param int                           $id
     *
     * @throws ValidatorException
     *
     * @return KnowledgeBaseResource
     */
    public function update(UpdateKnowledgeBaseAPIRequest $request, int $id): KnowledgeBaseResource
    {
        $input = $request->all();
        $knowledgeBase = $this->knowledgeBaseRepository->update($input, $id);

        return new KnowledgeBaseResource($knowledgeBase);
    }

    /**
     * Delete given KnowledgeBase.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->knowledgeBaseRepository->delete($id);

        return $this->successResponse('KnowledgeBase deleted successfully.');
    }

    /**
     * Bulk create KnowledgeBase's.
     *
     * @param BulkCreateKnowledgeBaseAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return KnowledgeBaseCollection
     */
    public function bulkStore(BulkCreateKnowledgeBaseAPIRequest $request): KnowledgeBaseCollection
    {
        $knowledgeBases = collect();

        $input = $request->get('data');
        foreach ($input as $key => $knowledgeBaseInput) {
            $knowledgeBases[$key] = $this->knowledgeBaseRepository->create($knowledgeBaseInput);
        }

        return new KnowledgeBaseCollection($knowledgeBases);
    }

    /**
     * Bulk update KnowledgeBase's data.
     *
     * @param BulkUpdateKnowledgeBaseAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return KnowledgeBaseCollection
     */
    public function bulkUpdate(BulkUpdateKnowledgeBaseAPIRequest $request): KnowledgeBaseCollection
    {
        $knowledgeBases = collect();

        $input = $request->get('data');
        foreach ($input as $key => $knowledgeBaseInput) {
            $knowledgeBases[$key] = $this->knowledgeBaseRepository->update($knowledgeBaseInput, $knowledgeBaseInput['id']);
        }

        return new KnowledgeBaseCollection($knowledgeBases);
    }
}
