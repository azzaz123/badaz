<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateDigitalSalesAPIRequest;
use App\Http\Requests\Admin\BulkUpdateDigitalSalesAPIRequest;
use App\Http\Requests\Admin\CreateDigitalSalesAPIRequest;
use App\Http\Requests\Admin\UpdateDigitalSalesAPIRequest;
use App\Http\Resources\Admin\DigitalSalesCollection;
use App\Http\Resources\Admin\DigitalSalesResource;
use App\Repositories\DigitalSalesRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class DigitalSalesController extends AppBaseController
{
    /**
     * @var DigitalSalesRepository
     */
    private DigitalSalesRepository $digitalSalesRepository;

    /**
     * @param DigitalSalesRepository $digitalSalesRepository
     */
    public function __construct(DigitalSalesRepository $digitalSalesRepository)
    {
        $this->digitalSalesRepository = $digitalSalesRepository;
    }

    /**
     * DigitalSales's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return DigitalSalesCollection
     */
    public function index(Request $request): DigitalSalesCollection
    {
        $digitalSales = $this->digitalSalesRepository->fetch($request);

        return new DigitalSalesCollection($digitalSales);
    }

    /**
     * Create DigitalSales with given payload.
     *
     * @param CreateDigitalSalesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return DigitalSalesResource
     */
    public function store(CreateDigitalSalesAPIRequest $request): DigitalSalesResource
    {
        $input = $request->all();
        $digitalSales = $this->digitalSalesRepository->create($input);

        return new DigitalSalesResource($digitalSales);
    }

    /**
     * Get single DigitalSales record.
     *
     * @param int $id
     *
     * @return DigitalSalesResource
     */
    public function show(int $id): DigitalSalesResource
    {
        $digitalSales = $this->digitalSalesRepository->findOrFail($id);

        return new DigitalSalesResource($digitalSales);
    }

    /**
     * Update DigitalSales with given payload.
     *
     * @param UpdateDigitalSalesAPIRequest $request
     * @param int                          $id
     *
     * @throws ValidatorException
     *
     * @return DigitalSalesResource
     */
    public function update(UpdateDigitalSalesAPIRequest $request, int $id): DigitalSalesResource
    {
        $input = $request->all();
        $digitalSales = $this->digitalSalesRepository->update($input, $id);

        return new DigitalSalesResource($digitalSales);
    }

    /**
     * Delete given DigitalSales.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->digitalSalesRepository->delete($id);

        return $this->successResponse('DigitalSales deleted successfully.');
    }

    /**
     * Bulk create DigitalSales's.
     *
     * @param BulkCreateDigitalSalesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return DigitalSalesCollection
     */
    public function bulkStore(BulkCreateDigitalSalesAPIRequest $request): DigitalSalesCollection
    {
        $digitalSales = collect();

        $input = $request->get('data');
        foreach ($input as $key => $digitalSalesInput) {
            $digitalSales[$key] = $this->digitalSalesRepository->create($digitalSalesInput);
        }

        return new DigitalSalesCollection($digitalSales);
    }

    /**
     * Bulk update DigitalSales's data.
     *
     * @param BulkUpdateDigitalSalesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return DigitalSalesCollection
     */
    public function bulkUpdate(BulkUpdateDigitalSalesAPIRequest $request): DigitalSalesCollection
    {
        $digitalSales = collect();

        $input = $request->get('data');
        foreach ($input as $key => $digitalSalesInput) {
            $digitalSales[$key] = $this->digitalSalesRepository->update($digitalSalesInput, $digitalSalesInput['id']);
        }

        return new DigitalSalesCollection($digitalSales);
    }
}
