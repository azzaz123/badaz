<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateQuoteRequestsAPIRequest;
use App\Http\Requests\Device\BulkUpdateQuoteRequestsAPIRequest;
use App\Http\Requests\Device\CreateQuoteRequestsAPIRequest;
use App\Http\Requests\Device\UpdateQuoteRequestsAPIRequest;
use App\Http\Resources\Device\QuoteRequestsCollection;
use App\Http\Resources\Device\QuoteRequestsResource;
use App\Repositories\QuoteRequestsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class QuoteRequestsController extends AppBaseController
{
    /**
     * @var QuoteRequestsRepository
     */
    private QuoteRequestsRepository $quoteRequestsRepository;

    /**
     * @param QuoteRequestsRepository $quoteRequestsRepository
     */
    public function __construct(QuoteRequestsRepository $quoteRequestsRepository)
    {
        $this->quoteRequestsRepository = $quoteRequestsRepository;
    }

    /**
     * QuoteRequests's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return QuoteRequestsCollection
     */
    public function index(Request $request): QuoteRequestsCollection
    {
        $quoteRequests = $this->quoteRequestsRepository->fetch($request);

        return new QuoteRequestsCollection($quoteRequests);
    }

    /**
     * Create QuoteRequests with given payload.
     *
     * @param CreateQuoteRequestsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return QuoteRequestsResource
     */
    public function store(CreateQuoteRequestsAPIRequest $request): QuoteRequestsResource
    {
        $input = $request->all();
        $quoteRequests = $this->quoteRequestsRepository->create($input);

        return new QuoteRequestsResource($quoteRequests);
    }

    /**
     * Get single QuoteRequests record.
     *
     * @param int $id
     *
     * @return QuoteRequestsResource
     */
    public function show(int $id): QuoteRequestsResource
    {
        $quoteRequests = $this->quoteRequestsRepository->findOrFail($id);

        return new QuoteRequestsResource($quoteRequests);
    }

    /**
     * Update QuoteRequests with given payload.
     *
     * @param UpdateQuoteRequestsAPIRequest $request
     * @param int                           $id
     *
     * @throws ValidatorException
     *
     * @return QuoteRequestsResource
     */
    public function update(UpdateQuoteRequestsAPIRequest $request, int $id): QuoteRequestsResource
    {
        $input = $request->all();
        $quoteRequests = $this->quoteRequestsRepository->update($input, $id);

        return new QuoteRequestsResource($quoteRequests);
    }

    /**
     * Delete given QuoteRequests.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->quoteRequestsRepository->delete($id);

        return $this->successResponse('QuoteRequests deleted successfully.');
    }

    /**
     * Bulk create QuoteRequests's.
     *
     * @param BulkCreateQuoteRequestsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return QuoteRequestsCollection
     */
    public function bulkStore(BulkCreateQuoteRequestsAPIRequest $request): QuoteRequestsCollection
    {
        $quoteRequests = collect();

        $input = $request->get('data');
        foreach ($input as $key => $quoteRequestsInput) {
            $quoteRequests[$key] = $this->quoteRequestsRepository->create($quoteRequestsInput);
        }

        return new QuoteRequestsCollection($quoteRequests);
    }

    /**
     * Bulk update QuoteRequests's data.
     *
     * @param BulkUpdateQuoteRequestsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return QuoteRequestsCollection
     */
    public function bulkUpdate(BulkUpdateQuoteRequestsAPIRequest $request): QuoteRequestsCollection
    {
        $quoteRequests = collect();

        $input = $request->get('data');
        foreach ($input as $key => $quoteRequestsInput) {
            $quoteRequests[$key] = $this->quoteRequestsRepository->update($quoteRequestsInput, $quoteRequestsInput['id']);
        }

        return new QuoteRequestsCollection($quoteRequests);
    }
}
