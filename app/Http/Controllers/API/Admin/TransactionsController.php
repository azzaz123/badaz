<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateTransactionsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateTransactionsAPIRequest;
use App\Http\Requests\Admin\CreateTransactionsAPIRequest;
use App\Http\Requests\Admin\UpdateTransactionsAPIRequest;
use App\Http\Resources\Admin\TransactionsCollection;
use App\Http\Resources\Admin\TransactionsResource;
use App\Repositories\TransactionsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class TransactionsController extends AppBaseController
{
    /**
     * @var TransactionsRepository
     */
    private TransactionsRepository $transactionsRepository;

    /**
     * @param TransactionsRepository $transactionsRepository
     */
    public function __construct(TransactionsRepository $transactionsRepository)
    {
        $this->transactionsRepository = $transactionsRepository;
    }

    /**
     * Transactions's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return TransactionsCollection
     */
    public function index(Request $request): TransactionsCollection
    {
        $transactions = $this->transactionsRepository->fetch($request);

        return new TransactionsCollection($transactions);
    }

    /**
     * Create Transactions with given payload.
     *
     * @param CreateTransactionsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return TransactionsResource
     */
    public function store(CreateTransactionsAPIRequest $request): TransactionsResource
    {
        $input = $request->all();
        $transactions = $this->transactionsRepository->create($input);

        return new TransactionsResource($transactions);
    }

    /**
     * Get single Transactions record.
     *
     * @param int $id
     *
     * @return TransactionsResource
     */
    public function show(int $id): TransactionsResource
    {
        $transactions = $this->transactionsRepository->findOrFail($id);

        return new TransactionsResource($transactions);
    }

    /**
     * Update Transactions with given payload.
     *
     * @param UpdateTransactionsAPIRequest $request
     * @param int                          $id
     *
     * @throws ValidatorException
     *
     * @return TransactionsResource
     */
    public function update(UpdateTransactionsAPIRequest $request, int $id): TransactionsResource
    {
        $input = $request->all();
        $transactions = $this->transactionsRepository->update($input, $id);

        return new TransactionsResource($transactions);
    }

    /**
     * Delete given Transactions.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->transactionsRepository->delete($id);

        return $this->successResponse('Transactions deleted successfully.');
    }

    /**
     * Bulk create Transactions's.
     *
     * @param BulkCreateTransactionsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return TransactionsCollection
     */
    public function bulkStore(BulkCreateTransactionsAPIRequest $request): TransactionsCollection
    {
        $transactions = collect();

        $input = $request->get('data');
        foreach ($input as $key => $transactionsInput) {
            $transactions[$key] = $this->transactionsRepository->create($transactionsInput);
        }

        return new TransactionsCollection($transactions);
    }

    /**
     * Bulk update Transactions's data.
     *
     * @param BulkUpdateTransactionsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return TransactionsCollection
     */
    public function bulkUpdate(BulkUpdateTransactionsAPIRequest $request): TransactionsCollection
    {
        $transactions = collect();

        $input = $request->get('data');
        foreach ($input as $key => $transactionsInput) {
            $transactions[$key] = $this->transactionsRepository->update($transactionsInput, $transactionsInput['id']);
        }

        return new TransactionsCollection($transactions);
    }
}
