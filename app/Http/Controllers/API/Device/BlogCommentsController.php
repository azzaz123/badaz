<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateBlogCommentsAPIRequest;
use App\Http\Requests\Device\BulkUpdateBlogCommentsAPIRequest;
use App\Http\Requests\Device\CreateBlogCommentsAPIRequest;
use App\Http\Requests\Device\UpdateBlogCommentsAPIRequest;
use App\Http\Resources\Device\BlogCommentsCollection;
use App\Http\Resources\Device\BlogCommentsResource;
use App\Repositories\BlogCommentsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class BlogCommentsController extends AppBaseController
{
    /**
     * @var BlogCommentsRepository
     */
    private BlogCommentsRepository $blogCommentsRepository;

    /**
     * @param BlogCommentsRepository $blogCommentsRepository
     */
    public function __construct(BlogCommentsRepository $blogCommentsRepository)
    {
        $this->blogCommentsRepository = $blogCommentsRepository;
    }

    /**
     * BlogComments's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return BlogCommentsCollection
     */
    public function index(Request $request): BlogCommentsCollection
    {
        $blogComments = $this->blogCommentsRepository->fetch($request);

        return new BlogCommentsCollection($blogComments);
    }

    /**
     * Create BlogComments with given payload.
     *
     * @param CreateBlogCommentsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return BlogCommentsResource
     */
    public function store(CreateBlogCommentsAPIRequest $request): BlogCommentsResource
    {
        $input = $request->all();
        $blogComments = $this->blogCommentsRepository->create($input);

        return new BlogCommentsResource($blogComments);
    }

    /**
     * Get single BlogComments record.
     *
     * @param int $id
     *
     * @return BlogCommentsResource
     */
    public function show(int $id): BlogCommentsResource
    {
        $blogComments = $this->blogCommentsRepository->findOrFail($id);

        return new BlogCommentsResource($blogComments);
    }

    /**
     * Update BlogComments with given payload.
     *
     * @param UpdateBlogCommentsAPIRequest $request
     * @param int                          $id
     *
     * @throws ValidatorException
     *
     * @return BlogCommentsResource
     */
    public function update(UpdateBlogCommentsAPIRequest $request, int $id): BlogCommentsResource
    {
        $input = $request->all();
        $blogComments = $this->blogCommentsRepository->update($input, $id);

        return new BlogCommentsResource($blogComments);
    }

    /**
     * Delete given BlogComments.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->blogCommentsRepository->delete($id);

        return $this->successResponse('BlogComments deleted successfully.');
    }

    /**
     * Bulk create BlogComments's.
     *
     * @param BulkCreateBlogCommentsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return BlogCommentsCollection
     */
    public function bulkStore(BulkCreateBlogCommentsAPIRequest $request): BlogCommentsCollection
    {
        $blogComments = collect();

        $input = $request->get('data');
        foreach ($input as $key => $blogCommentsInput) {
            $blogComments[$key] = $this->blogCommentsRepository->create($blogCommentsInput);
        }

        return new BlogCommentsCollection($blogComments);
    }

    /**
     * Bulk update BlogComments's data.
     *
     * @param BulkUpdateBlogCommentsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return BlogCommentsCollection
     */
    public function bulkUpdate(BulkUpdateBlogCommentsAPIRequest $request): BlogCommentsCollection
    {
        $blogComments = collect();

        $input = $request->get('data');
        foreach ($input as $key => $blogCommentsInput) {
            $blogComments[$key] = $this->blogCommentsRepository->update($blogCommentsInput, $blogCommentsInput['id']);
        }

        return new BlogCommentsCollection($blogComments);
    }
}
