<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateEarningsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateEarningsAPIRequest;
use App\Http\Requests\Admin\CreateEarningsAPIRequest;
use App\Http\Requests\Admin\UpdateEarningsAPIRequest;
use App\Http\Resources\Admin\EarningsCollection;
use App\Http\Resources\Admin\EarningsResource;
use App\Repositories\EarningsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class EarningsController extends AppBaseController
{
    /**
     * @var EarningsRepository
     */
    private EarningsRepository $earningsRepository;

    /**
     * @param EarningsRepository $earningsRepository
     */
    public function __construct(EarningsRepository $earningsRepository)
    {
        $this->earningsRepository = $earningsRepository;
    }

    /**
     * Earnings's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return EarningsCollection
     */
    public function index(Request $request): EarningsCollection
    {
        $earnings = $this->earningsRepository->fetch($request);

        return new EarningsCollection($earnings);
    }

    /**
     * Create Earnings with given payload.
     *
     * @param CreateEarningsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return EarningsResource
     */
    public function store(CreateEarningsAPIRequest $request): EarningsResource
    {
        $input = $request->all();
        $earnings = $this->earningsRepository->create($input);

        return new EarningsResource($earnings);
    }

    /**
     * Get single Earnings record.
     *
     * @param int $id
     *
     * @return EarningsResource
     */
    public function show(int $id): EarningsResource
    {
        $earnings = $this->earningsRepository->findOrFail($id);

        return new EarningsResource($earnings);
    }

    /**
     * Update Earnings with given payload.
     *
     * @param UpdateEarningsAPIRequest $request
     * @param int                      $id
     *
     * @throws ValidatorException
     *
     * @return EarningsResource
     */
    public function update(UpdateEarningsAPIRequest $request, int $id): EarningsResource
    {
        $input = $request->all();
        $earnings = $this->earningsRepository->update($input, $id);

        return new EarningsResource($earnings);
    }

    /**
     * Delete given Earnings.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->earningsRepository->delete($id);

        return $this->successResponse('Earnings deleted successfully.');
    }

    /**
     * Bulk create Earnings's.
     *
     * @param BulkCreateEarningsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return EarningsCollection
     */
    public function bulkStore(BulkCreateEarningsAPIRequest $request): EarningsCollection
    {
        $earnings = collect();

        $input = $request->get('data');
        foreach ($input as $key => $earningsInput) {
            $earnings[$key] = $this->earningsRepository->create($earningsInput);
        }

        return new EarningsCollection($earnings);
    }

    /**
     * Bulk update Earnings's data.
     *
     * @param BulkUpdateEarningsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return EarningsCollection
     */
    public function bulkUpdate(BulkUpdateEarningsAPIRequest $request): EarningsCollection
    {
        $earnings = collect();

        $input = $request->get('data');
        foreach ($input as $key => $earningsInput) {
            $earnings[$key] = $this->earningsRepository->update($earningsInput, $earningsInput['id']);
        }

        return new EarningsCollection($earnings);
    }
}
