<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreatePayoutsAPIRequest;
use App\Http\Requests\Device\BulkUpdatePayoutsAPIRequest;
use App\Http\Requests\Device\CreatePayoutsAPIRequest;
use App\Http\Requests\Device\UpdatePayoutsAPIRequest;
use App\Http\Resources\Device\PayoutsCollection;
use App\Http\Resources\Device\PayoutsResource;
use App\Repositories\PayoutsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class PayoutsController extends AppBaseController
{
    /**
     * @var PayoutsRepository
     */
    private PayoutsRepository $payoutsRepository;

    /**
     * @param PayoutsRepository $payoutsRepository
     */
    public function __construct(PayoutsRepository $payoutsRepository)
    {
        $this->payoutsRepository = $payoutsRepository;
    }

    /**
     * Payouts's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return PayoutsCollection
     */
    public function index(Request $request): PayoutsCollection
    {
        $payouts = $this->payoutsRepository->fetch($request);

        return new PayoutsCollection($payouts);
    }

    /**
     * Create Payouts with given payload.
     *
     * @param CreatePayoutsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return PayoutsResource
     */
    public function store(CreatePayoutsAPIRequest $request): PayoutsResource
    {
        $input = $request->all();
        $payouts = $this->payoutsRepository->create($input);

        return new PayoutsResource($payouts);
    }

    /**
     * Get single Payouts record.
     *
     * @param int $id
     *
     * @return PayoutsResource
     */
    public function show(int $id): PayoutsResource
    {
        $payouts = $this->payoutsRepository->findOrFail($id);

        return new PayoutsResource($payouts);
    }

    /**
     * Update Payouts with given payload.
     *
     * @param UpdatePayoutsAPIRequest $request
     * @param int                     $id
     *
     * @throws ValidatorException
     *
     * @return PayoutsResource
     */
    public function update(UpdatePayoutsAPIRequest $request, int $id): PayoutsResource
    {
        $input = $request->all();
        $payouts = $this->payoutsRepository->update($input, $id);

        return new PayoutsResource($payouts);
    }

    /**
     * Delete given Payouts.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->payoutsRepository->delete($id);

        return $this->successResponse('Payouts deleted successfully.');
    }

    /**
     * Bulk create Payouts's.
     *
     * @param BulkCreatePayoutsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return PayoutsCollection
     */
    public function bulkStore(BulkCreatePayoutsAPIRequest $request): PayoutsCollection
    {
        $payouts = collect();

        $input = $request->get('data');
        foreach ($input as $key => $payoutsInput) {
            $payouts[$key] = $this->payoutsRepository->create($payoutsInput);
        }

        return new PayoutsCollection($payouts);
    }

    /**
     * Bulk update Payouts's data.
     *
     * @param BulkUpdatePayoutsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return PayoutsCollection
     */
    public function bulkUpdate(BulkUpdatePayoutsAPIRequest $request): PayoutsCollection
    {
        $payouts = collect();

        $input = $request->get('data');
        foreach ($input as $key => $payoutsInput) {
            $payouts[$key] = $this->payoutsRepository->update($payoutsInput, $payoutsInput['id']);
        }

        return new PayoutsCollection($payouts);
    }
}
