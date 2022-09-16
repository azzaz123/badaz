<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreatePromotedTransactionsAPIRequest;
use App\Http\Requests\Device\BulkUpdatePromotedTransactionsAPIRequest;
use App\Http\Requests\Device\CreatePromotedTransactionsAPIRequest;
use App\Http\Requests\Device\UpdatePromotedTransactionsAPIRequest;
use App\Http\Resources\Device\PromotedTransactionsCollection;
use App\Http\Resources\Device\PromotedTransactionsResource;
use App\Repositories\PromotedTransactionsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class PromotedTransactionsController extends AppBaseController
{
    /**
     * @var PromotedTransactionsRepository
     */
    private PromotedTransactionsRepository $promotedTransactionsRepository;

    /**
     * @param PromotedTransactionsRepository $promotedTransactionsRepository
     */
    public function __construct(PromotedTransactionsRepository $promotedTransactionsRepository)
    {
        $this->promotedTransactionsRepository = $promotedTransactionsRepository;
    }

    /**
     * PromotedTransactions's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return PromotedTransactionsCollection
     */
    public function index(Request $request): PromotedTransactionsCollection
    {
        $promotedTransactions = $this->promotedTransactionsRepository->fetch($request);

        return new PromotedTransactionsCollection($promotedTransactions);
    }

    /**
     * Create PromotedTransactions with given payload.
     *
     * @param CreatePromotedTransactionsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return PromotedTransactionsResource
     */
    public function store(CreatePromotedTransactionsAPIRequest $request): PromotedTransactionsResource
    {
        $input = $request->all();
        $promotedTransactions = $this->promotedTransactionsRepository->create($input);

        return new PromotedTransactionsResource($promotedTransactions);
    }

    /**
     * Get single PromotedTransactions record.
     *
     * @param int $id
     *
     * @return PromotedTransactionsResource
     */
    public function show(int $id): PromotedTransactionsResource
    {
        $promotedTransactions = $this->promotedTransactionsRepository->findOrFail($id);

        return new PromotedTransactionsResource($promotedTransactions);
    }

    /**
     * Update PromotedTransactions with given payload.
     *
     * @param UpdatePromotedTransactionsAPIRequest $request
     * @param int                                  $id
     *
     * @throws ValidatorException
     *
     * @return PromotedTransactionsResource
     */
    public function update(UpdatePromotedTransactionsAPIRequest $request, int $id): PromotedTransactionsResource
    {
        $input = $request->all();
        $promotedTransactions = $this->promotedTransactionsRepository->update($input, $id);

        return new PromotedTransactionsResource($promotedTransactions);
    }

    /**
     * Delete given PromotedTransactions.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->promotedTransactionsRepository->delete($id);

        return $this->successResponse('PromotedTransactions deleted successfully.');
    }

    /**
     * Bulk create PromotedTransactions's.
     *
     * @param BulkCreatePromotedTransactionsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return PromotedTransactionsCollection
     */
    public function bulkStore(BulkCreatePromotedTransactionsAPIRequest $request): PromotedTransactionsCollection
    {
        $promotedTransactions = collect();

        $input = $request->get('data');
        foreach ($input as $key => $promotedTransactionsInput) {
            $promotedTransactions[$key] = $this->promotedTransactionsRepository->create($promotedTransactionsInput);
        }

        return new PromotedTransactionsCollection($promotedTransactions);
    }

    /**
     * Bulk update PromotedTransactions's data.
     *
     * @param BulkUpdatePromotedTransactionsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return PromotedTransactionsCollection
     */
    public function bulkUpdate(BulkUpdatePromotedTransactionsAPIRequest $request): PromotedTransactionsCollection
    {
        $promotedTransactions = collect();

        $input = $request->get('data');
        foreach ($input as $key => $promotedTransactionsInput) {
            $promotedTransactions[$key] = $this->promotedTransactionsRepository->update($promotedTransactionsInput, $promotedTransactionsInput['id']);
        }

        return new PromotedTransactionsCollection($promotedTransactions);
    }
}
