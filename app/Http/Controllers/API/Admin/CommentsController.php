<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateCommentsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateCommentsAPIRequest;
use App\Http\Requests\Admin\CreateCommentsAPIRequest;
use App\Http\Requests\Admin\UpdateCommentsAPIRequest;
use App\Http\Resources\Admin\CommentsCollection;
use App\Http\Resources\Admin\CommentsResource;
use App\Repositories\CommentsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class CommentsController extends AppBaseController
{
    /**
     * @var CommentsRepository
     */
    private CommentsRepository $commentsRepository;

    /**
     * @param CommentsRepository $commentsRepository
     */
    public function __construct(CommentsRepository $commentsRepository)
    {
        $this->commentsRepository = $commentsRepository;
    }

    /**
     * Comments's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return CommentsCollection
     */
    public function index(Request $request): CommentsCollection
    {
        $comments = $this->commentsRepository->fetch($request);

        return new CommentsCollection($comments);
    }

    /**
     * Create Comments with given payload.
     *
     * @param CreateCommentsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CommentsResource
     */
    public function store(CreateCommentsAPIRequest $request): CommentsResource
    {
        $input = $request->all();
        $comments = $this->commentsRepository->create($input);

        return new CommentsResource($comments);
    }

    /**
     * Get single Comments record.
     *
     * @param int $id
     *
     * @return CommentsResource
     */
    public function show(int $id): CommentsResource
    {
        $comments = $this->commentsRepository->findOrFail($id);

        return new CommentsResource($comments);
    }

    /**
     * Update Comments with given payload.
     *
     * @param UpdateCommentsAPIRequest $request
     * @param int                      $id
     *
     * @throws ValidatorException
     *
     * @return CommentsResource
     */
    public function update(UpdateCommentsAPIRequest $request, int $id): CommentsResource
    {
        $input = $request->all();
        $comments = $this->commentsRepository->update($input, $id);

        return new CommentsResource($comments);
    }

    /**
     * Delete given Comments.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->commentsRepository->delete($id);

        return $this->successResponse('Comments deleted successfully.');
    }

    /**
     * Bulk create Comments's.
     *
     * @param BulkCreateCommentsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CommentsCollection
     */
    public function bulkStore(BulkCreateCommentsAPIRequest $request): CommentsCollection
    {
        $comments = collect();

        $input = $request->get('data');
        foreach ($input as $key => $commentsInput) {
            $comments[$key] = $this->commentsRepository->create($commentsInput);
        }

        return new CommentsCollection($comments);
    }

    /**
     * Bulk update Comments's data.
     *
     * @param BulkUpdateCommentsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CommentsCollection
     */
    public function bulkUpdate(BulkUpdateCommentsAPIRequest $request): CommentsCollection
    {
        $comments = collect();

        $input = $request->get('data');
        foreach ($input as $key => $commentsInput) {
            $comments[$key] = $this->commentsRepository->update($commentsInput, $commentsInput['id']);
        }

        return new CommentsCollection($comments);
    }
}
