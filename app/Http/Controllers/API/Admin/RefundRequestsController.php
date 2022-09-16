<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateRefundRequestsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateRefundRequestsAPIRequest;
use App\Http\Requests\Admin\CreateRefundRequestsAPIRequest;
use App\Http\Requests\Admin\UpdateRefundRequestsAPIRequest;
use App\Http\Resources\Admin\RefundRequestsCollection;
use App\Http\Resources\Admin\RefundRequestsResource;
use App\Repositories\RefundRequestsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class RefundRequestsController extends AppBaseController
{
    /**
     * @var RefundRequestsRepository
     */
    private RefundRequestsRepository $refundRequestsRepository;

    /**
     * @param RefundRequestsRepository $refundRequestsRepository
     */
    public function __construct(RefundRequestsRepository $refundRequestsRepository)
    {
        $this->refundRequestsRepository = $refundRequestsRepository;
    }

    /**
     * RefundRequests's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return RefundRequestsCollection
     */
    public function index(Request $request): RefundRequestsCollection
    {
        $refundRequests = $this->refundRequestsRepository->fetch($request);

        return new RefundRequestsCollection($refundRequests);
    }

    /**
     * Create RefundRequests with given payload.
     *
     * @param CreateRefundRequestsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return RefundRequestsResource
     */
    public function store(CreateRefundRequestsAPIRequest $request): RefundRequestsResource
    {
        $input = $request->all();
        $refundRequests = $this->refundRequestsRepository->create($input);

        return new RefundRequestsResource($refundRequests);
    }

    /**
     * Get single RefundRequests record.
     *
     * @param int $id
     *
     * @return RefundRequestsResource
     */
    public function show(int $id): RefundRequestsResource
    {
        $refundRequests = $this->refundRequestsRepository->findOrFail($id);

        return new RefundRequestsResource($refundRequests);
    }

    /**
     * Update RefundRequests with given payload.
     *
     * @param UpdateRefundRequestsAPIRequest $request
     * @param int                            $id
     *
     * @throws ValidatorException
     *
     * @return RefundRequestsResource
     */
    public function update(UpdateRefundRequestsAPIRequest $request, int $id): RefundRequestsResource
    {
        $input = $request->all();
        $refundRequests = $this->refundRequestsRepository->update($input, $id);

        return new RefundRequestsResource($refundRequests);
    }

    /**
     * Delete given RefundRequests.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->refundRequestsRepository->delete($id);

        return $this->successResponse('RefundRequests deleted successfully.');
    }

    /**
     * Bulk create RefundRequests's.
     *
     * @param BulkCreateRefundRequestsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return RefundRequestsCollection
     */
    public function bulkStore(BulkCreateRefundRequestsAPIRequest $request): RefundRequestsCollection
    {
        $refundRequests = collect();

        $input = $request->get('data');
        foreach ($input as $key => $refundRequestsInput) {
            $refundRequests[$key] = $this->refundRequestsRepository->create($refundRequestsInput);
        }

        return new RefundRequestsCollection($refundRequests);
    }

    /**
     * Bulk update RefundRequests's data.
     *
     * @param BulkUpdateRefundRequestsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return RefundRequestsCollection
     */
    public function bulkUpdate(BulkUpdateRefundRequestsAPIRequest $request): RefundRequestsCollection
    {
        $refundRequests = collect();

        $input = $request->get('data');
        foreach ($input as $key => $refundRequestsInput) {
            $refundRequests[$key] = $this->refundRequestsRepository->update($refundRequestsInput, $refundRequestsInput['id']);
        }

        return new RefundRequestsCollection($refundRequests);
    }
}
