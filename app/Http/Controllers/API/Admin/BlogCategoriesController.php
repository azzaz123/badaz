<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateBlogCategoriesAPIRequest;
use App\Http\Requests\Admin\BulkUpdateBlogCategoriesAPIRequest;
use App\Http\Requests\Admin\CreateBlogCategoriesAPIRequest;
use App\Http\Requests\Admin\UpdateBlogCategoriesAPIRequest;
use App\Http\Resources\Admin\BlogCategoriesCollection;
use App\Http\Resources\Admin\BlogCategoriesResource;
use App\Repositories\BlogCategoriesRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class BlogCategoriesController extends AppBaseController
{
    /**
     * @var BlogCategoriesRepository
     */
    private BlogCategoriesRepository $blogCategoriesRepository;

    /**
     * @param BlogCategoriesRepository $blogCategoriesRepository
     */
    public function __construct(BlogCategoriesRepository $blogCategoriesRepository)
    {
        $this->blogCategoriesRepository = $blogCategoriesRepository;
    }

    /**
     * BlogCategories's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return BlogCategoriesCollection
     */
    public function index(Request $request): BlogCategoriesCollection
    {
        $blogCategories = $this->blogCategoriesRepository->fetch($request);

        return new BlogCategoriesCollection($blogCategories);
    }

    /**
     * Create BlogCategories with given payload.
     *
     * @param CreateBlogCategoriesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return BlogCategoriesResource
     */
    public function store(CreateBlogCategoriesAPIRequest $request): BlogCategoriesResource
    {
        $input = $request->all();
        $blogCategories = $this->blogCategoriesRepository->create($input);

        return new BlogCategoriesResource($blogCategories);
    }

    /**
     * Get single BlogCategories record.
     *
     * @param int $id
     *
     * @return BlogCategoriesResource
     */
    public function show(int $id): BlogCategoriesResource
    {
        $blogCategories = $this->blogCategoriesRepository->findOrFail($id);

        return new BlogCategoriesResource($blogCategories);
    }

    /**
     * Update BlogCategories with given payload.
     *
     * @param UpdateBlogCategoriesAPIRequest $request
     * @param int                            $id
     *
     * @throws ValidatorException
     *
     * @return BlogCategoriesResource
     */
    public function update(UpdateBlogCategoriesAPIRequest $request, int $id): BlogCategoriesResource
    {
        $input = $request->all();
        $blogCategories = $this->blogCategoriesRepository->update($input, $id);

        return new BlogCategoriesResource($blogCategories);
    }

    /**
     * Delete given BlogCategories.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->blogCategoriesRepository->delete($id);

        return $this->successResponse('BlogCategories deleted successfully.');
    }

    /**
     * Bulk create BlogCategories's.
     *
     * @param BulkCreateBlogCategoriesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return BlogCategoriesCollection
     */
    public function bulkStore(BulkCreateBlogCategoriesAPIRequest $request): BlogCategoriesCollection
    {
        $blogCategories = collect();

        $input = $request->get('data');
        foreach ($input as $key => $blogCategoriesInput) {
            $blogCategories[$key] = $this->blogCategoriesRepository->create($blogCategoriesInput);
        }

        return new BlogCategoriesCollection($blogCategories);
    }

    /**
     * Bulk update BlogCategories's data.
     *
     * @param BulkUpdateBlogCategoriesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return BlogCategoriesCollection
     */
    public function bulkUpdate(BulkUpdateBlogCategoriesAPIRequest $request): BlogCategoriesCollection
    {
        $blogCategories = collect();

        $input = $request->get('data');
        foreach ($input as $key => $blogCategoriesInput) {
            $blogCategories[$key] = $this->blogCategoriesRepository->update($blogCategoriesInput, $blogCategoriesInput['id']);
        }

        return new BlogCategoriesCollection($blogCategories);
    }
}
