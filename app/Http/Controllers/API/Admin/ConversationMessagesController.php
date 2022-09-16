<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateConversationMessagesAPIRequest;
use App\Http\Requests\Admin\BulkUpdateConversationMessagesAPIRequest;
use App\Http\Requests\Admin\CreateConversationMessagesAPIRequest;
use App\Http\Requests\Admin\UpdateConversationMessagesAPIRequest;
use App\Http\Resources\Admin\ConversationMessagesCollection;
use App\Http\Resources\Admin\ConversationMessagesResource;
use App\Repositories\ConversationMessagesRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ConversationMessagesController extends AppBaseController
{
    /**
     * @var ConversationMessagesRepository
     */
    private ConversationMessagesRepository $conversationMessagesRepository;

    /**
     * @param ConversationMessagesRepository $conversationMessagesRepository
     */
    public function __construct(ConversationMessagesRepository $conversationMessagesRepository)
    {
        $this->conversationMessagesRepository = $conversationMessagesRepository;
    }

    /**
     * ConversationMessages's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return ConversationMessagesCollection
     */
    public function index(Request $request): ConversationMessagesCollection
    {
        $conversationMessages = $this->conversationMessagesRepository->fetch($request);

        return new ConversationMessagesCollection($conversationMessages);
    }

    /**
     * Create ConversationMessages with given payload.
     *
     * @param CreateConversationMessagesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ConversationMessagesResource
     */
    public function store(CreateConversationMessagesAPIRequest $request): ConversationMessagesResource
    {
        $input = $request->all();
        $conversationMessages = $this->conversationMessagesRepository->create($input);

        return new ConversationMessagesResource($conversationMessages);
    }

    /**
     * Get single ConversationMessages record.
     *
     * @param int $id
     *
     * @return ConversationMessagesResource
     */
    public function show(int $id): ConversationMessagesResource
    {
        $conversationMessages = $this->conversationMessagesRepository->findOrFail($id);

        return new ConversationMessagesResource($conversationMessages);
    }

    /**
     * Update ConversationMessages with given payload.
     *
     * @param UpdateConversationMessagesAPIRequest $request
     * @param int                                  $id
     *
     * @throws ValidatorException
     *
     * @return ConversationMessagesResource
     */
    public function update(UpdateConversationMessagesAPIRequest $request, int $id): ConversationMessagesResource
    {
        $input = $request->all();
        $conversationMessages = $this->conversationMessagesRepository->update($input, $id);

        return new ConversationMessagesResource($conversationMessages);
    }

    /**
     * Delete given ConversationMessages.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->conversationMessagesRepository->delete($id);

        return $this->successResponse('ConversationMessages deleted successfully.');
    }

    /**
     * Bulk create ConversationMessages's.
     *
     * @param BulkCreateConversationMessagesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ConversationMessagesCollection
     */
    public function bulkStore(BulkCreateConversationMessagesAPIRequest $request): ConversationMessagesCollection
    {
        $conversationMessages = collect();

        $input = $request->get('data');
        foreach ($input as $key => $conversationMessagesInput) {
            $conversationMessages[$key] = $this->conversationMessagesRepository->create($conversationMessagesInput);
        }

        return new ConversationMessagesCollection($conversationMessages);
    }

    /**
     * Bulk update ConversationMessages's data.
     *
     * @param BulkUpdateConversationMessagesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ConversationMessagesCollection
     */
    public function bulkUpdate(BulkUpdateConversationMessagesAPIRequest $request): ConversationMessagesCollection
    {
        $conversationMessages = collect();

        $input = $request->get('data');
        foreach ($input as $key => $conversationMessagesInput) {
            $conversationMessages[$key] = $this->conversationMessagesRepository->update($conversationMessagesInput, $conversationMessagesInput['id']);
        }

        return new ConversationMessagesCollection($conversationMessages);
    }
}
