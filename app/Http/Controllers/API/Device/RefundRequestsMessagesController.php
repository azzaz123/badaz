<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateRefundRequestsMessagesAPIRequest;
use App\Http\Requests\Device\BulkUpdateRefundRequestsMessagesAPIRequest;
use App\Http\Requests\Device\CreateRefundRequestsMessagesAPIRequest;
use App\Http\Requests\Device\UpdateRefundRequestsMessagesAPIRequest;
use App\Http\Resources\Device\RefundRequestsMessagesCollection;
use App\Http\Resources\Device\RefundRequestsMessagesResource;
use App\Repositories\RefundRequestsMessagesRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class RefundRequestsMessagesController extends AppBaseController
{
    /**
     * @var RefundRequestsMessagesRepository
     */
    private RefundRequestsMessagesRepository $refundRequestsMessagesRepository;

    /**
     * @param RefundRequestsMessagesRepository $refundRequestsMessagesRepository
     */
    public function __construct(RefundRequestsMessagesRepository $refundRequestsMessagesRepository)
    {
        $this->refundRequestsMessagesRepository = $refundRequestsMessagesRepository;
    }

    /**
     * RefundRequestsMessages's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return RefundRequestsMessagesCollection
     */
    public function index(Request $request): RefundRequestsMessagesCollection
    {
        $refundRequestsMessages = $this->refundRequestsMessagesRepository->fetch($request);

        return new RefundRequestsMessagesCollection($refundRequestsMessages);
    }

    /**
     * Create RefundRequestsMessages with given payload.
     *
     * @param CreateRefundRequestsMessagesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return RefundRequestsMessagesResource
     */
    public function store(CreateRefundRequestsMessagesAPIRequest $request): RefundRequestsMessagesResource
    {
        $input = $request->all();
        $refundRequestsMessages = $this->refundRequestsMessagesRepository->create($input);

        return new RefundRequestsMessagesResource($refundRequestsMessages);
    }

    /**
     * Get single RefundRequestsMessages record.
     *
     * @param int $id
     *
     * @return RefundRequestsMessagesResource
     */
    public function show(int $id): RefundRequestsMessagesResource
    {
        $refundRequestsMessages = $this->refundRequestsMessagesRepository->findOrFail($id);

        return new RefundRequestsMessagesResource($refundRequestsMessages);
    }

    /**
     * Update RefundRequestsMessages with given payload.
     *
     * @param UpdateRefundRequestsMessagesAPIRequest $request
     * @param int                                    $id
     *
     * @throws ValidatorException
     *
     * @return RefundRequestsMessagesResource
     */
    public function update(UpdateRefundRequestsMessagesAPIRequest $request, int $id): RefundRequestsMessagesResource
    {
        $input = $request->all();
        $refundRequestsMessages = $this->refundRequestsMessagesRepository->update($input, $id);

        return new RefundRequestsMessagesResource($refundRequestsMessages);
    }

    /**
     * Delete given RefundRequestsMessages.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->refundRequestsMessagesRepository->delete($id);

        return $this->successResponse('RefundRequestsMessages deleted successfully.');
    }

    /**
     * Bulk create RefundRequestsMessages's.
     *
     * @param BulkCreateRefundRequestsMessagesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return RefundRequestsMessagesCollection
     */
    public function bulkStore(BulkCreateRefundRequestsMessagesAPIRequest $request): RefundRequestsMessagesCollection
    {
        $refundRequestsMessages = collect();

        $input = $request->get('data');
        foreach ($input as $key => $refundRequestsMessagesInput) {
            $refundRequestsMessages[$key] = $this->refundRequestsMessagesRepository->create($refundRequestsMessagesInput);
        }

        return new RefundRequestsMessagesCollection($refundRequestsMessages);
    }

    /**
     * Bulk update RefundRequestsMessages's data.
     *
     * @param BulkUpdateRefundRequestsMessagesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return RefundRequestsMessagesCollection
     */
    public function bulkUpdate(BulkUpdateRefundRequestsMessagesAPIRequest $request): RefundRequestsMessagesCollection
    {
        $refundRequestsMessages = collect();

        $input = $request->get('data');
        foreach ($input as $key => $refundRequestsMessagesInput) {
            $refundRequestsMessages[$key] = $this->refundRequestsMessagesRepository->update($refundRequestsMessagesInput, $refundRequestsMessagesInput['id']);
        }

        return new RefundRequestsMessagesCollection($refundRequestsMessages);
    }
}
