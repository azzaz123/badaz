<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateVariationOptionsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateVariationOptionsAPIRequest;
use App\Http\Requests\Admin\CreateVariationOptionsAPIRequest;
use App\Http\Requests\Admin\UpdateVariationOptionsAPIRequest;
use App\Http\Resources\Admin\VariationOptionsCollection;
use App\Http\Resources\Admin\VariationOptionsResource;
use App\Repositories\VariationOptionsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class VariationOptionsController extends AppBaseController
{
    /**
     * @var VariationOptionsRepository
     */
    private VariationOptionsRepository $variationOptionsRepository;

    /**
     * @param VariationOptionsRepository $variationOptionsRepository
     */
    public function __construct(VariationOptionsRepository $variationOptionsRepository)
    {
        $this->variationOptionsRepository = $variationOptionsRepository;
    }

    /**
     * VariationOptions's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return VariationOptionsCollection
     */
    public function index(Request $request): VariationOptionsCollection
    {
        $variationOptions = $this->variationOptionsRepository->fetch($request);

        return new VariationOptionsCollection($variationOptions);
    }

    /**
     * Create VariationOptions with given payload.
     *
     * @param CreateVariationOptionsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return VariationOptionsResource
     */
    public function store(CreateVariationOptionsAPIRequest $request): VariationOptionsResource
    {
        $input = $request->all();
        $variationOptions = $this->variationOptionsRepository->create($input);

        return new VariationOptionsResource($variationOptions);
    }

    /**
     * Get single VariationOptions record.
     *
     * @param int $id
     *
     * @return VariationOptionsResource
     */
    public function show(int $id): VariationOptionsResource
    {
        $variationOptions = $this->variationOptionsRepository->findOrFail($id);

        return new VariationOptionsResource($variationOptions);
    }

    /**
     * Update VariationOptions with given payload.
     *
     * @param UpdateVariationOptionsAPIRequest $request
     * @param int                              $id
     *
     * @throws ValidatorException
     *
     * @return VariationOptionsResource
     */
    public function update(UpdateVariationOptionsAPIRequest $request, int $id): VariationOptionsResource
    {
        $input = $request->all();
        $variationOptions = $this->variationOptionsRepository->update($input, $id);

        return new VariationOptionsResource($variationOptions);
    }

    /**
     * Delete given VariationOptions.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->variationOptionsRepository->delete($id);

        return $this->successResponse('VariationOptions deleted successfully.');
    }

    /**
     * Bulk create VariationOptions's.
     *
     * @param BulkCreateVariationOptionsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return VariationOptionsCollection
     */
    public function bulkStore(BulkCreateVariationOptionsAPIRequest $request): VariationOptionsCollection
    {
        $variationOptions = collect();

        $input = $request->get('data');
        foreach ($input as $key => $variationOptionsInput) {
            $variationOptions[$key] = $this->variationOptionsRepository->create($variationOptionsInput);
        }

        return new VariationOptionsCollection($variationOptions);
    }

    /**
     * Bulk update VariationOptions's data.
     *
     * @param BulkUpdateVariationOptionsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return VariationOptionsCollection
     */
    public function bulkUpdate(BulkUpdateVariationOptionsAPIRequest $request): VariationOptionsCollection
    {
        $variationOptions = collect();

        $input = $request->get('data');
        foreach ($input as $key => $variationOptionsInput) {
            $variationOptions[$key] = $this->variationOptionsRepository->update($variationOptionsInput, $variationOptionsInput['id']);
        }

        return new VariationOptionsCollection($variationOptions);
    }
}
