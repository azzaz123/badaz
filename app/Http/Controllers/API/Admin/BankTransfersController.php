<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateBankTransfersAPIRequest;
use App\Http\Requests\Admin\BulkUpdateBankTransfersAPIRequest;
use App\Http\Requests\Admin\CreateBankTransfersAPIRequest;
use App\Http\Requests\Admin\UpdateBankTransfersAPIRequest;
use App\Http\Resources\Admin\BankTransfersCollection;
use App\Http\Resources\Admin\BankTransfersResource;
use App\Repositories\BankTransfersRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class BankTransfersController extends AppBaseController
{
    /**
     * @var BankTransfersRepository
     */
    private BankTransfersRepository $bankTransfersRepository;

    /**
     * @param BankTransfersRepository $bankTransfersRepository
     */
    public function __construct(BankTransfersRepository $bankTransfersRepository)
    {
        $this->bankTransfersRepository = $bankTransfersRepository;
    }

    /**
     * BankTransfers's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return BankTransfersCollection
     */
    public function index(Request $request): BankTransfersCollection
    {
        $bankTransfers = $this->bankTransfersRepository->fetch($request);

        return new BankTransfersCollection($bankTransfers);
    }

    /**
     * Create BankTransfers with given payload.
     *
     * @param CreateBankTransfersAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return BankTransfersResource
     */
    public function store(CreateBankTransfersAPIRequest $request): BankTransfersResource
    {
        $input = $request->all();
        $bankTransfers = $this->bankTransfersRepository->create($input);

        return new BankTransfersResource($bankTransfers);
    }

    /**
     * Get single BankTransfers record.
     *
     * @param int $id
     *
     * @return BankTransfersResource
     */
    public function show(int $id): BankTransfersResource
    {
        $bankTransfers = $this->bankTransfersRepository->findOrFail($id);

        return new BankTransfersResource($bankTransfers);
    }

    /**
     * Update BankTransfers with given payload.
     *
     * @param UpdateBankTransfersAPIRequest $request
     * @param int                           $id
     *
     * @throws ValidatorException
     *
     * @return BankTransfersResource
     */
    public function update(UpdateBankTransfersAPIRequest $request, int $id): BankTransfersResource
    {
        $input = $request->all();
        $bankTransfers = $this->bankTransfersRepository->update($input, $id);

        return new BankTransfersResource($bankTransfers);
    }

    /**
     * Delete given BankTransfers.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->bankTransfersRepository->delete($id);

        return $this->successResponse('BankTransfers deleted successfully.');
    }

    /**
     * Bulk create BankTransfers's.
     *
     * @param BulkCreateBankTransfersAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return BankTransfersCollection
     */
    public function bulkStore(BulkCreateBankTransfersAPIRequest $request): BankTransfersCollection
    {
        $bankTransfers = collect();

        $input = $request->get('data');
        foreach ($input as $key => $bankTransfersInput) {
            $bankTransfers[$key] = $this->bankTransfersRepository->create($bankTransfersInput);
        }

        return new BankTransfersCollection($bankTransfers);
    }

    /**
     * Bulk update BankTransfers's data.
     *
     * @param BulkUpdateBankTransfersAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return BankTransfersCollection
     */
    public function bulkUpdate(BulkUpdateBankTransfersAPIRequest $request): BankTransfersCollection
    {
        $bankTransfers = collect();

        $input = $request->get('data');
        foreach ($input as $key => $bankTransfersInput) {
            $bankTransfers[$key] = $this->bankTransfersRepository->update($bankTransfersInput, $bankTransfersInput['id']);
        }

        return new BankTransfersCollection($bankTransfers);
    }
}
