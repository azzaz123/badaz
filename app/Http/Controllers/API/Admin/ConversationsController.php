<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateConversationsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateConversationsAPIRequest;
use App\Http\Requests\Admin\CreateConversationsAPIRequest;
use App\Http\Requests\Admin\UpdateConversationsAPIRequest;
use App\Http\Resources\Admin\ConversationsCollection;
use App\Http\Resources\Admin\ConversationsResource;
use App\Repositories\ConversationsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ConversationsController extends AppBaseController
{
    /**
     * @var ConversationsRepository
     */
    private ConversationsRepository $conversationsRepository;

    /**
     * @param ConversationsRepository $conversationsRepository
     */
    public function __construct(ConversationsRepository $conversationsRepository)
    {
        $this->conversationsRepository = $conversationsRepository;
    }

    /**
     * Conversations's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return ConversationsCollection
     */
    public function index(Request $request): ConversationsCollection
    {
        $conversations = $this->conversationsRepository->fetch($request);

        return new ConversationsCollection($conversations);
    }

    /**
     * Create Conversations with given payload.
     *
     * @param CreateConversationsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ConversationsResource
     */
    public function store(CreateConversationsAPIRequest $request): ConversationsResource
    {
        $input = $request->all();
        $conversations = $this->conversationsRepository->create($input);

        return new ConversationsResource($conversations);
    }

    /**
     * Get single Conversations record.
     *
     * @param int $id
     *
     * @return ConversationsResource
     */
    public function show(int $id): ConversationsResource
    {
        $conversations = $this->conversationsRepository->findOrFail($id);

        return new ConversationsResource($conversations);
    }

    /**
     * Update Conversations with given payload.
     *
     * @param UpdateConversationsAPIRequest $request
     * @param int                           $id
     *
     * @throws ValidatorException
     *
     * @return ConversationsResource
     */
    public function update(UpdateConversationsAPIRequest $request, int $id): ConversationsResource
    {
        $input = $request->all();
        $conversations = $this->conversationsRepository->update($input, $id);

        return new ConversationsResource($conversations);
    }

    /**
     * Delete given Conversations.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->conversationsRepository->delete($id);

        return $this->successResponse('Conversations deleted successfully.');
    }

    /**
     * Bulk create Conversations's.
     *
     * @param BulkCreateConversationsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ConversationsCollection
     */
    public function bulkStore(BulkCreateConversationsAPIRequest $request): ConversationsCollection
    {
        $conversations = collect();

        $input = $request->get('data');
        foreach ($input as $key => $conversationsInput) {
            $conversations[$key] = $this->conversationsRepository->create($conversationsInput);
        }

        return new ConversationsCollection($conversations);
    }

    /**
     * Bulk update Conversations's data.
     *
     * @param BulkUpdateConversationsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ConversationsCollection
     */
    public function bulkUpdate(BulkUpdateConversationsAPIRequest $request): ConversationsCollection
    {
        $conversations = collect();

        $input = $request->get('data');
        foreach ($input as $key => $conversationsInput) {
            $conversations[$key] = $this->conversationsRepository->update($conversationsInput, $conversationsInput['id']);
        }

        return new ConversationsCollection($conversations);
    }
}
