<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateDigitalFilesAPIRequest;
use App\Http\Requests\Admin\BulkUpdateDigitalFilesAPIRequest;
use App\Http\Requests\Admin\CreateDigitalFilesAPIRequest;
use App\Http\Requests\Admin\UpdateDigitalFilesAPIRequest;
use App\Http\Resources\Admin\DigitalFilesCollection;
use App\Http\Resources\Admin\DigitalFilesResource;
use App\Repositories\DigitalFilesRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class DigitalFilesController extends AppBaseController
{
    /**
     * @var DigitalFilesRepository
     */
    private DigitalFilesRepository $digitalFilesRepository;

    /**
     * @param DigitalFilesRepository $digitalFilesRepository
     */
    public function __construct(DigitalFilesRepository $digitalFilesRepository)
    {
        $this->digitalFilesRepository = $digitalFilesRepository;
    }

    /**
     * DigitalFiles's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return DigitalFilesCollection
     */
    public function index(Request $request): DigitalFilesCollection
    {
        $digitalFiles = $this->digitalFilesRepository->fetch($request);

        return new DigitalFilesCollection($digitalFiles);
    }

    /**
     * Create DigitalFiles with given payload.
     *
     * @param CreateDigitalFilesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return DigitalFilesResource
     */
    public function store(CreateDigitalFilesAPIRequest $request): DigitalFilesResource
    {
        $input = $request->all();
        $digitalFiles = $this->digitalFilesRepository->create($input);

        return new DigitalFilesResource($digitalFiles);
    }

    /**
     * Get single DigitalFiles record.
     *
     * @param int $id
     *
     * @return DigitalFilesResource
     */
    public function show(int $id): DigitalFilesResource
    {
        $digitalFiles = $this->digitalFilesRepository->findOrFail($id);

        return new DigitalFilesResource($digitalFiles);
    }

    /**
     * Update DigitalFiles with given payload.
     *
     * @param UpdateDigitalFilesAPIRequest $request
     * @param int                          $id
     *
     * @throws ValidatorException
     *
     * @return DigitalFilesResource
     */
    public function update(UpdateDigitalFilesAPIRequest $request, int $id): DigitalFilesResource
    {
        $input = $request->all();
        $digitalFiles = $this->digitalFilesRepository->update($input, $id);

        return new DigitalFilesResource($digitalFiles);
    }

    /**
     * Delete given DigitalFiles.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->digitalFilesRepository->delete($id);

        return $this->successResponse('DigitalFiles deleted successfully.');
    }

    /**
     * Bulk create DigitalFiles's.
     *
     * @param BulkCreateDigitalFilesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return DigitalFilesCollection
     */
    public function bulkStore(BulkCreateDigitalFilesAPIRequest $request): DigitalFilesCollection
    {
        $digitalFiles = collect();

        $input = $request->get('data');
        foreach ($input as $key => $digitalFilesInput) {
            $digitalFiles[$key] = $this->digitalFilesRepository->create($digitalFilesInput);
        }

        return new DigitalFilesCollection($digitalFiles);
    }

    /**
     * Bulk update DigitalFiles's data.
     *
     * @param BulkUpdateDigitalFilesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return DigitalFilesCollection
     */
    public function bulkUpdate(BulkUpdateDigitalFilesAPIRequest $request): DigitalFilesCollection
    {
        $digitalFiles = collect();

        $input = $request->get('data');
        foreach ($input as $key => $digitalFilesInput) {
            $digitalFiles[$key] = $this->digitalFilesRepository->update($digitalFilesInput, $digitalFilesInput['id']);
        }

        return new DigitalFilesCollection($digitalFiles);
    }
}
