<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateSupportTicketsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateSupportTicketsAPIRequest;
use App\Http\Requests\Admin\CreateSupportTicketsAPIRequest;
use App\Http\Requests\Admin\UpdateSupportTicketsAPIRequest;
use App\Http\Resources\Admin\SupportTicketsCollection;
use App\Http\Resources\Admin\SupportTicketsResource;
use App\Repositories\SupportTicketsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class SupportTicketsController extends AppBaseController
{
    /**
     * @var SupportTicketsRepository
     */
    private SupportTicketsRepository $supportTicketsRepository;

    /**
     * @param SupportTicketsRepository $supportTicketsRepository
     */
    public function __construct(SupportTicketsRepository $supportTicketsRepository)
    {
        $this->supportTicketsRepository = $supportTicketsRepository;
    }

    /**
     * SupportTickets's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return SupportTicketsCollection
     */
    public function index(Request $request): SupportTicketsCollection
    {
        $supportTickets = $this->supportTicketsRepository->fetch($request);

        return new SupportTicketsCollection($supportTickets);
    }

    /**
     * Create SupportTickets with given payload.
     *
     * @param CreateSupportTicketsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return SupportTicketsResource
     */
    public function store(CreateSupportTicketsAPIRequest $request): SupportTicketsResource
    {
        $input = $request->all();
        $supportTickets = $this->supportTicketsRepository->create($input);

        return new SupportTicketsResource($supportTickets);
    }

    /**
     * Get single SupportTickets record.
     *
     * @param int $id
     *
     * @return SupportTicketsResource
     */
    public function show(int $id): SupportTicketsResource
    {
        $supportTickets = $this->supportTicketsRepository->findOrFail($id);

        return new SupportTicketsResource($supportTickets);
    }

    /**
     * Update SupportTickets with given payload.
     *
     * @param UpdateSupportTicketsAPIRequest $request
     * @param int                            $id
     *
     * @throws ValidatorException
     *
     * @return SupportTicketsResource
     */
    public function update(UpdateSupportTicketsAPIRequest $request, int $id): SupportTicketsResource
    {
        $input = $request->all();
        $supportTickets = $this->supportTicketsRepository->update($input, $id);

        return new SupportTicketsResource($supportTickets);
    }

    /**
     * Delete given SupportTickets.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->supportTicketsRepository->delete($id);

        return $this->successResponse('SupportTickets deleted successfully.');
    }

    /**
     * Bulk create SupportTickets's.
     *
     * @param BulkCreateSupportTicketsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return SupportTicketsCollection
     */
    public function bulkStore(BulkCreateSupportTicketsAPIRequest $request): SupportTicketsCollection
    {
        $supportTickets = collect();

        $input = $request->get('data');
        foreach ($input as $key => $supportTicketsInput) {
            $supportTickets[$key] = $this->supportTicketsRepository->create($supportTicketsInput);
        }

        return new SupportTicketsCollection($supportTickets);
    }

    /**
     * Bulk update SupportTickets's data.
     *
     * @param BulkUpdateSupportTicketsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return SupportTicketsCollection
     */
    public function bulkUpdate(BulkUpdateSupportTicketsAPIRequest $request): SupportTicketsCollection
    {
        $supportTickets = collect();

        $input = $request->get('data');
        foreach ($input as $key => $supportTicketsInput) {
            $supportTickets[$key] = $this->supportTicketsRepository->update($supportTicketsInput, $supportTicketsInput['id']);
        }

        return new SupportTicketsCollection($supportTickets);
    }
}
