<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateVariationsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateVariationsAPIRequest;
use App\Http\Requests\Admin\CreateVariationsAPIRequest;
use App\Http\Requests\Admin\UpdateVariationsAPIRequest;
use App\Http\Resources\Admin\VariationsCollection;
use App\Http\Resources\Admin\VariationsResource;
use App\Repositories\VariationsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class VariationsController extends AppBaseController
{
    /**
     * @var VariationsRepository
     */
    private VariationsRepository $variationsRepository;

    /**
     * @param VariationsRepository $variationsRepository
     */
    public function __construct(VariationsRepository $variationsRepository)
    {
        $this->variationsRepository = $variationsRepository;
    }

    /**
     * Variations's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return VariationsCollection
     */
    public function index(Request $request): VariationsCollection
    {
        $variations = $this->variationsRepository->fetch($request);

        return new VariationsCollection($variations);
    }

    /**
     * Create Variations with given payload.
     *
     * @param CreateVariationsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return VariationsResource
     */
    public function store(CreateVariationsAPIRequest $request): VariationsResource
    {
        $input = $request->all();
        $variations = $this->variationsRepository->create($input);

        return new VariationsResource($variations);
    }

    /**
     * Get single Variations record.
     *
     * @param int $id
     *
     * @return VariationsResource
     */
    public function show(int $id): VariationsResource
    {
        $variations = $this->variationsRepository->findOrFail($id);

        return new VariationsResource($variations);
    }

    /**
     * Update Variations with given payload.
     *
     * @param UpdateVariationsAPIRequest $request
     * @param int                        $id
     *
     * @throws ValidatorException
     *
     * @return VariationsResource
     */
    public function update(UpdateVariationsAPIRequest $request, int $id): VariationsResource
    {
        $input = $request->all();
        $variations = $this->variationsRepository->update($input, $id);

        return new VariationsResource($variations);
    }

    /**
     * Delete given Variations.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->variationsRepository->delete($id);

        return $this->successResponse('Variations deleted successfully.');
    }

    /**
     * Bulk create Variations's.
     *
     * @param BulkCreateVariationsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return VariationsCollection
     */
    public function bulkStore(BulkCreateVariationsAPIRequest $request): VariationsCollection
    {
        $variations = collect();

        $input = $request->get('data');
        foreach ($input as $key => $variationsInput) {
            $variations[$key] = $this->variationsRepository->create($variationsInput);
        }

        return new VariationsCollection($variations);
    }

    /**
     * Bulk update Variations's data.
     *
     * @param BulkUpdateVariationsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return VariationsCollection
     */
    public function bulkUpdate(BulkUpdateVariationsAPIRequest $request): VariationsCollection
    {
        $variations = collect();

        $input = $request->get('data');
        foreach ($input as $key => $variationsInput) {
            $variations[$key] = $this->variationsRepository->update($variationsInput, $variationsInput['id']);
        }

        return new VariationsCollection($variations);
    }
}
