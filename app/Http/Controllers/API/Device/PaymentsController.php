<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreatePaymentsAPIRequest;
use App\Http\Requests\Device\BulkUpdatePaymentsAPIRequest;
use App\Http\Requests\Device\CreatePaymentsAPIRequest;
use App\Http\Requests\Device\UpdatePaymentsAPIRequest;
use App\Http\Resources\Device\PaymentsCollection;
use App\Http\Resources\Device\PaymentsResource;
use App\Repositories\PaymentsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class PaymentsController extends AppBaseController
{
    /**
     * @var PaymentsRepository
     */
    private PaymentsRepository $paymentsRepository;

    /**
     * @param PaymentsRepository $paymentsRepository
     */
    public function __construct(PaymentsRepository $paymentsRepository)
    {
        $this->paymentsRepository = $paymentsRepository;
    }

    /**
     * Payments's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return PaymentsCollection
     */
    public function index(Request $request): PaymentsCollection
    {
        $payments = $this->paymentsRepository->fetch($request);

        return new PaymentsCollection($payments);
    }

    /**
     * Create Payments with given payload.
     *
     * @param CreatePaymentsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return PaymentsResource
     */
    public function store(CreatePaymentsAPIRequest $request): PaymentsResource
    {
        $input = $request->all();
        $payments = $this->paymentsRepository->create($input);

        return new PaymentsResource($payments);
    }

    /**
     * Get single Payments record.
     *
     * @param int $id
     *
     * @return PaymentsResource
     */
    public function show(int $id): PaymentsResource
    {
        $payments = $this->paymentsRepository->findOrFail($id);

        return new PaymentsResource($payments);
    }

    /**
     * Update Payments with given payload.
     *
     * @param UpdatePaymentsAPIRequest $request
     * @param int                      $id
     *
     * @throws ValidatorException
     *
     * @return PaymentsResource
     */
    public function update(UpdatePaymentsAPIRequest $request, int $id): PaymentsResource
    {
        $input = $request->all();
        $payments = $this->paymentsRepository->update($input, $id);

        return new PaymentsResource($payments);
    }

    /**
     * Delete given Payments.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->paymentsRepository->delete($id);

        return $this->successResponse('Payments deleted successfully.');
    }

    /**
     * Bulk create Payments's.
     *
     * @param BulkCreatePaymentsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return PaymentsCollection
     */
    public function bulkStore(BulkCreatePaymentsAPIRequest $request): PaymentsCollection
    {
        $payments = collect();

        $input = $request->get('data');
        foreach ($input as $key => $paymentsInput) {
            $payments[$key] = $this->paymentsRepository->create($paymentsInput);
        }

        return new PaymentsCollection($payments);
    }

    /**
     * Bulk update Payments's data.
     *
     * @param BulkUpdatePaymentsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return PaymentsCollection
     */
    public function bulkUpdate(BulkUpdatePaymentsAPIRequest $request): PaymentsCollection
    {
        $payments = collect();

        $input = $request->get('data');
        foreach ($input as $key => $paymentsInput) {
            $payments[$key] = $this->paymentsRepository->update($paymentsInput, $paymentsInput['id']);
        }

        return new PaymentsCollection($payments);
    }
}
