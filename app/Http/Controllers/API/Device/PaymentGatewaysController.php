<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreatePaymentGatewaysAPIRequest;
use App\Http\Requests\Device\BulkUpdatePaymentGatewaysAPIRequest;
use App\Http\Requests\Device\CreatePaymentGatewaysAPIRequest;
use App\Http\Requests\Device\UpdatePaymentGatewaysAPIRequest;
use App\Http\Resources\Device\PaymentGatewaysCollection;
use App\Http\Resources\Device\PaymentGatewaysResource;
use App\Repositories\PaymentGatewaysRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class PaymentGatewaysController extends AppBaseController
{
    /**
     * @var PaymentGatewaysRepository
     */
    private PaymentGatewaysRepository $paymentGatewaysRepository;

    /**
     * @param PaymentGatewaysRepository $paymentGatewaysRepository
     */
    public function __construct(PaymentGatewaysRepository $paymentGatewaysRepository)
    {
        $this->paymentGatewaysRepository = $paymentGatewaysRepository;
    }

    /**
     * PaymentGateways's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return PaymentGatewaysCollection
     */
    public function index(Request $request): PaymentGatewaysCollection
    {
        $paymentGateways = $this->paymentGatewaysRepository->fetch($request);

        return new PaymentGatewaysCollection($paymentGateways);
    }

    /**
     * Create PaymentGateways with given payload.
     *
     * @param CreatePaymentGatewaysAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return PaymentGatewaysResource
     */
    public function store(CreatePaymentGatewaysAPIRequest $request): PaymentGatewaysResource
    {
        $input = $request->all();
        $paymentGateways = $this->paymentGatewaysRepository->create($input);

        return new PaymentGatewaysResource($paymentGateways);
    }

    /**
     * Get single PaymentGateways record.
     *
     * @param int $id
     *
     * @return PaymentGatewaysResource
     */
    public function show(int $id): PaymentGatewaysResource
    {
        $paymentGateways = $this->paymentGatewaysRepository->findOrFail($id);

        return new PaymentGatewaysResource($paymentGateways);
    }

    /**
     * Update PaymentGateways with given payload.
     *
     * @param UpdatePaymentGatewaysAPIRequest $request
     * @param int                             $id
     *
     * @throws ValidatorException
     *
     * @return PaymentGatewaysResource
     */
    public function update(UpdatePaymentGatewaysAPIRequest $request, int $id): PaymentGatewaysResource
    {
        $input = $request->all();
        $paymentGateways = $this->paymentGatewaysRepository->update($input, $id);

        return new PaymentGatewaysResource($paymentGateways);
    }

    /**
     * Delete given PaymentGateways.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->paymentGatewaysRepository->delete($id);

        return $this->successResponse('PaymentGateways deleted successfully.');
    }

    /**
     * Bulk create PaymentGateways's.
     *
     * @param BulkCreatePaymentGatewaysAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return PaymentGatewaysCollection
     */
    public function bulkStore(BulkCreatePaymentGatewaysAPIRequest $request): PaymentGatewaysCollection
    {
        $paymentGateways = collect();

        $input = $request->get('data');
        foreach ($input as $key => $paymentGatewaysInput) {
            $paymentGateways[$key] = $this->paymentGatewaysRepository->create($paymentGatewaysInput);
        }

        return new PaymentGatewaysCollection($paymentGateways);
    }

    /**
     * Bulk update PaymentGateways's data.
     *
     * @param BulkUpdatePaymentGatewaysAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return PaymentGatewaysCollection
     */
    public function bulkUpdate(BulkUpdatePaymentGatewaysAPIRequest $request): PaymentGatewaysCollection
    {
        $paymentGateways = collect();

        $input = $request->get('data');
        foreach ($input as $key => $paymentGatewaysInput) {
            $paymentGateways[$key] = $this->paymentGatewaysRepository->update($paymentGatewaysInput, $paymentGatewaysInput['id']);
        }

        return new PaymentGatewaysCollection($paymentGateways);
    }
}
