<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateBlogPostsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateBlogPostsAPIRequest;
use App\Http\Requests\Admin\CreateBlogPostsAPIRequest;
use App\Http\Requests\Admin\UpdateBlogPostsAPIRequest;
use App\Http\Resources\Admin\BlogPostsCollection;
use App\Http\Resources\Admin\BlogPostsResource;
use App\Repositories\BlogPostsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class BlogPostsController extends AppBaseController
{
    /**
     * @var BlogPostsRepository
     */
    private BlogPostsRepository $blogPostsRepository;

    /**
     * @param BlogPostsRepository $blogPostsRepository
     */
    public function __construct(BlogPostsRepository $blogPostsRepository)
    {
        $this->blogPostsRepository = $blogPostsRepository;
    }

    /**
     * BlogPosts's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return BlogPostsCollection
     */
    public function index(Request $request): BlogPostsCollection
    {
        $blogPosts = $this->blogPostsRepository->fetch($request);

        return new BlogPostsCollection($blogPosts);
    }

    /**
     * Create BlogPosts with given payload.
     *
     * @param CreateBlogPostsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return BlogPostsResource
     */
    public function store(CreateBlogPostsAPIRequest $request): BlogPostsResource
    {
        $input = $request->all();
        $blogPosts = $this->blogPostsRepository->create($input);

        return new BlogPostsResource($blogPosts);
    }

    /**
     * Get single BlogPosts record.
     *
     * @param int $id
     *
     * @return BlogPostsResource
     */
    public function show(int $id): BlogPostsResource
    {
        $blogPosts = $this->blogPostsRepository->findOrFail($id);

        return new BlogPostsResource($blogPosts);
    }

    /**
     * Update BlogPosts with given payload.
     *
     * @param UpdateBlogPostsAPIRequest $request
     * @param int                       $id
     *
     * @throws ValidatorException
     *
     * @return BlogPostsResource
     */
    public function update(UpdateBlogPostsAPIRequest $request, int $id): BlogPostsResource
    {
        $input = $request->all();
        $blogPosts = $this->blogPostsRepository->update($input, $id);

        return new BlogPostsResource($blogPosts);
    }

    /**
     * Delete given BlogPosts.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->blogPostsRepository->delete($id);

        return $this->successResponse('BlogPosts deleted successfully.');
    }

    /**
     * Bulk create BlogPosts's.
     *
     * @param BulkCreateBlogPostsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return BlogPostsCollection
     */
    public function bulkStore(BulkCreateBlogPostsAPIRequest $request): BlogPostsCollection
    {
        $blogPosts = collect();

        $input = $request->get('data');
        foreach ($input as $key => $blogPostsInput) {
            $blogPosts[$key] = $this->blogPostsRepository->create($blogPostsInput);
        }

        return new BlogPostsCollection($blogPosts);
    }

    /**
     * Bulk update BlogPosts's data.
     *
     * @param BulkUpdateBlogPostsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return BlogPostsCollection
     */
    public function bulkUpdate(BulkUpdateBlogPostsAPIRequest $request): BlogPostsCollection
    {
        $blogPosts = collect();

        $input = $request->get('data');
        foreach ($input as $key => $blogPostsInput) {
            $blogPosts[$key] = $this->blogPostsRepository->update($blogPostsInput, $blogPostsInput['id']);
        }

        return new BlogPostsCollection($blogPosts);
    }
}
