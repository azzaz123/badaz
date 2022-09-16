<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateBlogImagesAPIRequest;
use App\Http\Requests\Admin\BulkUpdateBlogImagesAPIRequest;
use App\Http\Requests\Admin\CreateBlogImagesAPIRequest;
use App\Http\Requests\Admin\UpdateBlogImagesAPIRequest;
use App\Http\Resources\Admin\BlogImagesCollection;
use App\Http\Resources\Admin\BlogImagesResource;
use App\Repositories\BlogImagesRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class BlogImagesController extends AppBaseController
{
    /**
     * @var BlogImagesRepository
     */
    private BlogImagesRepository $blogImagesRepository;

    /**
     * @param BlogImagesRepository $blogImagesRepository
     */
    public function __construct(BlogImagesRepository $blogImagesRepository)
    {
        $this->blogImagesRepository = $blogImagesRepository;
    }

    /**
     * BlogImages's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return BlogImagesCollection
     */
    public function index(Request $request): BlogImagesCollection
    {
        $blogImages = $this->blogImagesRepository->fetch($request);

        return new BlogImagesCollection($blogImages);
    }

    /**
     * Create BlogImages with given payload.
     *
     * @param CreateBlogImagesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return BlogImagesResource
     */
    public function store(CreateBlogImagesAPIRequest $request): BlogImagesResource
    {
        $input = $request->all();
        $blogImages = $this->blogImagesRepository->create($input);

        return new BlogImagesResource($blogImages);
    }

    /**
     * Get single BlogImages record.
     *
     * @param int $id
     *
     * @return BlogImagesResource
     */
    public function show(int $id): BlogImagesResource
    {
        $blogImages = $this->blogImagesRepository->findOrFail($id);

        return new BlogImagesResource($blogImages);
    }

    /**
     * Update BlogImages with given payload.
     *
     * @param UpdateBlogImagesAPIRequest $request
     * @param int                        $id
     *
     * @throws ValidatorException
     *
     * @return BlogImagesResource
     */
    public function update(UpdateBlogImagesAPIRequest $request, int $id): BlogImagesResource
    {
        $input = $request->all();
        $blogImages = $this->blogImagesRepository->update($input, $id);

        return new BlogImagesResource($blogImages);
    }

    /**
     * Delete given BlogImages.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->blogImagesRepository->delete($id);

        return $this->successResponse('BlogImages deleted successfully.');
    }

    /**
     * Bulk create BlogImages's.
     *
     * @param BulkCreateBlogImagesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return BlogImagesCollection
     */
    public function bulkStore(BulkCreateBlogImagesAPIRequest $request): BlogImagesCollection
    {
        $blogImages = collect();

        $input = $request->get('data');
        foreach ($input as $key => $blogImagesInput) {
            $blogImages[$key] = $this->blogImagesRepository->create($blogImagesInput);
        }

        return new BlogImagesCollection($blogImages);
    }

    /**
     * Bulk update BlogImages's data.
     *
     * @param BulkUpdateBlogImagesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return BlogImagesCollection
     */
    public function bulkUpdate(BulkUpdateBlogImagesAPIRequest $request): BlogImagesCollection
    {
        $blogImages = collect();

        $input = $request->get('data');
        foreach ($input as $key => $blogImagesInput) {
            $blogImages[$key] = $this->blogImagesRepository->update($blogImagesInput, $blogImagesInput['id']);
        }

        return new BlogImagesCollection($blogImages);
    }
}
