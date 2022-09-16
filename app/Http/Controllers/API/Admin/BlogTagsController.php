<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateBlogTagsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateBlogTagsAPIRequest;
use App\Http\Requests\Admin\CreateBlogTagsAPIRequest;
use App\Http\Requests\Admin\UpdateBlogTagsAPIRequest;
use App\Http\Resources\Admin\BlogTagsCollection;
use App\Http\Resources\Admin\BlogTagsResource;
use App\Repositories\BlogTagsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class BlogTagsController extends AppBaseController
{
    /**
     * @var BlogTagsRepository
     */
    private BlogTagsRepository $blogTagsRepository;

    /**
     * @param BlogTagsRepository $blogTagsRepository
     */
    public function __construct(BlogTagsRepository $blogTagsRepository)
    {
        $this->blogTagsRepository = $blogTagsRepository;
    }

    /**
     * BlogTags's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return BlogTagsCollection
     */
    public function index(Request $request): BlogTagsCollection
    {
        $blogTags = $this->blogTagsRepository->fetch($request);

        return new BlogTagsCollection($blogTags);
    }

    /**
     * Create BlogTags with given payload.
     *
     * @param CreateBlogTagsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return BlogTagsResource
     */
    public function store(CreateBlogTagsAPIRequest $request): BlogTagsResource
    {
        $input = $request->all();
        $blogTags = $this->blogTagsRepository->create($input);

        return new BlogTagsResource($blogTags);
    }

    /**
     * Get single BlogTags record.
     *
     * @param int $id
     *
     * @return BlogTagsResource
     */
    public function show(int $id): BlogTagsResource
    {
        $blogTags = $this->blogTagsRepository->findOrFail($id);

        return new BlogTagsResource($blogTags);
    }

    /**
     * Update BlogTags with given payload.
     *
     * @param UpdateBlogTagsAPIRequest $request
     * @param int                      $id
     *
     * @throws ValidatorException
     *
     * @return BlogTagsResource
     */
    public function update(UpdateBlogTagsAPIRequest $request, int $id): BlogTagsResource
    {
        $input = $request->all();
        $blogTags = $this->blogTagsRepository->update($input, $id);

        return new BlogTagsResource($blogTags);
    }

    /**
     * Delete given BlogTags.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->blogTagsRepository->delete($id);

        return $this->successResponse('BlogTags deleted successfully.');
    }

    /**
     * Bulk create BlogTags's.
     *
     * @param BulkCreateBlogTagsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return BlogTagsCollection
     */
    public function bulkStore(BulkCreateBlogTagsAPIRequest $request): BlogTagsCollection
    {
        $blogTags = collect();

        $input = $request->get('data');
        foreach ($input as $key => $blogTagsInput) {
            $blogTags[$key] = $this->blogTagsRepository->create($blogTagsInput);
        }

        return new BlogTagsCollection($blogTags);
    }

    /**
     * Bulk update BlogTags's data.
     *
     * @param BulkUpdateBlogTagsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return BlogTagsCollection
     */
    public function bulkUpdate(BulkUpdateBlogTagsAPIRequest $request): BlogTagsCollection
    {
        $blogTags = collect();

        $input = $request->get('data');
        foreach ($input as $key => $blogTagsInput) {
            $blogTags[$key] = $this->blogTagsRepository->update($blogTagsInput, $blogTagsInput['id']);
        }

        return new BlogTagsCollection($blogTags);
    }
}
