<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreatePaymentSettingsAPIRequest;
use App\Http\Requests\Device\BulkUpdatePaymentSettingsAPIRequest;
use App\Http\Requests\Device\CreatePaymentSettingsAPIRequest;
use App\Http\Requests\Device\UpdatePaymentSettingsAPIRequest;
use App\Http\Resources\Device\PaymentSettingsCollection;
use App\Http\Resources\Device\PaymentSettingsResource;
use App\Repositories\PaymentSettingsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class PaymentSettingsController extends AppBaseController
{
    /**
     * @var PaymentSettingsRepository
     */
    private PaymentSettingsRepository $paymentSettingsRepository;

    /**
     * @param PaymentSettingsRepository $paymentSettingsRepository
     */
    public function __construct(PaymentSettingsRepository $paymentSettingsRepository)
    {
        $this->paymentSettingsRepository = $paymentSettingsRepository;
    }

    /**
     * PaymentSettings's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return PaymentSettingsCollection
     */
    public function index(Request $request): PaymentSettingsCollection
    {
        $paymentSettings = $this->paymentSettingsRepository->fetch($request);

        return new PaymentSettingsCollection($paymentSettings);
    }

    /**
     * Create PaymentSettings with given payload.
     *
     * @param CreatePaymentSettingsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return PaymentSettingsResource
     */
    public function store(CreatePaymentSettingsAPIRequest $request): PaymentSettingsResource
    {
        $input = $request->all();
        $paymentSettings = $this->paymentSettingsRepository->create($input);

        return new PaymentSettingsResource($paymentSettings);
    }

    /**
     * Get single PaymentSettings record.
     *
     * @param int $id
     *
     * @return PaymentSettingsResource
     */
    public function show(int $id): PaymentSettingsResource
    {
        $paymentSettings = $this->paymentSettingsRepository->findOrFail($id);

        return new PaymentSettingsResource($paymentSettings);
    }

    /**
     * Update PaymentSettings with given payload.
     *
     * @param UpdatePaymentSettingsAPIRequest $request
     * @param int                             $id
     *
     * @throws ValidatorException
     *
     * @return PaymentSettingsResource
     */
    public function update(UpdatePaymentSettingsAPIRequest $request, int $id): PaymentSettingsResource
    {
        $input = $request->all();
        $paymentSettings = $this->paymentSettingsRepository->update($input, $id);

        return new PaymentSettingsResource($paymentSettings);
    }

    /**
     * Delete given PaymentSettings.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->paymentSettingsRepository->delete($id);

        return $this->successResponse('PaymentSettings deleted successfully.');
    }

    /**
     * Bulk create PaymentSettings's.
     *
     * @param BulkCreatePaymentSettingsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return PaymentSettingsCollection
     */
    public function bulkStore(BulkCreatePaymentSettingsAPIRequest $request): PaymentSettingsCollection
    {
        $paymentSettings = collect();

        $input = $request->get('data');
        foreach ($input as $key => $paymentSettingsInput) {
            $paymentSettings[$key] = $this->paymentSettingsRepository->create($paymentSettingsInput);
        }

        return new PaymentSettingsCollection($paymentSettings);
    }

    /**
     * Bulk update PaymentSettings's data.
     *
     * @param BulkUpdatePaymentSettingsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return PaymentSettingsCollection
     */
    public function bulkUpdate(BulkUpdatePaymentSettingsAPIRequest $request): PaymentSettingsCollection
    {
        $paymentSettings = collect();

        $input = $request->get('data');
        foreach ($input as $key => $paymentSettingsInput) {
            $paymentSettings[$key] = $this->paymentSettingsRepository->update($paymentSettingsInput, $paymentSettingsInput['id']);
        }

        return new PaymentSettingsCollection($paymentSettings);
    }
}
