<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateReviewsAPIRequest;
use App\Http\Requests\Device\BulkUpdateReviewsAPIRequest;
use App\Http\Requests\Device\CreateReviewsAPIRequest;
use App\Http\Requests\Device\UpdateReviewsAPIRequest;
use App\Http\Resources\Device\ReviewsCollection;
use App\Http\Resources\Device\ReviewsResource;
use App\Repositories\ReviewsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ReviewsController extends AppBaseController
{
    /**
     * @var ReviewsRepository
     */
    private ReviewsRepository $reviewsRepository;

    /**
     * @param ReviewsRepository $reviewsRepository
     */
    public function __construct(ReviewsRepository $reviewsRepository)
    {
        $this->reviewsRepository = $reviewsRepository;
    }

    /**
     * Reviews's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return ReviewsCollection
     */
    public function index(Request $request): ReviewsCollection
    {
        $reviews = $this->reviewsRepository->fetch($request);

        return new ReviewsCollection($reviews);
    }

    /**
     * Create Reviews with given payload.
     *
     * @param CreateReviewsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ReviewsResource
     */
    public function store(CreateReviewsAPIRequest $request): ReviewsResource
    {
        $input = $request->all();
        $reviews = $this->reviewsRepository->create($input);

        return new ReviewsResource($reviews);
    }

    /**
     * Get single Reviews record.
     *
     * @param int $id
     *
     * @return ReviewsResource
     */
    public function show(int $id): ReviewsResource
    {
        $reviews = $this->reviewsRepository->findOrFail($id);

        return new ReviewsResource($reviews);
    }

    /**
     * Update Reviews with given payload.
     *
     * @param UpdateReviewsAPIRequest $request
     * @param int                     $id
     *
     * @throws ValidatorException
     *
     * @return ReviewsResource
     */
    public function update(UpdateReviewsAPIRequest $request, int $id): ReviewsResource
    {
        $input = $request->all();
        $reviews = $this->reviewsRepository->update($input, $id);

        return new ReviewsResource($reviews);
    }

    /**
     * Delete given Reviews.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->reviewsRepository->delete($id);

        return $this->successResponse('Reviews deleted successfully.');
    }

    /**
     * Bulk create Reviews's.
     *
     * @param BulkCreateReviewsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ReviewsCollection
     */
    public function bulkStore(BulkCreateReviewsAPIRequest $request): ReviewsCollection
    {
        $reviews = collect();

        $input = $request->get('data');
        foreach ($input as $key => $reviewsInput) {
            $reviews[$key] = $this->reviewsRepository->create($reviewsInput);
        }

        return new ReviewsCollection($reviews);
    }

    /**
     * Bulk update Reviews's data.
     *
     * @param BulkUpdateReviewsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ReviewsCollection
     */
    public function bulkUpdate(BulkUpdateReviewsAPIRequest $request): ReviewsCollection
    {
        $reviews = collect();

        $input = $request->get('data');
        foreach ($input as $key => $reviewsInput) {
            $reviews[$key] = $this->reviewsRepository->update($reviewsInput, $reviewsInput['id']);
        }

        return new ReviewsCollection($reviews);
    }
}
