<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateInvoicesAPIRequest;
use App\Http\Requests\Admin\BulkUpdateInvoicesAPIRequest;
use App\Http\Requests\Admin\CreateInvoicesAPIRequest;
use App\Http\Requests\Admin\UpdateInvoicesAPIRequest;
use App\Http\Resources\Admin\InvoicesCollection;
use App\Http\Resources\Admin\InvoicesResource;
use App\Repositories\InvoicesRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class InvoicesController extends AppBaseController
{
    /**
     * @var InvoicesRepository
     */
    private InvoicesRepository $invoicesRepository;

    /**
     * @param InvoicesRepository $invoicesRepository
     */
    public function __construct(InvoicesRepository $invoicesRepository)
    {
        $this->invoicesRepository = $invoicesRepository;
    }

    /**
     * Invoices's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return InvoicesCollection
     */
    public function index(Request $request): InvoicesCollection
    {
        $invoices = $this->invoicesRepository->fetch($request);

        return new InvoicesCollection($invoices);
    }

    /**
     * Create Invoices with given payload.
     *
     * @param CreateInvoicesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return InvoicesResource
     */
    public function store(CreateInvoicesAPIRequest $request): InvoicesResource
    {
        $input = $request->all();
        $invoices = $this->invoicesRepository->create($input);

        return new InvoicesResource($invoices);
    }

    /**
     * Get single Invoices record.
     *
     * @param int $id
     *
     * @return InvoicesResource
     */
    public function show(int $id): InvoicesResource
    {
        $invoices = $this->invoicesRepository->findOrFail($id);

        return new InvoicesResource($invoices);
    }

    /**
     * Update Invoices with given payload.
     *
     * @param UpdateInvoicesAPIRequest $request
     * @param int                      $id
     *
     * @throws ValidatorException
     *
     * @return InvoicesResource
     */
    public function update(UpdateInvoicesAPIRequest $request, int $id): InvoicesResource
    {
        $input = $request->all();
        $invoices = $this->invoicesRepository->update($input, $id);

        return new InvoicesResource($invoices);
    }

    /**
     * Delete given Invoices.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->invoicesRepository->delete($id);

        return $this->successResponse('Invoices deleted successfully.');
    }

    /**
     * Bulk create Invoices's.
     *
     * @param BulkCreateInvoicesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return InvoicesCollection
     */
    public function bulkStore(BulkCreateInvoicesAPIRequest $request): InvoicesCollection
    {
        $invoices = collect();

        $input = $request->get('data');
        foreach ($input as $key => $invoicesInput) {
            $invoices[$key] = $this->invoicesRepository->create($invoicesInput);
        }

        return new InvoicesCollection($invoices);
    }

    /**
     * Bulk update Invoices's data.
     *
     * @param BulkUpdateInvoicesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return InvoicesCollection
     */
    public function bulkUpdate(BulkUpdateInvoicesAPIRequest $request): InvoicesCollection
    {
        $invoices = collect();

        $input = $request->get('data');
        foreach ($input as $key => $invoicesInput) {
            $invoices[$key] = $this->invoicesRepository->update($invoicesInput, $invoicesInput['id']);
        }

        return new InvoicesCollection($invoices);
    }
}
